<?php
include_once './_common/sessions.php';
include_once '../_class/Main.php';
$dbMain = new Main();
error_reporting(-1);
$table= "tbl_album";
$required = "required";
 if (isset($_GET['ab_id']) && filter_var($_GET['ab_id'], FILTER_VALIDATE_INT)) {
	 $vid=$_GET['ab_id'];
	 $exe = Main::data_table('*', $table, 'WHERE ab_id = '.$vid);	
         @$row = mysqli_fetch_assoc($exe);
         $exe_media_album = Main::data_table("*", "tbl_medias", "WHERE ref = 'album' AND type = 'image' AND ref_id = ".$vid);
         $exe_media_gallery = Main::data_table("*", "tbl_medias", "WHERE ref = 'gallery' AND type = 'image' AND ref_id = ".$vid);
	 $required = "";
 }
if(isset($_POST['submit'])){
$date= date("Y-m-d h:i:s");			   
if(isset($_GET['ab_id']) && filter_var($_GET['ab_id'], FILTER_VALIDATE_INT)) {		   
$info = array(						
"ab_title"=>$_POST['album_title'],   
"ab_des"=>$_POST['description']        
);
//$where="st_id='".$vid."'";	
$dbMain->getUpdate($table,$info,'ab_id',$vid);
// Coder for delete Image//
if(isset($_POST['delimages_album']) && !empty($_POST['delimages_album'])){
    foreach ($_POST['delimages_album'] as $id) {
        $exe_del_media_album = Main::data_table("file", "tbl_medias", "WHERE ref = 'album' AND type = 'image' AND id = ".$id);
        $del_media_album = mysqli_fetch_assoc($exe_del_media_album);
        Main::ComDelete("tbl_medias", "id", $id);
        unlink('./_uploads/album/' . $del_media_album['file']);
    }
}
if(isset($_POST['delimages_gallery']) && !empty($_POST['delimages_gallery'])){
    foreach ($_POST['delimages_gallery'] as $id_gal) {
        $exe_del_media_gallery = Main::data_table("file", "tbl_medias", "WHERE ref = 'gallery' AND type = 'image' AND id = ".$id_gal);
        $del_media_gallery = mysqli_fetch_assoc($exe_del_media_gallery);
        Main::ComDelete("tbl_medias", "id", $id_gal);
        unlink('./_uploads/gallery/' . $del_media_gallery['file']);
    }
}
// Coder for delete Image//
// Code for Image Upload Starts//
if ($_FILES['album_image']['error'] == 0 && $_FILES['album_image']['type'] == 'image/jpeg') { 
$info = $_FILES['album_image']['name'];
$ext = pathinfo($info, PATHINFO_EXTENSION);     
$newname = time() . rand(10000, 99999) . "." . $ext;
$target = './_uploads/album/' . $newname;
move_uploaded_file($_FILES['album_image']['tmp_name'], $target);
$info_media_album = array(						
"ref"=>"album",
"ref_id"=>$vid,
"type"=>"image",
"file"=>$newname,
"title"=>$_POST['album_title']   
);            
$dbMain->getInsert("tbl_medias", $info_media_album);
}

foreach($_FILES['cmt_image']['tmp_name'] as $key => $file) {
if ($_FILES['cmt_image']['error'][$key] == 0 && $_FILES['cmt_image']['type'][$key] == 'image/jpeg') { 
$info = $_FILES['cmt_image']['name'][$key];
$ext = pathinfo($info, PATHINFO_EXTENSION);     
$newname = time() . rand(10000, 99999) . "." . $ext;
$target = './_uploads/gallery/' . $newname;
move_uploaded_file($_FILES['cmt_image']['tmp_name'][$key], $target);
$info_media = array(						
"ref"=>"gallery",
"ref_id"=>$vid,
"type"=>"image",
"file"=>$newname,
"title"=>$_POST['album_title']   
);            
$dbMain->getInsert("tbl_medias", $info_media);
}
}
// Code for Image Upload Ends//
$msg="edit";
$_SESSION['album_alert'] ="Album ".$row['ab_title']." Updated To ".$_POST['album_title'];
}else {
$info = array(						
"ab_title"=>$_POST['album_title'],
"ab_des"=>$_POST['description']    
);
$newId = $dbMain->getInsert($table,$info);
// Code for Image Upload Starts//
if ($_FILES['album_image']['error'] == 0 && $_FILES['album_image']['type'] == 'image/jpeg') { 
$info = $_FILES['album_image']['name'];
$ext = pathinfo($info, PATHINFO_EXTENSION);     
$newname = time() . rand(10000, 99999) . "." . $ext;
$target = './_uploads/album/' . $newname;
move_uploaded_file($_FILES['album_image']['tmp_name'], $target);
$info_media_album = array(						
"ref"=>"album",
"ref_id"=>$newId,
"type"=>"image",
"file"=>$newname,
"title"=>$_POST['album_title']   
);            
$dbMain->getInsert("tbl_medias", $info_media_album);
}

foreach($_FILES['cmt_image']['tmp_name'] as $key => $file) {
if ($_FILES['cmt_image']['error'][$key] == 0 && $_FILES['cmt_image']['type'][$key] == 'image/jpeg') { 
$info = $_FILES['cmt_image']['name'][$key];
$ext = pathinfo($info, PATHINFO_EXTENSION);     
$newname = time() . rand(10000, 99999) . "." . $ext;
$target = './_uploads/gallery/' . $newname;
move_uploaded_file($_FILES['cmt_image']['tmp_name'][$key], $target);
$info_media = array(						
"ref"=>"gallery",
"ref_id"=>$newId,
"type"=>"image",
"file"=>$newname,
"title"=>$_POST['album_title']   
);            
$dbMain->getInsert("tbl_medias", $info_media);
}
}
// Code for Image Upload Ends//
$msg="add";
$_SESSION['album_alert'] ="Album ". $_POST['album_title'] ." Added Successfully!!!...";						   
}
header("Location: all-album.php");			   
}
@$master = "open";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './_common/head.php'; ?>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="no-skin">
        <?php
        include_once './_common/navbar.php';
        ?>
        <div class="main-container ace-save-state" id="main-container">
            <?php
            $nav = "album";
            include './_common/sidenav.php';
            ?>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="./">Home</a>
                            </li>
                            <li>
                                <i class="active"></i>
                                <a href="">Image Gallery</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-content">
                        <div class="page-header">
                            <div class="row">
                            <div class="col-md-10">
<?php if (isset($_GET['ab_id']) && filter_var($_GET['ab_id'], FILTER_VALIDATE_INT)) { ?> 
                            <h1> Edit Album</h1>
<?php }else { ?>                            
                            <h1> Create Album</h1>
<?php } ?>       
                            </div>
<!--                             <div class="col-md-2">
                                 <a href="all-committee.php" type="button" class="btn btn-success pull-right"><< BACK</a>
                            </div>-->
                            </div>
                        </div>
                        <?php if (isset($_SESSION['gallery_alert'])) { ?>
                            <div  class="row" id="msg">
                                <!--<div class="col-sm-offset-8">-->
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="ace-icon fa fa-times"></i>
                                        </button>

                                        <strong>
                                            <i class="ace-icon fa fa-exclamation-circle"></i>
                                        </strong>
                                        <?php
                                        echo $_SESSION['gallery_alert'];
                                        unset($_SESSION['gallery_alert']);
                                        ?>
                                        <br />
                                    </div>
                                <!--</div>-->
                            </div>
                            <script>
                                function snackbar() {
                                    var x = document.getElementById("msg")
                                    x.className = "show";
                                    setTimeout(function () {
                                        x.className = x.className.replace("show", "fade");
                                        x.className = x.className.replace("fade", "hide");
                                    }, 3000);
                                }
                                snackbar();
                            </script>
                        <?php }  ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">                                   
	                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Album Title </label>

                                        <div class="col-sm-9">
                                            <input type="text" name="album_title" id="form-field-1" placeholder="Event Title" value="<?php echo @$row['ab_title']; ?>" class="col-xs-10 col-sm-5" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description</label>

                                        <div class="col-sm-9">
                                            <textarea class="col-xs-10 col-sm-5 col-md-8" name="description" rows="5" required><?php echo @$row['ab_des']; ?></textarea>                                            
                                        </div>
                                    </div>                                    
<?php if (isset($_GET['ab_id']) && filter_var($_GET['ab_id'], FILTER_VALIDATE_INT)) { ?>
                        <div class="form-group">
			<!--<label class="col-md-3 col-xs-12 control-label">Images</label>-->
			<div class="col-md-12 col-xs-12">
			<ul class="list-inline list-thumbnails">
			<?php while ($row_media_album = mysqli_fetch_assoc($exe_media_album)) { ?>
			<li class="checkbox-remove">
                            <img class="img thumbnail" src="_uploads/album/<?php echo $row_media_album['file']; ?>" />
			<input type='checkbox' name='delimages_album[]' value='<?php echo $row_media_album['id']; ?>' id="checkimg<?php echo $row_media_album['id']; ?>">
			<label for="checkimg<?php echo $row_media_album['id']; ?>"></label>
			</li>
			<?php } ?>
			</ul>
                        </div>
			</div>      
<?php } ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Main Image</label>

                                        <div class="col-sm-9">
                                            <input type="file" name="album_image" id="form-field-1" placeholder="Browse" class="col-xs-10 col-sm-5"/>                                         
                                        </div>
                                        <div class="row">
                                            <span class="pull-left">Upload jpg Image (600 X 400) </span>
                                        </div>
                                    </div>
                                    
 <?php if (isset($_GET['ab_id']) && filter_var($_GET['ab_id'], FILTER_VALIDATE_INT)) { ?>                                   
                        <div class="form-group">
			<!--<label class="col-md-3 col-xs-12 control-label">Images</label>-->
			<div class="col-md-12 col-xs-12">
			<ul class="list-inline list-thumbnails">
			<?php while ($row_media = mysqli_fetch_assoc($exe_media_gallery)) { ?>
			<li class="checkbox-remove">
                            <img class="img thumbnail" src="_uploads/gallery/<?php echo $row_media['file']; ?>" />
			<input type='checkbox' name='delimages_gallery[]' value='<?php echo $row_media['id']; ?>' id="checkimg<?php echo $row_media['id']; ?>">
			<label for="checkimg<?php echo $row_media['id']; ?>"></label>
			</li>
			<?php } ?>
			</ul>
                        </div>
			</div>     
<?php } ?>                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Gallery Images</label>

                                        <div class="col-sm-9">
                                            <input type="file" multiple name="cmt_image[]" id="form-field-1" placeholder="Browse" class="col-xs-10 col-sm-5"/>                                         
                                        </div>
                                        <div class="row">
                                            <span class="pull-left">Upload jpg Image (400 X 300) </span>
                                        </div>
                                    </div>                                    
                                    <div class="">
                                        <div class="col-md-offset-3 col-md-9">                                            
                                            <button class="btn btn-danger" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <button type="submit" class="btn btn-info" name="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
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