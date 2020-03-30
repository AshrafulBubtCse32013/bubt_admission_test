<?php

include 'include/db.php';
include 'include/session.php';
$msg = '';
$class = 'alert';
$sql = "SELECT * FROM as_category";
$result  = mysqli_query($conn, $sql);


if ($_POST) {
    $sing_email = $_POST['sing_email'];
    $sqlu = "SELECT * FROM as_user WHERE email = '$sing_email'";
    $resultu  = mysqli_query($conn, $sqlu);
    if (mysqli_num_rows($resultu) < 1) {
        $msg = 'Student Not Registerd !';
        $class .= ' alert-danger';
    } else {
        $row = mysqli_fetch_assoc($resultu);
        $u_id = $row['id'];
        $sqluex = "SELECT * FROM as_result WHERE user_id = '$u_id'";
        $resultuex = mysqli_query($conn, $sqluex);
        if (mysqli_num_rows($resultuex) > 0) {
            $msg = 'Student Admission Test Alerady Completed!';
            $class .= ' alert-danger';
        } else {
            $program = $_POST['program_name'];
            $total_qus = $_POST['total_qus'];
            $subject = $_POST['subject'];
            $total_c = array_sum($_POST['subject']);

            $sql_insert = "INSERT INTO as_result (user_id, total_qus, c_ans, is_manual) Values ('" . $u_id . "', '" . $total_qus . "', '" . $total_c . "', 1)";
            mysqli_query($conn, $sql_insert) or die(mysql_error());
            $last_id = mysqli_insert_id($conn);

            foreach ($subject as $key => $value) {
                $sql_ins = "INSERT INTO manual_result (sub_id, rerult_id, c_ans) Values ('" . $key . "', '" . $last_id . "', '" . $value . "')";

                mysqli_query($conn, $sql_ins) or die(mysql_error());
            }

            $sql_insert = "UPDATE as_user SET subject_id='" . $program . "' WHERE id='" . $u_id . "'";
            mysqli_query($conn, $sql_insert);
        }
    }
    // die();

}

$sql = "SELECT * FROM as_category";
$result  = mysqli_query($conn, $sql);

$sql_sub = "SELECT * FROM as_subject";
$result_sub  = mysqli_query($conn, $sql_sub);
$select_result   = $result_sub->fetch_all(MYSQLI_ASSOC);


/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('result_upload');

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
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <header class="card-header">
                            <h2>Upload Result</h2>
                        </header>
                        <div class="card-block">
                            <div class="card-body">
                                <div class="form-group">
                                    <p class="<?= $class; ?>"><?= $msg; ?></p>
                                </div>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="mt-2">SL no <sup style="color:red;">*</sup>
                                            </h5>
                                            <fieldset class="form-group">

                                                <input type="text" class="form-control" name="sing_email" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <?php if (mysqli_num_rows($result) > 0) : ?>
                                                <h5 class="mt-2">Program <sup style="color:red;">*</sup></h5>
                                                <select id="program_change" name="program_name" required=""
                                                    class="form-control">
                                                    <option value="">-- Program --</option>
                                                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                    <option value="<?= $row["cat_id"]; ?>"><?= $row["categoryName"]; ?>
                                                    </option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <?php endif; ?>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="mt-2">Total Qus<sup style="color:red;">*</sup>
                                            </h5>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="total_qus" required="">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="show_program"></div>
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-primary" name="result_up">
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

<?php
/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML FOOTER AND SCRIPT TAGS
 * ---------------------------------------------------------------------
 * 
 */
$getFooter = require_once 'helpers/getFooter.php';

$getFooter('result_upload');

?>