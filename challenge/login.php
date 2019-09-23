<?php
session_start();
include_once './_actions/constants.php';
if (isset($_COOKIE[cookie_name])) {
    $cooki = json_decode($_COOKIE[cookie_name]);
    $cookie = (array) $cooki;
    switch ($cookie['user_type']) {
        case 'admin':
            $location = "./admin/";
            break;
        case'manager':
            $location = "./manager/";
            break;
        case'bdc':
            $location = "./enquiry/";
            break;
        default :
            echo 'error';
            break;
    }
    header('Location:' . $location);
    die("redir");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.html'; ?>
    </head>
    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <!--<i class="ace-icon fa fa-opera blue"></i>-->
                                    <span class="red"></span>
                                    <span class="white" id="id-text2"></span>
                                </h1>
                                <h4 class="blue" id="id-company-text">CHALLENGE</h4>
                            </div>
                            <div class="space-6"></div>
                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-lock green"></i>
                                                Please Enter Your Credentials
                                            </h4>
                                            <div class="space-6"></div>
                                            <form action="_actions/login.php" method="POST" autocomplete="off" onsubmit="return validate()">
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" name="username" class="form-control" placeholder="Username" />
                                                            <i class="ace-icon fa fa-user red"></i>
                                                        </span>
                                                    </label>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" name="password" class="form-control" placeholder="Password" />
                                                            <i class="ace-icon fa fa-lock red"></i>
                                                        </span>
                                                    </label>
                                                    <div class="space"></div>
                                                    <div class="clearfix">
                                                        <button type="submit" class="btn-block pull-right btn btn-sm btn-primary" name="logg">                                                            
                                                            <span class="bigger-110">Login</span> <i class="ace-icon fa fa-sign-in"></i>
                                                        </button>
                                                        <?php
                                                        if (isset($_SESSION['alert'])) {
                                                            echo "<div class='red center err'>" . $_SESSION['alert'] . "</div>";
                                                            unset($_SESSION['alert']);
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script>
            setTimeout(function(){$(".err").hide()}, 3000);
        </script>
    </body>
</html>