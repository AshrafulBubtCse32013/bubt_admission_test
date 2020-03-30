<?php
include 'include/db.php';
include 'include/session.php';
function str_re($str='√')
{
    $str = str_replace("√","sqrt[]",$str);
    return $str;
}
// echo str_re();
if (isset($_POST['qus']))
{
    $flg = 0;
    $subject_id = validation($_POST['subject_id']);
    $quertion = validation($_POST['quertion']);
    $sql_insert = "INSERT INTO as_quertion (quertion, sub_id) Values ('" . $quertion . "', '" . $subject_id . "')";


    $req = mysqli_query($conn, $sql_insert);

    $qus_id = mysqli_insert_id($conn);
    // echo $qus_id;die();
    if(!$req){
        mysql_query("ROLLBACK");
        $error = "Question not Upload!";
        echo "
        <script type='text/javascript'>
        window.location.replace('./".basename($_SERVER['PHP_SELF'])."');
        </script>";
    }

    if(!$req){
        $flg = 1;
    }

    $option_name = $_POST['option_name'];
    $i = 0;
    $pusarr = array();
    foreach($option_name as $value)
    {
        $value = validation($value);
        $value = str_re($value);
        $sql_insert = "INSERT INTO as_option (qus_id, `option`) Values ('" . $qus_id . "', '" . $value . "')";
        $re = mysqli_query($conn, $sql_insert);

            // echo "<pre>";
            // print_r($_POST['checkcorr']).'/';
            // echo $i."/";

        if (in_array($i, $_POST['checkcorr']))
        {
            $last_id = mysqli_insert_id($conn);
            // echo $last_id.'/';
            array_push($pusarr, $last_id);
            
        }

        if(!$re){
            $flg = 1;
        }

        $i++;

    }
    $answer_ids = json_encode($pusarr);
    $sql_insert = "UPDATE as_quertion SET answer_id='" . $answer_ids . "' WHERE qus_id='" . $qus_id . "'";
    mysqli_query($conn, $sql_insert);

    // die();
    if($flg==0){
        $success = "Question save successful";
    }
    else {        
        $error = "Question not Upload!";

    }


}

if (isset($_POST['file_upload']))
{
    $path=$_FILES["file"]["name"];
    $filename=$_FILES["file"]["tmp_name"]; 
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    echo $ext;
    if($ext=="csv")
    {

        $arr = array(array(),array());
        $num = 0;
        $row = 0;
        $handle = fopen($filename, "r");

        $i=0;
        $j=0;
        $k=0;
        $array = array();
        $array2 = array();
        while($data = fgetcsv($handle,1000,",")){
            $the_big_array[] = $data;
            if($i==0){
                $i++;
                foreach ($data as $key => $value) {
                    $array[$key] = $value;
                    

                }

            } else{  
                foreach ($data as $key => $value) {
                    if(strpos($array[$key], 'option') !== false){
                        $array2[$j]['option'][$k] = $value;
                        $k++;

                    }else{
                        $array2[$j][$array[$key]] = $value;

                    }
                }
                $j++;
            }

        }
        foreach ($array2 as $key => $value) {


            $subject_id = $_POST['category'];
            
            // $answer_ids = json_encode($answer_ids);
            $quertion = validation($value['question']);
            $sql_insert = "INSERT INTO as_quertion (quertion, sub_id) Values ('" . $quertion . "', '" . $subject_id . "')";


            $req = mysqli_query($conn, $sql_insert);
            $qus_id = mysqli_insert_id($conn);



            $option_name = $value['option'];
            $i = 0;
            $pusarr = array();
            $answer_ids = explode(',', $value['result']);
            $get_ans = array();
            foreach($option_name as $value)
            {
                // $value = validation($value);
                $value = ($value);
                $value = str_re($value);
                $sql_insert = "INSERT INTO as_option (qus_id, `option`) Values ('" . $qus_id . "', '" . $value . "')";
                $re = mysqli_query($conn, $sql_insert);
                if(in_array($i, $answer_ids)){
                    $ans_id = mysqli_insert_id($conn);
                    array_push($get_ans, $ans_id);
                }
                $i++;


            }
            $answer_ids = json_encode($get_ans);
            $sql_insert = "UPDATE as_quertion SET answer_id='" . $answer_ids . "' WHERE qus_id='" . $qus_id . "'";
            mysqli_query($conn, $sql_insert);
        }
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
                    <h2>Question</h2>
                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="./main.php"> <i class="fa fa-home"></i> </a>
                            </li>
                        </ol> &nbsp;&nbsp;&nbsp;</div>
                    </header>
                    <div class="row">                        
                        <div class="col-lg-12">
                            <a href="#modalAnim" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary">Bulk Input</a>
                            <a href="./assets/file/example_qus.csv" class="btn btn-success" target="_blank">Download Question Format</a>
                            <a href="all_question.php" class="btn btn-success pull-right">All Questions</a>
                        </div>
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Question Information</h2> 
                                </header>
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
                                        { 
                                            ?>
                                            <div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">Ã—</a> <strong>Danger!</strong>
                                                <?php
                                                echo $error; ?>
                                            </div>
                                            <?php
                                        } ?>
                                        <form class="form-horizontal form-bordered" method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="subject_id">Subject Name</label>
                                                <div class="col-md-6">
                                                    <select required class="form-control" id="subject_id" name="subject_id">
                                                        <?php 
                                                        $subject = '<option value="">--Select Subject---</option>';
                                                        $sql = "SELECT * FROM as_subject";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $subject .= "<option value=".$row['sub_id'].">".$row['subject_name']."</option>";

                                                        }
                                                        echo $subject;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="subject_id">Question</label>
                                                <div class="col-md-6">
                                                    <textarea required name="quertion" class="form-control" id="question"></textarea>
                                                </div>
                                            </div>

                                            <input type="hidden" name="count" value="1" />
                                            <div class="control-group" id="fields">
                                                <label class="col-md-3 control-label" for="field1">Options</label>
                                                <div class="col-md-6 controls" id="profs">
                                                    <div id="field">
                                                        <input value="0" class="" type="checkbox" name="checkcorr[]"> <small>If correct ans :) check me</small>
                                                        <input class="form-control" autocomplete="off" class="input" id="field1" name="option_name[]" type="text" placeholder="Type something" data-items="8" />
                                                        <button id="b1" class="btn add-more pull-right" type="button">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-3 col-md-6">
                                                    <input type="submit" name="qus" class="btn btn-success" value="Add Question">
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
            <div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Upload Question on CSV format</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <form class="form-horizontal form-bordered" method="post" action="" enctype="multipart/form-data">
                                <?php
                                $sql = "SELECT * FROM as_subject";
                                $result  = mysqli_query($conn, $sql);
                                $select_result   = $result->fetch_all(MYSQLI_ASSOC);
                                ?>
                                <select name="category" required="" class="form-control">
                                    <option value="">Select Subject</option>
                                    <?php  
                                    foreach ($select_result as $key => $value) {?>
                                    <option value="<?=$value['sub_id'];?>"><?=$value['subject_name'];?></option>
                                        
                                    <?php }
                                    ?>
                                </select>
                                <br>
                                <input type="file" name="file" accept=".csv">
                                <br>
                                <input type="submit" name="file_upload"  value="Upload" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-danger modal-dismiss">Close</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>
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
            <script src="assets/javascripts/ui-elements/examples.modals.js"></script>
            <?php
            include 'footer_links2.php';
            ?>
            <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'question' );
            </script>
            <script>
                $(document).ready(function() {
                    var next = 1;
                    $(".add-more").click(function(e) {
                        e.preventDefault();
                        var addto = "#field" + next;
                        var addRemove = "#field" + (next);
                        next = next + 1;
                        var newIn = '<input value="' + (next - 1) + '" class="check' + (next - 1) + '" id="check' + (next - 1) + '" type="checkbox" name="checkcorr[]"><small id="mss' + (next - 1) + '"> If correct ans :) check me</small><input autocomplete="off" class="form-control" id="field' + next + '" name="option_name[]" type="text">';
                        var newInput = $(newIn);
                        var removeBtn = '';
                        var removeButton = $(removeBtn);
                        $(addto).after(newInput);
                        $(addRemove).after(removeButton);
                        $("#field" + next).attr('data-source', $(addto).attr('data-source'));
                        $("#count").val(next);
                        $('.remove-me').click(function(e) {
                            e.preventDefault();
                            var fieldNum = this.id.charAt(this.id.length - 1);
                            var fieldID = "#field" + fieldNum;
                            $(this).remove();
                            $(fieldID).remove();
                            var checkID = this.id.charAt(this.id.length - 1);
                            var checkID = "#check" + checkID;
                            $(this).remove();
                            $(checkID).remove();
                            var mssID = this.id.charAt(this.id.length - 1);
                            var mssID = "#mss" + mssID;
                            $(this).remove();
                            $(mssID).remove();
                        });
                    });
                });

            </script>
        </body>

        </html>