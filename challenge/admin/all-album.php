<?php
include_once './_common/sessions.php';
include_once '../_class/Main.php';
$dbMain = new Main();
$allusers = Main::data_table('*', 'tbl_album', 'WHERE ab_status = 1 ORDER BY ab_id DESC');
@$master = "open";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './_common/head.php'; ?>
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
                                <i class="ace-icon fa fa-home home-icon active"></i>
                                <a href="./">Home</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-content">
                        <?php if (isset($_SESSION['album_alert'])) { ?>
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
                                        echo $_SESSION['album_alert'];
                                        unset($_SESSION['album_alert']);
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
                                              
                        <div class="page-header">
                            <div class="row">
                            <div class="col-md-10">
                            <h1> All Albums</h1>
                            </div>
                            <div class="col-md-2">
                                <a href="album.php" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</a>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">Si No.</th>
                                            <th>Title</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = 1;
                                        while ($e = mysqli_fetch_assoc($allusers)) {
                                            ?>
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                        <?php echo $a ?>.
                                                    </label>
                                                </td>
                                                <td>
                                                    <?php echo $e['ab_title']; ?>
                                                </td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
<!--                                                        <a class="blue" href="assign_user.php?user=<?php// echo $e['st_id']; ?>" title="Assign User">
                                                            <i class="ace-icon fa fa-plus bigger-130"></i>
                                                        </a>-->

                                                        <a class="green" href="album.php?ab_id=<?php echo $e['ab_id']; ?>" title="Edit">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

<!--                                                        <a class="red" href="javascript:void(0)" title="Reject User" user="<?php //echo $e['st_id']; ?>">
                                                            <i class="ace-icon fa fa-times-circle-o bigger-130"></i>
                                                        </a>-->

                                                        <a class="red rmv_user"  title="Delete" userid="<?php echo $e['ab_id']; ?>">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            $a++;
                                        }
                                        ?>
                                    </tbody>
                                </table>


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
        <script>
            $(".rmv_user").click(function () {
                var id = $(this).attr('userid');
                var src = "album";
                console.log(id);
                bootbox.confirm("Are you sure to remove this Event?", function (result) {
                    if (result) {
                        $.ajax({
                            url: './_proc/delete.php',
                            type: 'POST',
                            data: 'id=' + id + '&src=' + src,
                            success: function (result)
                            {
                                //alert(result);
                                console.log(result);
                                location.reload();
                            },
                            error: function ()
                            {
                                alert("err");
                                location.reload();
                            },
                        });
                    }
                });
            });
        </script>
    </body>