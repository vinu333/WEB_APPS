<script src="../assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>
<script src="../assets/js/bootbox.js"></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
jQuery(function ($) {
    var myTable =
            $('#dynamic-table')
            .DataTable({
                "paging": true,
//                        "ordering": false,
                bAutoWidth: false,
                //"order": [[2, "asc"]]
            });

})
</script>