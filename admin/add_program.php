<?php

include 'include/db.php';

include 'include/session.php';

if ($_POST) {
    $sub_name = validation($_POST['sub_name']);
    $sql_insert = "INSERT INTO as_category (categoryName) Values ('" . $sub_name . "')";
    mysqli_query($conn, $sql_insert) or die(mysql_error());
    header("Location: all_program.php");
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="all_program.php" class="btn btn-primary"> All Programs </a>
                        </div>
                        <div class="card-block">
                            <div class="card-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                    enctype="multipart/form-data">
                                    <h5 class="mt-2" for="inputDefault">Program Name</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="inputDefault" name="sub_name">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="submit" class="btn btn-success" value="Add Program">
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