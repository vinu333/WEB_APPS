<?php

class DbConn {

    public static function con() {
        $con = mysqli_connect('localhost', 'root', '', 'db_challenge');
        if (!$con) {
            die("Connection error: " . mysqli_connect_error());
        }
        return $con;
    }

}
