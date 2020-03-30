<?php

include 'include/db.php';

include 'include/session.php';

$qId = $_GET['id'];

$sql = "SELECT * FROM as_quertion WHERE qus_id = $qId";
$result  = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$qName = $row["quertion"];
$qAns = $row["answer_id"];
$sId = $row["sub_id"];

$sql = "SELECT subject_name FROM as_subject WHERE sub_id = $sId";
$result  = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sName = $row["subject_name"];

$sql = "SELECT * FROM as_option WHERE qus_id = $qId";
$result  = mysqli_query($conn, $sql);

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('show_ques');

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
        </div>

        <div class="content-body">
            <!-- Table head options start -->
            <div class="row">
                <div class="col-lg-12 mt-4 mb-2">
                    <a href="add_qus.php" class="btn btn-primary">Add Question</a>
                    <a href="all_question.php" class="btn btn-success">All Questions</a>
                </div>

                <div class="col-12">
                    <div class="card">
                        <header class="card-header">
                            <h3 class="card-title">Subject:- <?= $sName; ?></h3>
                        </header>
                        <div class="card-body collapse show">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                echo '<p><strong>' . html_entity_decode($qName) . '</strong></p>';
                                echo '<ul class="showQus">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $option = str_replace('sqrt[]', "\\sqrt[]", $row['option']);
                                    $option = str_replace('(', "{", $option);
                                    $option = str_replace(')', "}", $option);
                                    $option_ar = explode('/', $option);
                                    if (count($option_ar) > 1) {
                                        $option = '\frac';
                                        foreach ($option_ar as $key => $value) {
                                            $option .= '{' . $value . '}';
                                        }
                                    }


                                    if (in_array($row["op_id"], json_decode($qAns))) {

                                        echo '<li class="green">$' . $option . '$</li>';
                                    } else {
                                        echo '<li>$' . $option . '$</li>';
                                    }
                                }
                                echo '</ul>';
                            }
                            ?>
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

$getFooter('show_ques');

?>