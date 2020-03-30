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



$sql = "SELECT * FROM as_user WHERE id NOT IN (SELECT user_id FROM as_result) ORDER BY id DESC";
$result  = mysqli_query($conn, $sql);

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('all_std');

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
                        <header class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Ready For Addmission Test</h3>
                            <a href="add_std.php" class="btn btn-primary ">Add Student</a>
                        </header>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <?php if (mysqli_num_rows($result) > 0) : ?>
                                <table class="table" id="datatable-default">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>HSC/equivalent Reg. No</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th style="min-width:150px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['name']; ?></td>
                                            <td><?= $row['f_name']; ?></td>
                                            <td><?= $row['hsc_or_equ']; ?></td>
                                            <td><?= $row['phone']; ?></td>
                                            <td><?= $row['address']; ?></td>
                                            <td>
                                                <a href="./regedit.php?id=<?= $row['id']; ?>"
                                                    class="btn-sm btn-success"><i class="la la-pencil-square-o"
                                                        aria-hidden="true"></i></a>

                                                <a href="./operation/regdelete.php?id=<?= $row['id']; ?>"
                                                    class="btn-sm btn-danger"><i class="la la-trash"
                                                        aria-hidden="true"></i></a>
                                                <a href="./questions.php?user_id=<?= $row['id']; ?>"
                                                    class="btn-sm btn-info"><i class="la la-print"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
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

$getFooter('all_std');

?>