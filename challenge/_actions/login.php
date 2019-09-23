<?php
session_start();
include_once '../_class/Main.php';
$dbMain = new Main();
include_once 'constants.php';
if (isset($_POST['logg'])) {
    $data['username'] = $_REQUEST['username'];
    $data['password'] = sha1($_REQUEST['password'] . key);
    $exe = Main::data_table('*', 'tbl_login', 'WHERE username="' . $data['username'] . '" AND password="' . $data['password'] . '" AND status=1 limit 1');
    $x = mysqli_fetch_assoc($exe);
    $user = $x['user_type'];
    switch ($user) {
        case 'admin':
            $cookie_uservalue = json_encode($x);
            setcookie(cookie_name, $cookie_uservalue, time() + (86400 * 30), "/");
            $location = "../admin/";
            break;
        case 'bdc':
            $cookie_uservalue = json_encode($x);
            setcookie(cookie_name, $cookie_uservalue, time() + (86400 * 30), "/");
            $location = "../enquiry/";
            break;
        case 'manager':
            $cookie_uservalue = json_encode($x);
            setcookie(cookie_name, $cookie_uservalue, time() + (86400 * 30), "/");
            $location = "../manager/";
            break;        
        default:
            $_SESSION['alert'] = "Invalid Credentials";
            $location = "../login";
            break;
    }
}else{
    $_SESSION['alert'] = "Connection Error";
    $location="../login";
}
header('Location:' . $location);
?>