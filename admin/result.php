<?php

include 'include/db.php';

include 'include/session.php';

$u_id = $_GET["id"];

error_reporting(E_ALL);

$nameId = "SELECT as_user.*, as_result.is_manual, as_category.categoryName, semester.* FROM as_result JOIN as_user ON as_user.id = as_result.user_id left join as_category on as_user.subject_id=as_category.cat_id left join semester on semester.sem_id=as_user.semester_id WHERE re_id=$u_id";
$nameidresult = mysqli_query($conn, $nameId);
$nidrow = mysqli_fetch_array($nameidresult);
$name = $nidrow["input_name"];
$stid = $nidrow["email"];
$is_manual = $nidrow["is_manual"];
// $total_qus = $nidrow["total_qus"];
// $c_ans = $nidrow["c_ans"];


// print_r($select_result);
$j = 1;

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('result');

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
                <h3 class="content-header-title">Individual Result Print</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Individual Result Print
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
                            <button class="btn btn-danger" onclick="print_css('only_result')">Print This</button>
                            <!--<button class="btn btn-danger" onclick="print_css('full_print')">Print Answer Sheet</button>-->
                            <a href="group_result.php" class="btn btn-primary pull-right">Group Wise</a>&nbsp;
                            <a href="allresultprint.php" class="btn btn-success pull-right">All Result</a>
                        </header>
                        <div class="card-body collapse show">
                            <div id="only_result">
                                <div class="text-center">
                                    <img src="./assets/images/bubt_logo.png" alt="BUBT">
                                    <h3>Admission Test Result</h3>
                                </div>
                                <br>
                                <?php
                                $sum = 0;
                                $out = 0;
                                $re_id = $u_id;
                                ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>SL no:</td>
                                                        <td><?= $nidrow["email"]; ?></td>
                                                        <td>HSC/equivalent Reg. No:</td>
                                                        <td><?= $nidrow["hsc_or_equ"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td><?= $nidrow["input_name"]; ?></td>
                                                        <td>Father's Name:</td>
                                                        <td><?= $nidrow["f_name"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program:</td>
                                                        <td><?= $nidrow["categoryName"]; ?></td>
                                                        <td>Semester:</td>
                                                        <td><?= $nidrow["sem_name"] . ', ' . $nidrow["year"]; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <br>
                                            <?php if ($is_manual == 0) { ?>
                                            <div class="table-responsive">
                                                <table class="as_table table table-bordered">
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Mark</th>
                                                    </tr>
                                                    <?php

                                                            $sql2 = "SELECT as_subject.* FROM sa_result_de left join as_quertion on as_quertion.qus_id=sa_result_de.qus_id LEFT JOIN as_subject ON as_quertion.sub_id=as_subject.sub_id  WHERE sa_result_de.re_id='" . $re_id . "'  GROUP BY as_subject.sub_id";
                                                            //   echo $sql2;
                                                            $select_result = mysqli_query($conn, $sql2);
                                                            $i = 1;
                                                            $select_result   = $select_result->fetch_all(MYSQLI_ASSOC);
                                                            $total_qus = 0;
                                                            $total_cor = array();
                                                            foreach ($select_result as $key => $select_row) {

                                                                $sql = "SELECT sa_result_de.*  FROM sa_result_de left join as_quertion on as_quertion.qus_id=sa_result_de.qus_id WHERE sa_result_de.re_id='" . $re_id . "'  and as_quertion.sub_id='" . $select_row['sub_id'] . "'";

                                                                $select_subje = mysqli_query($conn, $sql);
                                                                $i = 1;
                                                                $select_subje   = $select_subje->fetch_all(MYSQLI_ASSOC);
                                                                $count = 0;

                                                                foreach ($select_subje as $key_subje => $value_subje) {

                                                                    $submit_option = json_decode($value_subje['submit_option']);
                                                                    $correct_option = json_decode($value_subje['correct_option']);
                                                                    $check_result = array_diff($submit_option, $correct_option);
                                                                    if (!count($check_result)) {
                                                                        $check_result = array_diff($correct_option, $submit_option);
                                                                    }

                                                                    if (count($check_result) == 0) {
                                                                        if (isset($total_cor[$select_row['sub_id']])) {
                                                                            $total_cor[$select_row['sub_id']] = $total_cor[$select_row['sub_id']] + 1;
                                                                        } else {
                                                                            $total_cor[$select_row['sub_id']] = 1;
                                                                        }
                                                                    } else {
                                                                        if (isset($total_cor[$select_row['sub_id']])) {
                                                                            $total_cor[$select_row['sub_id']] = $total_cor[$select_row['sub_id']];
                                                                        } else {
                                                                            $total_cor[$select_row['sub_id']] = 0;
                                                                        }
                                                                    }
                                                                    $total_qus++;
                                                                }
                                                                $sum += $total_cor[$select_row['sub_id']];
                                                                ?>
                                                    <tr>
                                                        <th>
                                                            <?php echo $select_row['subject_name']; ?>
                                                        </th>
                                                        <td>
                                                            <?php
                                                                            if ($total_cor[$select_row['sub_id']] < 1) {
                                                                                echo 0;
                                                                            } else {
                                                                                echo $total_cor[$select_row['sub_id']];
                                                                            }
                                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php $j++;
                                                            }
                                                            ?>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td><?= $sum; ?> Out Of <?= $total_qus; ?></td>
                                                    </tr>

                                                </table>
                                            </div>
                                            <?php } else { ?>
                                            <div class="table-responsive">
                                                <table class="as_table table table-bordered">
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Mark</th>
                                                    </tr>
                                                    <?php

                                                            $sql = "SELECT *  FROM manual_result left join as_subject on as_subject.sub_id=manual_result.sub_id WHERE manual_result.rerult_id='" . $re_id . "'";
                                                            // echo $sql;
                                                            $select_subje = mysqli_query($conn, $sql);
                                                            $i = 1;
                                                            $select_subje   = $select_subje->fetch_all(MYSQLI_ASSOC);
                                                            $count = 0;

                                                            foreach ($select_subje as $key_subje => $value_subje) {

                                                                ?>
                                                    <tr>
                                                        <th>
                                                            <?php echo $value_subje['subject_name']; ?>
                                                        </th>
                                                        <td>
                                                            <?php
                                                                            echo $value_subje['c_ans'];
                                                                            $sum += $value_subje['c_ans'];
                                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php $j++;
                                                            } ?>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td><?= $sum; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container">
                                <div class="row needCls">
                                    <?php
                                    $re_id = $_GET['id'];
                                    $sql = "SELECT * FROM sa_result_de LEFT JOIN as_quertion ON sa_result_de.qus_id = as_quertion.qus_id where sa_result_de.re_id = '" . $re_id . "' ; ";
                                    $select_result = mysqli_query($conn, $sql);
                                    $i = 1;
                                    while ($select_row = mysqli_fetch_array($select_result)) {
                                        ?>
                                    <div class="col-md-6">
                                        <h4><?php echo $i . ' ) ';
                                                    echo html_entity_decode($select_row['quertion']);
                                                    $qAns = $select_row["answer_id"];
                                                    $qSub = $select_row["submit_option"];
                                                    ?></h4>
                                        <?php $qus_id = $select_row['qus_id'];
                                                $sql1 = "SELECT * FROM as_option where qus_id = '" . $qus_id . "'";
                                                $select_result1 = mysqli_query($conn, $sql1);

                                                while ($select_row1 = mysqli_fetch_array($select_result1)) {
                                                    $option = str_replace('sqrt[]', "\\sqrt[]", $select_row1['option']);
                                                    $option = str_replace('(', "{", $option);
                                                    $option = str_replace(')', "}", $option);
                                                    $option_ar = explode('/', $option);
                                                    if (count($option_ar) > 1) {
                                                        $option = '\frac';
                                                        foreach ($option_ar as $key => $value) {
                                                            $option .= '{' . $value . '}';
                                                        }
                                                    }
                                                    ?>
                                        <div class="checkbox">
                                            <label class="
                                    <?php
                                            if (in_array($select_row1["op_id"], json_decode($qAns))) {
                                                echo " green ";
                                            }
                                            if (in_array($select_row1["op_id"], json_decode($qSub))) {
                                                echo " click ";
                                            }
                                            if ($select_row['submit_option'] != $select_row['correct_option']) {
                                                if ($select_row['submit_option'] == $select_row1['op_id']) {
                                                    echo " red ";
                                                }
                                                if ($select_row['submit_option'] == 0) {
                                                    echo " notSubmit ";
                                                }
                                            } else {
                                                echo "click";
                                            }
                                            ?>
                                  ">
                                                <?php echo '$' . $option . '$'; ?>
                                            </label>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                        $i++;
                                    } ?>
                                </div>
                            </div>
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

$getFooter('result');

?>