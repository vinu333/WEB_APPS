<?php

error_reporting(-1);
session_start();
//include_once '../admin/_common/sessions.php';
include_once '../../_class/Main.php';
if (isset($_POST['id']) && isset($_POST['src']) && $_POST['id'] != "") {

    $_src = htmlspecialchars($_POST['src'], ENT_QUOTES);
    $_id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    if($_src == "album"){
        $exe = Main::data_table('ab_title', 'tbl_album', 'where ab_id = ' . $_id);
        $exe_media_album = Main::data_table("id,file", "tbl_medias", "WHERE ref = 'album' AND type = 'image' AND ref_id = ".$_id);
        $exe_media_gallery = Main::data_table("id,file", "tbl_medias", "WHERE ref = 'gallery' AND type = 'image' AND ref_id = ".$_id);
        $row = mysqli_fetch_assoc($exe);
        Main::updateStatus('tbl_album', 'ab_status', 0, 'ab_id', $_id);
        while ($del_media_album = mysqli_fetch_assoc($exe_media_album)) {
        Main::ComDelete("tbl_medias", "id", $del_media_album['id']);
        unlink('../_uploads/album/' . $del_media_album['file']);    
        }
        while ($del_media_gallery = mysqli_fetch_assoc($exe_media_gallery)) {
        Main::ComDelete("tbl_medias", "id", $del_media_gallery['id']);
        unlink('../_uploads/gallery/' . $del_media_gallery['file']);    
        }
        $_SESSION['album_alert'] = "Album " . $row['ab_title'] . " Deleted";
        echo "success";        
    }
    else {
        echo "failed";
        //die(header('Location:../'));
    }
} else {
    echo "failed";
    //die(header('Location:../'));
}
?>
