<?php

include 'include/db.php';

include 'include/session.php';

if (@$_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT qus.qus_id, qus.quertion, sub.subject_name FROM as_quertion AS qus LEFT JOIN as_subject AS sub ON qus.sub_id = sub.sub_id WHERE sub.sub_id = $id";
} else {
    $sql = "SELECT qus.qus_id, qus.quertion, sub.subject_name FROM as_quertion AS qus LEFT JOIN as_subject AS sub ON qus.sub_id = sub.sub_id";
}

$result  = mysqli_query($conn, $sql);

// SERIAL NUMBER FOR QUESTION ENTRY 
$i = 0;

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
                            <h5>All Questions</h5>
                        </header>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <?php if (mysqli_num_rows($result) > 0) : ?>
                                <table class="table" id="datatable-default">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"><?php echo ucwords("questions"); ?></th>
                                            <th scope="col"><?php echo ucwords("subject"); ?></th>
                                            <th scope="col"><?php echo ucwords("actions"); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <th scope="row"><?= ++$i ?></th>
                                            <td><?= html_entity_decode($row["quertion"]) ?></td>
                                            <td><?= $row["subject_name"] ?></td>
                                            <td>
                                                <a href="show_ques.php?id=<?= $row["qus_id"] ?>"
                                                    class="btn-sm btn-success"><i class="la la-eye"
                                                        aria-hidden="true"></i></a>

                                                <a href="edit_qus.php?id=<?= $row["qus_id"] ?>"
                                                    class="btn-sm btn-info"><i class="la la-edit"
                                                        aria-hidden="true"></i></a>
                                                <a href="operation/del_question.php?id=<?= $row["qus_id"] ?>"
                                                    class="btn-sm btn-danger"><i class="la la-trash"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                <?php else : ?>
                                <h2 class="alert alert-danger text-center">NO Questions</h2>
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