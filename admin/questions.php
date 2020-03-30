<?php

include 'include/db.php';

include 'include/session.php';

if (isset($_GET['user_id'])) {
    $sql_user = "SELECT * FROM as_user left join as_category on as_user.subject_id=as_category.cat_id where id='" . $_GET['user_id'] . "'";
    $result_user  = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_assoc($result_user);
}

if (isset($_GET['program_id'])) {
    $sql_program = "SELECT * FROM as_category where cat_id='" . $_GET['program_id'] . "'";
    $result_program  = mysqli_query($conn, $sql_program);
    $row_program = mysqli_fetch_assoc($result_program);
}

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('questions');

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
                        <header class="card-header text-center">
                            <h2 class="card-title">Question Set Ready</h2>
                            <button class="btn btn-danger mt-2 btn-sm" onclick="printDiv()">Print</button>
                        </header>
                        <div class="card-body collapse show">
                            <div id="DivIdToPrint">
                                <?php
                                $sql = "SELECT * FROM as_subject";
                                $select_result_sub = mysqli_query($conn, $sql);
                                $k = 1;
                                while ($select_row_sub = mysqli_fetch_array($select_result_sub)) {
                                    $sql = "SELECT * FROM as_quertion where sub_id = '" . $select_row_sub['sub_id'] . "' ORDER BY rand() limit " . $select_row_sub['subject_limit'] . "";
                                    $select_result = mysqli_query($conn, $sql);
                                    while ($select_row = mysqli_fetch_array($select_result)) {
                                        $k++;
                                    }
                                }
                                ?>
                                <table class="table">
                                    <tr>
                                        <td width="100px"><img src="./assets/images/logo.png" alt="BUBT" width="90px">
                                        </td>
                                        <td colspan="2" valign="top">
                                            <h2 align="center">Bangladesh University of Business and Technology
                                                (BUBT)</h2>
                                            <h3 align="center">Admission Test</h3>
                                        </td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td colspan="2" class="text-center">
                                            <?php if (isset($row_user['name'])) : ?>
                                            Name: <b><?= $row_user['name']; ?></b>&nbsp;&nbsp;
                                            <?php else :  ?>
                                            Name:..............................................&nbsp;&nbsp;
                                            <?php endif; ?>

                                            <?php if (isset($row_user['email'])) : ?>
                                            ID: <b><?= $row_user['email']; ?></b>&nbsp;&nbsp;
                                            <?php else : ?>
                                            ID:..............................................&nbsp;&nbsp;
                                            <?php endif; ?>

                                            <?php if (isset($row_user['categoryName'])) { ?>
                                            Program: <b><?= $row_user['categoryName']; ?></b>&nbsp;&nbsp;
                                            <?php } else {
                                                if (isset($row_program['categoryName'])) { ?>
                                            Program: <b><?= $row_program['categoryName']; ?></b>&nbsp;&nbsp;
                                            <?php } else { ?>
                                            Program:..............................................&nbsp;&nbsp;
                                            <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <br>
                                    </tr>
                                    <br>
                                </table>

                                <?php

                                $sql = "SELECT * FROM as_subject";

                                $select_result_sub = mysqli_query($conn, $sql);

                                $i = 1;

                                while ($select_row_sub = mysqli_fetch_array($select_result_sub)) :
                                    if (isset($_GET['program_id'])) {
                                        $limit_sql = "SELECT * FROM qus_limit WHERE sub_id='" . $select_row_sub['sub_id'] . "' and program_id='" . $_GET['program_id'] . "'";
                                    } else {
                                        $limit_sql = "SELECT * FROM qus_limit WHERE sub_id='" . $select_row_sub['sub_id'] . "' and program_id='" . $row_user['subject_id'] . "' ";
                                    }

                                    $select_result_limit = mysqli_query($conn, $limit_sql);
                                    $select_row_limit = mysqli_fetch_array($select_result_limit);

                                    $sql = "SELECT * FROM as_quertion where sub_id = '" . $select_row_sub['sub_id'] . "' ORDER BY rand() limit " . $select_row_limit['limit_qus'] . "";

                                    $select_result = mysqli_query($conn, $sql); ?>

                                <?php if (mysqli_num_rows($select_result) > 0) : ?>
                                <h3 class="subName mb-2">
                                    <span>Subject:-
                                        <u><?= $select_row_sub['subject_name'] ?></u>
                                    </span>
                                </h3>

                                <?php endif; ?>
                                <div class="row clearoption">
                                    <?php while ($select_row = mysqli_fetch_array($select_result)) : ?>
                                    <div class="col-md-6">
                                        <p style="font-size:15px;font-weight:600;">
                                            <?php
                                                    echo $i . ' ) ';
                                                    echo html_entity_decode($select_row['quertion']); ?>
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
                                    <?php
                                            $i++;
                                        endwhile;
                                        ?>
                                </div>
                                <?php endwhile; ?>
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

$getFooter('questions');

?>