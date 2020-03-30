<?php

include 'include/db.php';

include 'include/session.php';

$msg = '';

$class = 'alert';

if (isset($_POST['sing_submit'])) {
    $sing_name = $_POST['sing_name'];
    $hsc = $_POST['hsc'];
    $fname = $_POST['fname'];
    $stdemail = $_POST['stdemail'];
    $sing_email = $_POST['sing_email'];
    $sing_phone = $_POST['sing_phone'];
    $sing_semester = $_POST['semester'];
    $sing_program = ($_POST['program'] != '' ? $_POST['program'] : 0);

    // $sing_date_birth =$_POST['sing_date_birth']; 
    $sing_address = $_POST['sing_address'];
    $sql = "SELECT * FROM as_user where email = '" . $sing_email . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $msg = 'ID Already Used !';
        $class .= ' alert-danger';
    } else {
        $sql_insert = "INSERT INTO as_user (input_name, name, email, phone, address, hsc_or_equ, std_mail,f_name, semester_id, subject_id) Values 
   ('test student', '$sing_name', '$sing_email', '$sing_phone', '$sing_address', '$hsc', '$stdemail', '$fname', '$sing_semester', '$sing_program')";
        //   echo $sql_insert; die();

        mysqli_query($conn, $sql_insert) or die('Error!');
        $_SESSION['sec_email'] = $_POST['sing_email'];
        $_SESSION['name'] = $_POST['sing_name'];
        $msg = 'Student Added Successfully !';
        $class .= ' alert-success';
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
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>Student Information</h2>
                        </div>
                        <div class="card-block">
                            <div class="card-body">
                                <div class="form-group">
                                    <p class="<?= $class; ?>"><?= $msg; ?></p>
                                </div>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                    enctype="multipart/form-data">

                                    <!-- SERIAL NUMBER AND HSC REGISTRATION NUMBER INPUT ELEMENTS -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mt-2">SL no <sup style="color:red;">*</h5>
                                            <fieldset class="form-group">
                                                </label>
                                                <input type="text" class="form-control" name="sing_email" required=""
                                                    value="<?= time(); ?>" readonly="readonly">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <h5 class="mt-2">HSC/equivalent Reg. No <sup style="color:red;">*</sup>
                                                </h5>
                                                <input type="text" class="form-control" name="hsc" required="">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <!-- STUDENT'S NAME INPUT ELEMENT -->
                                    <h5 class="mt-2">Name <sup style="color:red;">*</sup></h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" name="sing_name" required="">
                                    </fieldset>

                                    <!-- STUDENT'S FATHER'S NAME INPUT ELEMENT -->
                                    <h5 class="mt-2">Father's Name</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" name="fname">
                                    </fieldset>

                                    <!-- STUDENT'S PHONE NUMBER AND EMAIL INPUT ELEMENT -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mt-2">Phone <sup style="color:red;">*</sup></h5>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="sing_phone" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mt-2">E-mail</h5>
                                            <fieldset class="form-group">
                                                <input type="email" class="form-control" name="stdemail">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <!-- STUDENT'S ADDRESS INPUT ELEMENT -->
                                    <h5 class="mt-2">Address</h5>
                                    <fieldset class="form-group">
                                        <textarea class="form-control" name="sing_address"></textarea>
                                    </fieldset>

                                    <!-- STUDENT'S SEMESTER AND PROGRAMME SELECTION INPUT ELEMENT -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <?php
                                                $sql = "SELECT * from semester";
                                                $select_semes = mysqli_query($conn, $sql);
                                                $i = 1;
                                                $select_semes = $select_semes->fetch_all(MYSQLI_ASSOC);
                                                ?>
                                                <select required="" name="semester" class="form-control">
                                                    <option value="">Select Semester</option>
                                                    <?php foreach ($select_semes as $key => $value) : ?>
                                                    <option value="<?= $value['sem_id']; ?>">
                                                        <?= $value['sem_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <?php
                                                $sql = "SELECT * from as_category";
                                                $select_semes = mysqli_query($conn, $sql);
                                                $i = 1;
                                                $select_semes   = $select_semes->fetch_all(MYSQLI_ASSOC);
                                                ?>
                                                <select name="program" class="form-control">
                                                    <option value="">Select Program</option>
                                                    <?php
                                                    foreach ($select_semes as $key => $value) { ?>
                                                    <option value="<?= $value['cat_id']; ?>">
                                                        <?= $value['categoryName']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <fieldset class="form-group">
                                        <input type="submit" value="Add Student" class="btn btn-primary"
                                            name="sing_submit">
                                        <a href="all_reg.php" class="btn btn-success btn-xs pull-right">All Students</a>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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