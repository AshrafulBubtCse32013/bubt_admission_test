<?php

include 'include/db.php';

include 'include/session.php';

$id = $_GET['id'];
$msg = '';
$class = 'alert';
if ($_POST) {
    $hsc = $_POST['hsc'];
    $fname = $_POST['fname'];
    $stdemail = $_POST['stdemail'];
    $sing_name = $_POST['sing_name'];
    // $sing_email =$_POST['sing_email'];
    $sing_phone = $_POST['sing_phone'];
    // $sing_date_birth =$_POST['sing_date_birth']; 
    $sing_address = $_POST['sing_address'];

    $sql_update = "UPDATE as_user SET hsc_or_equ = '" . $hsc . "', name = '" . $sing_name . "', phone = '" . $sing_phone . "', f_name = '" . $fname . "', std_mail = '" . $stdemail . "', address = '" . $sing_address . "'  WHERE id = $id";
    $checksql = mysqli_query($conn, $sql_update);
    if ($checksql) {
        $msg = 'Student Update Successfully !';
        $class .= ' alert-success';
    } else {
        $msg = 'Student Update failed !';
        $class .= ' alert-danger';
    }
}
$sql = "SELECT * FROM as_user WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $hsc_or_equ = $row['hsc_or_equ'];
    $fname = $row['f_name'];
    $stdemail = $row['std_mail'];
    $phone = $row['phone'];
    $date_of_birth = $row['date_of_birth'];
    $semester_id = $row['semester_id'];
    $semsql = "SELECT * from semester WHERE sem_id = $semester_id";
    $select_semesSemsql = mysqli_query($conn, $semsql);
    $semName = mysqli_fetch_assoc($select_semesSemsql)['sem_name'];

    $subject_id = $row['subject_id'];
    $sql_sub = "SELECT * from as_category WHERE cat_id = $subject_id";
    $select_semes = mysqli_query($conn, $sql_sub);
    $subName = mysqli_fetch_assoc($select_semes)['categoryName'];
    if ($subName == '') {
        $subName = 'Select Program';
    }
}

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('regedit');

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
                <h3 class="content-header-title">Edit Student</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Student
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
                            <h3 class="card-title">Student Information</h3>
                        </header>
                        <div class="card-body collapse show">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Registration ID <sup style="color:red;">*</sup>
                                            </label>
                                            <input type="text" class="form-control" name="sing_email" required=""
                                                disabled value="<?= $email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>HSC/equivalent Reg. No <sup style="color:red;">*</sup>
                                            </label>
                                            <input type="text" class="form-control" name="hsc" required=""
                                                value="<?= $hsc_or_equ; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Name <sup style="color:red;">*</sup></label>
                                    <input type="text" class="form-control" name="sing_name" value="<?= $name; ?>"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Father's Name
                                    </label>
                                    <input type="text" class="form-control" name="fname" value="<?= $fname; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <sup style="color:red;">*</sup></label>
                                            <input type="text" class="form-control" name="sing_phone"
                                                value="<?= $phone; ?>" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" name="stdemail"
                                                value="<?= $stdemail; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="form-group">-->
                                <!--    <label>Date of Birth</label>-->
                                <!--    <input type="date" name="sing_date_birth" placeholder="mm/dd/yyyy" class="form-control" value="<?= $date_of_birth; ?>">-->
                                <!--</div>-->
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="sing_address"><?= $address; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            $sql = "SELECT * from semester WHERE sem_id != $semester_id";
                                            $select_semes = mysqli_query($conn, $sql);
                                            $i = 1;
                                            $select_semes   = $select_semes->fetch_all(MYSQLI_ASSOC);
                                            ?>
                                            <select required="" name="semester" class="form-control">
                                                <option value="<?= $semester_id; ?>"><?= $semName; ?></option>
                                                <?php
                                                foreach ($select_semes as $key => $value) { ?>
                                                <option value="<?= $value['sem_id']; ?>"><?= $value['sem_name']; ?>
                                                </option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            $sql = "SELECT * from as_category WHERE cat_id != $subject_id";
                                            $select_semes = mysqli_query($conn, $sql);
                                            $i = 1;
                                            $select_semes   = $select_semes->fetch_all(MYSQLI_ASSOC);
                                            ?>
                                            <select name="program" class="form-control">
                                                <option value="<?= $subject_id; ?>"><?= $subName; ?></option>
                                                <?php
                                                foreach ($select_semes as $key => $value) { ?>
                                                <option value="<?= $value['cat_id']; ?>"><?= $value['categoryName']; ?>
                                                </option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-success" name="save">
                                    <a href="all_reg.php" class="btn btn-success btn-xs pull-right">All Students</a>
                                </div>
                                <div class="form-group">
                                    <p class="<?= $class; ?>"><?= $msg; ?></p>
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

$getFooter('regedit');

?>