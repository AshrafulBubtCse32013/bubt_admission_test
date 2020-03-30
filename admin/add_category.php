<?php
include 'include/db.php';
include 'include/session.php';

if ($_POST)
	{
	$cat_name = validation($_POST['cat_name']);
	$uploaddir = './upload/';
	$uploadfile = $uploaddir . basename($_FILES['cat_image']['name']);
	$image_name = $_FILES['cat_image']['name'];
	if (move_uploaded_file($_FILES['cat_image']['tmp_name'], $uploadfile))
		{
		$sql_insert = "INSERT INTO as_category (categoryName, categoryImage) Values ('" . $cat_name . "', '" . $image_name . "')";
		mysqli_query($conn, $sql_insert) or die(mysql_error());
		}
	  else
		{
		echo "Upload failed";
		}
	} ?>
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
                                <h2>Category</h2>
                                <div class="right-wrapper pull-right">
                                    <ol class="breadcrumbs">
                                        <li>
                                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li><span>Forms</span></li>
                                        <li><span>Advanced</span></li>
                                    </ol> &nbsp;&nbsp;&nbsp;</div>
                            </header>
                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                            </div>
                                            <h2 class="panel-title">Category Information</h2> </header>
                                        <div class="panel-body">
                                            <form class="form-horizontal form-bordered" method="post" action="" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="inputDefault">Category Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="inputDefault" name="cat_name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Category Image</label>
                                                    <div class="col-md-6">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="input-append">
                                                                <div class="uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span></div> <span class="btn btn-default btn-file"> <span class="fileupload-exists">Change</span> <span class="fileupload-new">Select file</span>
                                                                <input type="file" name="cat_image" /> </span> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-offset-3 col-md-6">
                                                        <input type="submit" class="btn btn-success" value="Add Category">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </section>
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