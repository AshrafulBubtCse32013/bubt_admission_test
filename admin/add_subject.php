<?php

include 'include/db.php';

include 'include/session.php';

$msg = '';

$class = 'alert';

if ($_POST) {
    $sub_name = validation($_POST['sub_name']);
    // $limit_q = validation($_POST['limit_q']);
    $sql_insert = "INSERT INTO as_subject (subject_name) Values ('" . $sub_name . "')";
    $checksql = mysqli_query($conn, $sql_insert);
    if ($checksql) {
        header("Location: all_subject.php");
    } else {
        die(mysql_error());
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
                        <header class="card-header">
                            <a href="all_subject.php" class="btn btn-primary">All Subjects</a>
                        </header>
                        <div class="card-block">
                            <div class="card-body">
                                <div class="form-group">
                                    <p class="<?= $class; ?>"><?= $msg; ?></p>
                                </div>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                    enctype="multipart/form-data">

                                    <h5 class="mt-2" for="inputDefault">Subject Name</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="inputDefault" name="sub_name">
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <input type="submit" class="btn btn-success" value="Add Subject">
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

$getFooter('add_subject');

?>