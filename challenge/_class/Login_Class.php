<?php

include_once 'DbConn.php';

class Login_Class {

    public $con;

    function __construct() {
        $this->con = DbConn::con();
    }

    public function Login($data) {
        $stm = $this->con->prepare("SELECT login_id,username,user_type,status FROM tbl_login WHERE username COLLATE latin1_general_cs=? AND PASSWORD=? AND STATUS=1 limit 1");
        $stm->bind_param("ss", $data['username'], $data['password']);
        $stm->execute();
        $log = $stm->get_result();
        return $this->login = $log->fetch_assoc();
    }

}
