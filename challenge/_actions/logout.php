<?php
include_once './constants.php';
session_start();
session_destroy();
setcookie(cookie_name, null, -1, "/");
header('location:../login.php');?>