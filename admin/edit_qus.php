<?php

include 'include/db.php';

include 'include/session.php';

if (isset($_POST['qus'])) {
    $flg = 0;

    mysqli_query($conn, "DELETE FROM as_quertion WHERE qus_id = " . $_POST['pre_id'] . "");
    mysqli_query($conn, "DELETE FROM as_option WHERE qus_id = " . $_POST['pre_id'] . "");


    $flg = 0;
    $subject_id = validation($_POST['subject_id']);
    $quertion = validation($_POST['quertion']);
    $sql_insert = "INSERT INTO as_quertion (quertion, sub_id) Values ('" . $quertion . "', '" . $subject_id . "')";


    $req = mysqli_query($conn, $sql_insert);

    $qus_id = mysqli_insert_id($conn);
    // echo $qus_id;die();
    if (!$req) {
        mysql_query("ROLLBACK");
        $error = "Data not save successful";
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
        $success = "Data save successful";
    } else {
        $error = "Data not save successful";
    }
    echo "
        <script type='text/javascript'>
        window.location.replace('./all_question.php');
        </script>";
}

$qId = $_GET['id'];


$sql = "SELECT * FROM as_quertion WHERE qus_id = $qId";
$result  = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$qName = $row["quertion"];
$qAns = json_decode($row["answer_id"]);
$sId = $row["sub_id"];


$sql = "SELECT * FROM as_option WHERE qus_id = $qId";
$result  = mysqli_query($conn, $sql);
$select_result   = $result->fetch_all(MYSQLI_ASSOC);

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('edit_qus');

/**
 * ---------------------------------------------------------------------
 *  	            INCLUDING THE TOP FIXED NAVBAR
 * ---------------------------------------------------------------------
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
                <h3 class="content-header-title">Question</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Question
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
                        <header class="card-header">
                            <h3 class="card-title">Question Information</h3>
                        </header>
                        <div class="card-body collapse show">
                            <!-- FORM SUBMISSION STATUS ALERT MESSAGE -->
                            <?php if (isset($success)) : ?>
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

                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <input type="hidden" name="pre_id" value="<?= $qId; ?>">
                                <div class="form-group row justify-content-center">
                                    <label class="col-md-3 control-label" for="subject_id">Subject Name</label>
                                    <div class="col-md-6">
                                        <select required class="form-control" id="subject_id" name="subject_id">
                                            <?php
                                            $subject = '<option value="">--Select Subject---</option>';
                                            $sql = "SELECT * FROM as_subject";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $subject .= "<option " . ($sId == $row['sub_id'] ? 'selected' : '') . " value=" . $row['sub_id'] . ">" . $row['subject_name'] . "</option>";
                                            }
                                            echo $subject;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label class="col-md-3 control-label" for="subject_id">Quertion</label>
                                    <div class="col-md-6">
                                        <textarea required name="quertion"
                                            class="form-control"><?= $qName; ?></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="count" value="1" />
                                <div class="control-group row justify-content-center" id="fields">
                                    <label class="col-md-3 control-label" for="field1">Options</label>
                                    <div class="col-md-6 controls" id="profs">
                                        <div id="field">
                                            <?php
                                            foreach ($select_result as $key => $value) {
                                                ?>
                                            <input value="<?= $key; ?>" class=""
                                                <?= (in_array($value["op_id"], $qAns) ? 'checked' : '') ?>
                                                type="checkbox" name="checkcorr[]"> <small>If correct ans :) check
                                                me</small>
                                            <input class="form-control" autocomplete="off" class="input"
                                                value="<?= $value['option']; ?>" id="field1" name="option_name[]"
                                                type="text" placeholder="Type something" data-items="8" />
                                            <?php } ?>
                                            <!-- <button id="b1" class="btn add-more pull-right" type="button">+</button> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="offset-3 col-md-6">
                                        <br>
                                        <input type="submit" name="qus" class="btn btn-success" value="Edit Question">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end -->
        </div>
    </div>
</div>

<?php
/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML FOOTER AND SCRIPT TAGS
 * ---------------------------------------------------------------------
 * 
 */
$getFooter = require_once 'helpers/getFooter.php';

$getFooter('edit_qus');

?>