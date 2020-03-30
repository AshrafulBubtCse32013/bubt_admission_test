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

// SERIAL NUMBER FOR RESOURCES
$i = 0;

$sql = "SELECT user.id, user.input_name, user.name, user.email, result.total_qus, result.re_id, result.c_ans  FROM as_result AS result LEFT JOIN as_user AS user ON result.user_id = user.id ORDER BY c_ans DESC";
$result  = mysqli_query($conn, $sql);

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('allresultprint');

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
                            <button class="btn btn-danger" onclick="printDiv()">Print This</button>
                            <a href="group_result.php" class="btn btn-primary pull-right ">Group Wise</a>&nbsp;
                            <a href="individual.php" class="btn btn-success pull-right mr-1">Individual</a>
                        </header>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <?php if (mysqli_num_rows($result) > 0) : ?>
                                <div id="DivIdToPrint">
                                    <table class="table" id="datatable-default">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th width="50px">#</th>
                                                <th>Student Name</th>
                                                <th>Reg No</th>
                                                <th>Out of</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                            <?php $name = $row["name"]; ?>
                                            <tr>
                                                <td><?= ++$i; ?></td>
                                                <td><?= $name === '' ? ucwords('no name') : $name; ?></td>
                                                <td><?= $row["email"]; ?></td>
                                                <td><?= $row["total_qus"]; ?></td>
                                                <td><?= $row["c_ans"]; ?> </td>
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

$getFooter('allresultprint');

?>