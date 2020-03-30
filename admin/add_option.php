<?php
include 'include/db.php';
include 'include/session.php';

if ($_POST)
{
    $cat_id = validation($_POST['cat_id']);
    $subject_id = validation($_POST['subject_id']);
    $quertion = validation($_POST['quertion']);
    $sql_insert = "INSERT INTO as_quertion (cat_id, quertion, sub_id) Values ('" . $cat_id . "', '" . $quertion . "', '" . $subject_id . "')";
    if (mysqli_query($conn, $sql_insert))
    {
        $success = "New quertion created successfully";
    }
    else
    {
        $error = "Quertion created Not successfully";
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
                    <h2>Option</h2>
                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="../"> <i class="fa fa-home"></i> </a>
                            </li>
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
                                    <h2 class="panel-title">Option Information</h2> </header>
                                    <div class="panel-body">
                                        <?php

                                        if (isset($success))
                                           { ?>
                                            <div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong>
                                                <?php
                                                echo $success; ?>
                                            </div>
                                            <?php
                                        } ?>
                                        <?php

                                        if (isset($error))
                                           { ?>
                                            <div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">Ã—</a> <strong>Danger!</strong>
                                                <?php
                                                echo $error; ?>
                                            </div>
                                            <?php
                                        } ?>
                                        <form class="form-horizontal form-bordered" method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="cat_id">Category Name</label>
                                                <div class="col-md-6">
                                                    <select required class="form-control" id="cat_id" name="cat_id">
                                                        <option value="">--Select Category---</option>
                                                        <?php
                                                        $sql = "SELECT * FROM as_category";
                                                        $result = mysqli_query($conn, $sql);

                                                        while ($row = mysqli_fetch_assoc($result))
                                                           { ?>
                                                            <option value="<?php echo $row['cat_id'] ?>">
                                                                <?php echo $row['categoryName'] ?>
                                                            </option>
                                                            <?php
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="subject_id">Subject Name</label>
                                                <div class="col-md-6">
                                                    <select required class="form-control" id="subject_id" name="subject_id">
                                                        <option value="">--Select Subject---</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="subject_id">Quertion</label>
                                                <div class="col-md-6">
                                                    <textarea required name="quertion" class="form-control"></textarea>
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
            <script>
                $('#cat_id').change(function() {
                    getSubCat();
                });

                function getSubCat() {
                    cat_id = $('#cat_id').val();
                    $.post("include/subject.php", {
                        cat_id: cat_id
                    }).done(function(data) {
                        $('#subject_id').html(data);
                    });
                }
                getSubCat();
            </script>
        </body>

        </html>