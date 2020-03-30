<?php

include 'include/db.php';

include 'include/session.php';

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('print_question');

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
            <div class="col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Generate Questions</h3>
            </div>
        </div>

        <div class="content-body">
            <!-- Table head options start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <form method="POST" action="#">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="mt-2">Question</h5>
                                        <fieldset class="form-group">
                                            <input name="question_set_amount" class="form-control"
                                                id="question_set_amount" />
                                        </fieldset>
                                    </div>

                                    <div class="col">
                                        <h5 class="mt-2">Department</h5>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="department" name="department">
                                                <option value="">--Select Department---</option>
                                                <?php
                                                $sql = "SELECT * FROM as_category";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <option value="<?= $row['cat_id'] ?>"> <?= $row['categoryName'] ?>
                                                </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <button type="submit" name="print_question" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['print_question'])) :

                        $setAmount = $_POST['question_set_amount'];
                        $department = $_POST['department'];

                        for ($set = 1; $set <= $setAmount; $set++) :
                            // Bringing all subjects
                            $sql = "SELECT * FROM as_subject";
                            $select_result_sub = mysqli_query($conn, $sql);
                            $questionNum = 1;
                            ?>
                    <div class="card">
                        <div class="text-center my-2">
                            <form action="print_question_pdf.php" method="POST">
                                <input type="hidden" name="" value="" />
                                <input type="submit" name="print_ques_single" class="btn btn-primary" value="Print" />
                            </form>
                        </div>
                        <h3 class="text-center header p-2">Set-<?php echo $set; ?></h3>
                        <?php while ($select_row_sub = mysqli_fetch_array($select_result_sub)) :
                                            // Getting the limits of those fetched subjects
                                            $limit_sql = "SELECT * FROM qus_limit WHERE sub_id='" . $select_row_sub['sub_id'] . "' AND program_id='" . $department . "'";
                                            $select_result_limit = mysqli_query($conn, $limit_sql);
                                            $select_row_limit = mysqli_fetch_array($select_result_limit);

                                            // Bringing the questions of those subjects
                                            $sql = "SELECT * FROM as_quertion WHERE sub_id = '" . $select_row_sub['sub_id'] . "' ORDER BY rand() LIMIT " . $select_row_limit['limit_qus'] . "";
                                            $select_result = mysqli_query($conn, $sql);
                                            ?>
                        <?php if (mysqli_num_rows($select_result) > 0) : ?>
                        <header class="card-header text-center">
                            <h3 class="subName mb-2">
                                <span>Subject:-
                                    <u><?= $select_row_sub['subject_name'] ?></u>
                                </span>
                            </h3>
                        </header>
                        <div class="card-body row">
                            <?php while ($select_row = mysqli_fetch_array($select_result)) : ?>
                            <div class="col-md-6">
                                <p style="font-size:15px;font-weight:600;">
                                    <?php
                                                                            echo $questionNum . ' ) ';
                                                                            echo (html_entity_decode($select_row['quertion'])); ?>
                                </p>
                                <?php
                                                                        $qus_id = $select_row['qus_id'];
                                                                        $sql1 = "SELECT * FROM as_option where qus_id = '" . $qus_id . "'";
                                                                        $select_result1 = mysqli_query($conn, $sql1); ?>
                                <ol type="a">
                                    <?php while ($select_row1 = mysqli_fetch_array($select_result1)) :
                                                                                $option = str_replace('sqrt[]', "\\sqrt[]", $select_row1['option']);
                                                                                $option = str_replace('(', "{", $option);
                                                                                $option = str_replace(')', "}", $option);
                                                                                $option_ar = explode('/', $option);
                                                                                if (count($option_ar) > 1) {
                                                                                    $option = '\frac';
                                                                                    foreach ($option_ar as $key => $value) {
                                                                                        $option .= '{' . $value . '}';
                                                                                    }
                                                                                } ?>
                                    <li><?php echo '$' . $option . '$'; ?></li>
                                    <?php endwhile; ?>
                                </ol>
                                </br>
                            </div>
                            <?php $questionNum++ ?>
                            <?php endwhile; ?>
                        </div>

                        <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                    <?php endfor;
                    endif; ?>
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

$getFooter('print_question');

?>