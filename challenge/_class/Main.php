<?php

/**
 * Description of Main
 *
 * @author Globosoft
 */
include_once 'DbConn.php';

class Main {

    public $conn;

    function __construct() {
        $this->conn = DbConn::con();
    }
// If the Main::ComDelete() function is not referencing an instance property (using $this) then all you need is to add static to your function declaration. i.e //
// static function not using $this //
    public static function ComDelete($tname, $trname, $tid) { 
        $sql = "delete from $tname where $trname='$tid'";
        $result = mysqli_query(DbConn::con(), $sql);
//        $result = mysqli_query($con, $sql);

        return $result;
    }

    public function getInsert($tname, $tvalues) { 

        $stm = "";
        foreach ($tvalues as $key1 => $value1) {


            if ($stm == "") {
                $stm = $stm . $key1;
            } else {
                $stm = $stm . "," . $key1;
            }
        }

        $stmt1 = "INSERT INTO $tname($stm) VALUES (";
        $stmt2 = "";
        $stmt3 = ")";
        foreach ($tvalues as $key => $value) {
            if ($stmt2 == "") {
                $stmt2 = $stmt2 . "'" . mysqli_real_escape_string($this->conn, $value) . "'";
            } else {
                $stmt2 = $stmt2 . ",'" . mysqli_real_escape_string($this->conn, $value) . "'";
            }
        }

        $stmt = $stmt1 . $stmt2 . $stmt3;
//        echo $stmt;exit;
        $result = mysqli_query($this->conn, $stmt);
//        $result = mysqli_query($con, $stmt);
        $result = mysqli_insert_id($this->conn);
        return $result;
//        echo $result;
    }

    public function getUpdate($tname, $tvalues, $fname, $fid) {
        $stmt1 = "update $tname set" . " ";
        $stmt2 = "";
        foreach ($tvalues as $key => $value) {
            if ($stmt2 == "") {
                $stmt2 = $stmt2 . $key . "='" . mysqli_real_escape_string($this->conn, $value) . "'";
            } else {
                $stmt2 = $stmt2 . "," . $key . "='" . mysqli_real_escape_string($this->conn, $value) . "'";
            }
            $stmt3 = " " . "where $fname='$fid'";
        }
//        echo $stmt1 . $stmt2 . $stmt3;exit;
        $result = mysqli_query($this->conn, $stmt1 . $stmt2 . $stmt3);

        return $result;
    }

    public static function updateStatus($tname, $tstatus, $status, $trname, $tid) {
        $sql = "update $tname set $tstatus = '$status' where $trname='$tid'";
        $result = mysqli_query(DbConn::con(), $sql);
//        $result = mysqli_query($con, $sql);

        return $result;
    }

    public static function data_table($field, $table, $where) {
        $sql = "select $field from $table $where";
        return mysqli_query(DbConn::con(), $sql);
    }

}
