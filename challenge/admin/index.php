<?php
include_once './_common/sessions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './_common/head.php'; ?>
        <style>
.tiles {
	background-size: cover !important;
	margin: 0px;
	padding: 10px 10px !important;
	background-color: #fff; /* For browsers that do not support gradients */
	box-shadow: 0px 0px 3px rgba(0,0,0,.2);
	position: relative;
	z-index: 20;
	border-bottom: 2px solid #b8c0cc;
}
.tiles:hover {
	box-shadow: 0px 0px 8px rgba(0,0,0,.3);
	position: relative;
	z-index: 21;
}
.tiles h2 {
	margin-bottom: 10px;
	padding-bottom: 0px;
	margin-top: 0px;
}
.card {
	position: relative;
 margin: .5rem 10px 1rem 10px;
	background-color: whitesmoke;
	transition: box-shadow .25s;
	transition: .45s;
}
.card:hover {
	cursor: pointer;
	position: relative;
	background-color: #fff;
	transition: box-shadow .25s;
	transition: .45s;
}
.count {
	font-size: 42px;
}
.card-avatar img {
	height: 100px;
	width: 100px;
	margin-top: 50px
}
.card-avatar .waves-effect {
	text-align: center;
	margin-top: 20px
}
.card .card-content {
	padding: 5px;
	border-radius: 0 0 2px 2px;
	text-align: center
}
.card .card-title {
	font-size: 12px
}
.card-avatar .card-content .card-title {
	line-height: 20px!important;
	text-align: center;
	color: #222;
	font-size: 20px;
}
.dashboard1 {
	padding-top: 50px !important;
}
.dashboard1 .waves-block .fa {
	color: #57606d !important;
}
        </style>        
    </head>
    <body class="no-skin">
        <?php
        include_once './_common/navbar.php';
        ?>
        <div class="main-container ace-save-state" id="main-container">
            <?php
            $nav = "dash";
            include './_common/sidenav.php';
            ?>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon active"></i>
                                <a href="./">Home</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
<div class="row">
              <div class="col-xs-10 col-xs-offset-1">

                <a href="./all-album.php">  
                <div class="col-xs-3">                  
                    <div class="row">
                      <div class="card tiles card-avatar">                     
                      <h2 class="count text-center  "></h2>                        
                        <div class="waves-effect waves-block waves-light">
                          <i class="ace-icon fa fa-picture-o" style="font-size: 420%!important;color: #475C72;"></i> </div>
                        <div class="card-content">                          
                          <span class="card-title activator grey-text text-darken-4"> 
                                  Albums </span></div>
                      </div>
                </div>
                </div>
                </a>
                  
                <div class="space-6"></div>
                <div class="clearfix"></div>
              </div>
              <div class="clearfix"></div>
            </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include './_common/footer.php';
            ?>
        </div>
        <?php include './_common/script.php'; ?>
    </body>