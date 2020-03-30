<?php
include 'include/db.php';
$sql = "SELECT user.name, user.email, result.total_qus, result.c_ans  FROM as_result AS result LEFT JOIN as_user AS user ON result.user_id = user.id";
$result  = mysqli_query($conn, $sql);

?>
<!doctype html>
<html class="fixed">

<head>
    <?php
    include 'header_links.php';
    ?>
</head>

<body>
    <section class="body">
        <?php
        include 'header.php';
        ?>
        <div class="inner-wrapper">
            <?php
            include 'sidenavbar.php';
            ?>
            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>Result</h2>
                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="../"> <i class="fa fa-home"></i> </a>
                            </li>
                        </ol> &nbsp;&nbsp;&nbsp;</div>
                    </header>
                    <div class="row">
                       <div class="col-md-12">
                          <!-- Main content -->
                          <section class="content">
                              <div class="row">
                                <div class="col-12">
                                  <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">Question</h3>
                                  </div>
                                  <!-- /.card-header -->
                                  <?php
                                  if (mysqli_num_rows($result) > 0) {
                                     echo '<div class="card-body"><table  id="qus_all" class="table table-bordered table-striped">
                                     <thead>
                                     
                                     <tr>
                                     <th>#</th>
                                     <th>Name</th>
                                     <th>Reg No</th>
                                     <th>Total Qus</th>
                                     <th>Ans</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     $i=0;
                                     while($row = mysqli_fetch_assoc($result)) {               
                                       echo '<tr>
                                       <td>'.++$i.'</td>
                                       <td>'. $row["name"].'</td>
                                       <td>'. $row["email"].'</td>
                                       <td>'. $row["total_qus"].'</td>
                                       <td>'. $row["c_ans"].'</td>';
                                   }
                                   echo '</tbody>
                                   </table></div>';
                               }
                               ?>
                               
                               <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                       </div>
                   </div>
               </div>
           </div>
       </section>                        
   </div>
</section>
<?php
include 'footer_links1.php';
?>
<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="assets/vendor/select2/select2.js"></script>
<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="assets/vendor/fuelux/js/spinner.js"></script>
<script src="assets/vendor/dropzone/dropzone.js"></script>
<script src="assets/vendor/bootstrap-markdown/js/markdown.js"></script>
<script src="assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
<script src="assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="assets/vendor/codemirror/lib/codemirror.js"></script>
<script src="assets/vendor/codemirror/addon/selection/active-line.js"></script>
<script src="assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
<script src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>
<script src="assets/vendor/codemirror/mode/xml/xml.js"></script>
<script src="assets/vendor/codemirror/mode/css/css.js"></script>
<script src="assets/vendor/summernote/summernote.js"></script>
<script src="assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="assets/vendor/ios7-switch/ios7-switch.js"></script>
<script src="assets/vendor/bootstrap-confirmation/bootstrap-confirmation.js"></script>
<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script type="text/javascript">
   $(function () {
     $('#qus_all').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": true,
       "ordering": false,
       "info": true,
       "autoWidth": false
   });
 });
</script>
<?php
include 'footer_links2.php';
?>

</body>

</html>