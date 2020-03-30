<?php

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('dashboard');

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
        </div>
        <div class="content-body">
            <!-- Chart -->
            <div class="row match-height">
                <div class="col-12">
                    <div class="">
                        <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
                    </div>
                </div>
            </div>
            <!-- Chart -->
            <!-- eCommerce statistic -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <section class="py-3">
                        <div class="text-center">
                            <h1><strong style="color:#2C2F81;">BUBT</strong> Admission Test</h1>
                            <!--<a href="questions.php" class="btn btn-primary">Generate Question set</a>-->
                        </div>
                    </section>
                </div>
                <div class="col-lg-6 col-md-12">
                    <section class="card pull-up ecom-card-1 bg-white">
                        <header class="card-header">
                            <h5 class="text-muted danger">
                                <?php echo ucwords('manage students'); ?>
                            </h5>
                        </header>
                        <div class="card-content ecom-card2 height-180">
                            <div class="d-flex flex-row h-100">
                                <div class="col-md-6">
                                    <a href="add_std.php" class="h-100 d-block">
                                        <div class="card card-body bg-primary text-white">
                                            <div class="d-flex flex-row">
                                                <div class="widget-summary-col widget-summary-col-icon px-1">
                                                    <div class="rounded-circle">
                                                        <i class="la la-user-plus" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col middleTitle px-1">
                                                    <h4 class="card-title text-white">Add Student Info</h4>
                                                    <small class="card-subtitle">( student Registration
                                                        )</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="all_reg.php" class="h-100 h-100 d-block">
                                        <div class="card card-body bg-secondary text-white">
                                            <div class="d-flex flex-row">
                                                <div class="widget-summary-col widget-summary-col-icon px-1">
                                                    <div class="rounded-circle">
                                                        <i class="la la-users" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col middleTitle px-1">
                                                    <h4 class="card-title text-white">Show All Students</h4>
                                                    <small class="card-subtitle">( show, Edit, Delete)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <header class="card-header">
                            <h5 class="text-muted info">
                                <?php echo ucwords('manage questions'); ?>
                            </h5>
                        </header>
                        <div class="card-content ecom-card2 height-180">
                            <div class="d-flex flex-row h-100">
                                <div class="col-md-6">
                                    <a href="add_qus.php" class="h-100 d-block">
                                        <div class="card card-body bg-primary text-white">
                                            <div class="d-flex flex-row">
                                                <div class="widget-summary-col widget-summary-col-icon px-1">
                                                    <div class="rounded-circle">
                                                        <i class="la la-question" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col middleTitle px-1">
                                                    <h4 class="card-title text-white">Add Question</h4>
                                                    <small class="card-subtitle">( Single or Bulk )</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="all_question.php" class="h-100 d-block">
                                        <div class="card card-body bg-secondary text-white">
                                            <div class="d-flex flex-row">
                                                <div class="widget-summary-col widget-summary-col-icon px-1">
                                                    <div class="rounded-circle">
                                                        Q
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col middleTitle px-1">
                                                    <h4 class="card-title text-white">Show All Questions</h4>
                                                    <small class="card-subtitle">( show, Edit, Delete)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <header class="card-header">
                            <h5 class="text-muted success">
                                <?php echo ucwords('print result'); ?>
                            </h5>
                        </header>
                        <div class="card-content ecom-card2 height-180">
                            <div class="d-flex flex-row h-100">
                                <div class="col-md-4">
                                    <a href="individual.php" class="h-100 d-block">
                                        <div class="card card-body bg-primary text-white">
                                            <div class="d-flex flex-row">
                                                <div class="widget-summary-col widget-summary-col-icon px-1">
                                                    <div class="rounded-circle">
                                                        R
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col middleTitle px-1">
                                                    <h4 class="card-title text-white">individual Student</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="group_result.php" class="h-100 d-block">
                                        <div class="card card-body bg-secondary text-white">
                                            <div class="d-flex flex-row">
                                                <div class="widget-summary-col widget-summary-col-icon px-1">
                                                    <div class="rounded-circle">
                                                        Q
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col middleTitle px-1">
                                                    <h4 class="card-title text-white">Group wise</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="allresultprint.php" class="h-100 d-block">
                                        <div class="card card-body bg-danger text-white">
                                            <div class="d-flex flex-row">
                                                <div class="widget-summary-col widget-summary-col-icon px-1">
                                                    <div class="rounded-circle">
                                                        <i class="la la-globe" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col middleTitle px-1">
                                                    <h4 class="card-title text-white">All Results</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-4">
                    <div class="card pull-up ecom-card-1 bg-white">
                        <header class="card-header">
                            <h5 class="text-muted warning">
                                <?php echo ucwords('upload result'); ?>
                            </h5>
                        </header>
                        <div class="card-content ecom-card2 height-180">
                            <div class="d-flex flex-row h-100 justify-content-center">
                                <div class="col-md-8">
                                    <a href="result_upload.php" class="d-block h-100">
                                        <div class="card card-body bg-primary text-white">
                                            <div class="d-flex flex-row">
                                                <div class="widget-summary-col widget-summary-col-icon px-1">
                                                    <div class="rounded-circle">
                                                        <i class="la la-upload" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col middleTitle px-1">
                                                    <h4 class="card-title text-white">Upload Result</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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

$getFooter('dashboard');

?>