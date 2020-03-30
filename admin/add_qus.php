<?php

include 'include/db.php';

include 'include/session.php';

function str_re($str = '√')
{
    $str = str_replace("√", "sqrt[]", $str);
    return $str;
}

if (isset($_POST['qus'])) {
    $flg = 0;
    $subject_id = validation($_POST['subject_id']);
    $quertion = validation($_POST['quertion']);
    $sql_insert = "INSERT INTO as_quertion (quertion, sub_id) Values ('" . $quertion . "', '" . $subject_id . "')";

    $req = mysqli_query($conn, $sql_insert);

    $qus_id = mysqli_insert_id($conn);
    // echo $qus_id;die();
    if (!$req) {
        mysql_query("ROLLBACK");
        $error = "Question not Upload!";
        echo "
        <script type='text/javascript'>
        window.location.replace('./" . basename($_SERVER['PHP_SELF']) . "');
        </script>";
    }

    if (!$req) {
        $flg = 1;
    }

    $option_name = $_POST['option_name'];
    $i = 0;
    $pusarr = array();
    foreach ($option_name as $value) {
        $value = validation($value);
        $value = str_re($value);
        $sql_insert = "INSERT INTO as_option (qus_id, `option`) Values ('" . $qus_id . "', '" . $value . "')";
        $re = mysqli_query($conn, $sql_insert);

        // echo "<pre>";
        // print_r($_POST['checkcorr']).'/';
        // echo $i."/";

        if (in_array($i, $_POST['checkcorr'])) {
            $last_id = mysqli_insert_id($conn);
            // echo $last_id.'/';
            array_push($pusarr, $last_id);
        }

        if (!$re) {
            $flg = 1;
        }

        $i++;
    }

    $answer_ids = json_encode($pusarr);
    $sql_insert = "UPDATE as_quertion SET answer_id='" . $answer_ids . "' WHERE qus_id='" . $qus_id . "'";
    mysqli_query($conn, $sql_insert);

    // die();
    if ($flg == 0) {
        $success = "Question save successful";
    } else {
        $error = "Question not Upload!";
    }
}

if (isset($_POST['file_upload'])) {
    $path = $_FILES["file"]["name"];
    $filename = $_FILES["file"]["tmp_name"];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    echo $ext;
    if ($ext == "csv") {

        $arr = array(array(), array());
        $num = 0;
        $row = 0;
        $handle = fopen($filename, "r");

        $i = 0;
        $j = 0;
        $k = 0;
        $array = array();
        $array2 = array();
        while ($data = fgetcsv($handle, 1000, ",")) {
            $the_big_array[] = $data;
            if ($i == 0) {
                $i++;
                foreach ($data as $key => $value) {
                    $array[$key] = $value;
                }
            } else {
                foreach ($data as $key => $value) {
                    if (strpos($array[$key], 'option') !== false) {
                        $array2[$j]['option'][$k] = $value;
                        $k++;
                    } else {
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
            foreach ($option_name as $value) {
                // $value = validation($value);
                $value = ($value);
                $value = str_re($value);
                $sql_insert = "INSERT INTO as_option (qus_id, `option`) Values ('" . $qus_id . "', '" . $value . "')";
                $re = mysqli_query($conn, $sql_insert);
                if (in_array($i, $answer_ids)) {
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
}

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader();

/**
 * ---------------------------------------------------------------------
 *  	            INCLUDING THE TOP FIXED NAVBAR
 * -----------required----------------------------------------------------------
 * 
 */
include_once 'fixed-top-bar.view.php';

/**
 * ---------------------------------------------------------------------
 *  	INCLUDING THE NAVIGATION BAR TO NAVIGATE BETWEEN PAGES
 * ---------------------------------------------------------------------
 * 
 */
include_once 'navigation-bar.view.php';

?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Tables</h3>
            </div>
            <!-- TODO: CHANGE THE BREADCRUMB -->
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tables
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Table head options start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <button data-toggle="modal" data-target="#exampleModal"
                                class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary">Bulk
                                Input
                            </button>

                            <a href="./assets/file/example_qus.csv" class="btn btn-success" target="_blank">Download
                                Question Format
                            </a> -->

                            <a href="all_question.php" class="btn btn-success pull-right">All Questions</a>
                        </div>
                        <div class="card-block">
                            <div class="card-body">
                                <?php
                                if (isset($success)) : ?>
                                <div class="alert alert-success alert-dismissable"> <a href="#" class="close"
                                        data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong>
                                    <?php echo $success; ?>
                                </div>
                                <?php endif; ?>

                                <?php if (isset($error)) : ?>
                                <div class="alert alert-danger alert-dismissable"> <a href="#" class="close"
                                        data-dismiss="alert" aria-label="close">Ã—</a> <strong>Danger!</strong>
                                    <?php echo $error; ?>
                                </div>
                                <?php endif; ?>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                    enctype="multipart/form-data">
                                    <h5 class="mt-2">Subject Name</h5>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="subject_id" name="subject_id">
                                            <option value="">--Select Subject---</option>
                                            <?php
                                            $sql = "SELECT * FROM as_subject";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                            <option value="<?= $row['sub_id'] ?>"> <?= $row['subject_name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </fieldset>

                                    <h5 class="mt-2">Question</h5>
                                    <fieldset class="form-group">
                                        <textarea name="quertion" class="form-control" id="question"
                                            rows="3"></textarea>
                                    </fieldset>


                                    <input type="hidden" name="count" value="1" />
                                    <div class="control-group" id="fields">
                                        <h5 class="mt-2" for="field1">Options</h5>
                                        <span id="profs">
                                            <fieldset id="field">
                                                <input value="0" class="" type="checkbox" name="checkcorr[]"> <small>If
                                                    correct ans :) check me</small>
                                                <input class="form-control" autocomplete="off" class="input" id="field1"
                                                    name="option_name[]" type="text" placeholder="Type something"
                                                    data-items="8" />
                                                <button id="b1" class="btn add-more pull-right" type="button">+</button>
                                            </fieldset>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="qus" class="btn btn-success" value="Add Question">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <header class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Question on CSV format</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>
            <form class="form-horizontal form-bordered" method="post" action="" enctype="multipart/form-data">

                <div class="modal-body">

                    <?php
                    $sql = "SELECT * FROM as_subject";
                    $result  = mysqli_query($conn, $sql);
                    $select_result   = $result->fetch_all(MYSQLI_ASSOC);
                    ?>
                    <select name="category" required="" class="form-control">
                        <option value="">Select Subject</option>
                        <?php
                        foreach ($select_result as $key => $value) { ?>
                        <option value="<?= $value['sub_id']; ?>"><?= $value['subject_name']; ?></option>

                        <?php }
                        ?>
                    </select>
                    <br>
                    <input type="file" name="file" accept=".csv">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" name="file_upload" value="Upload" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php
/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML FOOTER AND SCRIPT TAGS
 * ---------------------------------------------------------------------
 * 
 */
$getFooter = require_once 'helpers/getFooter.php';

$getFooter('add_question');

?>