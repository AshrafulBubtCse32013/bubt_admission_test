<?php

include 'include/db.php';

include 'include/session.php';

$msg = '';

if (isset($_POST['searchbtn'])) {
    $stdid = $_POST['serarchid'];
    $sql = "SELECT * FROM as_result JOIN as_user ON as_result.id = as_user.id  WHERE email = '$stdid'";
    $result  = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("Location: userInfo.php");
    } else {
        $msg = '<div class="col-md-12 clearfix">
        <p style="background:#31B0D5;padding:10px;clear:both;color:#fff;">Result Not Found</p>
    </div>';
    }
}

$sql = "SELECT user.id, user.name, user.email, user.hsc_or_equ, result.total_qus, result.re_id, result.c_ans  FROM as_result AS result LEFT JOIN as_user AS user ON result.user_id = user.id";
$result  = mysqli_query($conn, $sql);

// SERIAL NUMBER FOR RESOURCES
$i = 0;

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('individual');

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
                        <header class="card-header">
                            <h3 class="card-title">Search By Registration no / Name</h3>
                        </header>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <?php if (mysqli_num_rows($result) > 0) : ?>
                                <div id="DivIdToPrint">
                                    <table class="table" id="datatable-default">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Name</th>
                                                <th>HSC/equivalent Reg. No</th>
                                                <th>Show</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                            <tr>
                                                <td><?= $row["email"]; ?></td>
                                                <td><?= $row["name"]; ?></td>
                                                <td><?= $row["hsc_or_equ"]; ?></td>
                                                <td>
                                                    <a href="result.php?id=<?= $row["re_id"]; ?> "
                                                        class="btn btn-info">View</a>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php else : ?>
                                <h2 class="alert alert-danger text-center">No Students</h2>
                                <?php endif; ?>
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

$getFooter('individual');

?>