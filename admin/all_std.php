<?php

include 'include/db.php';

include 'include/session.php';

$sql = "SELECT * FROM as_user";

$result  = mysqli_query($conn, $sql);

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('all_question');

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
                            <h5>Ready For Addmission Test</h5>
                        </header>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <?php if (mysqli_num_rows($result) > 0) : ?>
                                <table class="table" id="datatable-default">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"><?php echo strtoupper("id"); ?></th>
                                            <th scope="col"><?php echo ucwords("name"); ?></th>
                                            <th scope="col"><?php echo ucwords("action"); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <th scope="row"><?= ++$i ?></th>
                                            <td><?= $row["email"] ?></td>
                                            <td><?= $row["input_name"] ?></td>
                                            <td>
                                                <a href="./operation/studentdelect.php?id=<?= $row["id"] ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                <?php else : ?>
                                <h2 class="alert alert-danger text-center">NO Student</h2>
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

$getFooter('all_question');

?>