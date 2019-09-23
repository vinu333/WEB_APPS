<?php

session_start();
include_once '../_actions/constants.php';
if (!isset($_COOKIE[cookie_name])) {
    header('Location:../login');
    die();
}else{
//print_r($_COOKIE[cookie_name]);
$session = json_decode($_COOKIE[cookie_name]);
$session = (array) $session;
if($session['user_type'] != "admin"){
       die(header('Location:../'));    
}
}

?>