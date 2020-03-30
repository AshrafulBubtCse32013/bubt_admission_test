<?php
include 'include/db.php';
include 'include/session.php';
if(isset($_POST['sync'])){
  $sql = "SELECT * FROM as_quertion_csv";
  $result  = mysqli_query($conn, $sql);
  $select_result   = $result->fetch_all(MYSQLI_ASSOC);
  foreach ($select_result as $key => $value) {
    
  }
}
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
          <h2>Question</h2>
          <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
              <li>
                <a href="./main.php"> <i class="fa fa-home"></i> </a>
              </li>
            </ol> &nbsp;&nbsp;&nbsp;</div>
          </header>
          <div class="container">
            <div class="row">
              <?php 
              $sql="SELECT * FROM as_quertion_csv";
              $select_result=mysqli_query($conn, $sql); $i=1;
              while($select_row=mysqli_fetch_array($select_result)){ ?>
                <div class="col-md-12">
                  <h4><?php echo $i.' ) '; echo $select_row['quertion']?></h4>
                  <?php $qus_id=$select_row[ 'qus_id']; 
                  $sql1="SELECT * FROM as_option_csv where qus_id = '" .$qus_id. "'"; $select_result1=mysqli_query($conn, $sql1); while($select_row1=mysqli_fetch_array($select_result1)){ ?>
                    <div class="checkbox">
                      <label class="
                      <?php
                      if($select_row['correct_option']==$select_row1['op_id']){echo " green ";}
                      if($select_row['submit_option']!=$select_row['correct_option']){
                        if($select_row['submit_option']==$select_row1['op_id']){echo " red ";}
                        if($select_row['submit_option']==0){echo " notSubmit ";}
                        }else{
                          echo "click";
                        }
                        ?>
                        ">
                        <?php echo $select_row1[ 'option'];?>

                      </label>
                    </div>
                  <?php } ?>
                </div>
                <?php $i++;} ?>

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
      <?php
      include 'footer_links2.php';
      ?>

    </body>

    </html>