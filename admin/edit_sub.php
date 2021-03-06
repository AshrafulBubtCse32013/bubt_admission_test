<?php

include 'include/db.php';

include 'include/session.php';

$id = $_GET['id'];
if ($_POST) {
    $sub_name = validation($_POST['sub_name']);
    $limit_q = validation($_POST['limit_q']);
    $sql_update = "UPDATE as_subject SET subject_name = '" . $sub_name . "' WHERE sub_id = $id";
    $checksql = mysqli_query($conn, $sql_update);
    if ($checksql) {
        header("Location: all_subject.php");
    } else {
        die(mysql_error());
    }
}
$sql = "SELECT * FROM as_subject WHERE sub_id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $subject = $row['subject_name'];
    $limit = $row['subject_limit'];
}

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('edit_sub');

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
                <h3 class="content-header-title">Edit Subject</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Subject
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
                            <h3 class="card-title"> Subject Information</h3>
                        </header>
                        <div class="card-body collapse show">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="form-group row justify-content-center">
                                    <label class="col-md-3 control-label" for="inputDefault">Subject Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="inputDefault" name="sub_name"
                                            value="<?= $subject ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="offset-3 col-md-6">
                                        <input type="submit" class="btn btn-success" value="Update">
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

$getFooter('edit_sub');

?>