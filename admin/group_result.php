<?php

include 'include/db.php';

include 'include/session.php';

$msg = '';

$sql2 = "SELECT *  FROM semester";
$result_sub = mysqli_query($conn, $sql2);
$i = 1;
$result_sub = $result_sub->fetch_all(MYSQLI_ASSOC);

$sql2 = "SELECT *  FROM as_category";
$result_pro = mysqli_query($conn, $sql2);
$i = 1;
$select_pro   = $result_pro->fetch_all(MYSQLI_ASSOC);

$search = '';

if (isset($_POST['searchbtn'])) {
    if ($_POST['semester'] != '' && $_POST['program'] == '') {
        $search = ' where semester_id="' . $_POST['semester'] . '"';
    }
    if ($_POST['program'] != '' && $_POST['semester'] == '') {
        $search = ' where subject_id="' . $_POST['program'] . '"';
    }
    if ($_POST['program'] != '' && $_POST['semester'] != '') {
        $search = ' where subject_id="' . $_POST['program'] . '" and semester_id="' . $_POST['semester'] . '"';
    }

    $sql2 = "SELECT user.id, user.name, user.email, result.total_qus, result.re_id, result.c_ans  FROM as_result AS result LEFT JOIN as_user AS user ON result.user_id = user.id $search ORDER BY c_ans DESC";
    $result = mysqli_query($conn, $sql2);
    $i = 1;
} else {
    $sql = "SELECT user.id, user.name, user.email, result.total_qus, result.re_id, result.c_ans  FROM as_result AS result LEFT JOIN as_user AS user ON result.user_id = user.id ORDER BY c_ans DESC";
    $result  = mysqli_query($conn, $sql);
}

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
                        <div class="px-2">
                            <form method="post" class="form-inline mb-1">
                                <div class="pr-1">
                                    <select name="semester" class="form-control ">
                                        <option value="">Select semester</option>
                                        <?php foreach ($result_sub as $key => $value) : ?>
                                        <option value="<?= $value['sem_id']; ?>"><?= $value['sem_name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="px-1">
                                    <select name="program" class="form-control ">
                                        <option value="">Select program</option>
                                        <?php foreach ($result_pro as $key => $value) : ?>
                                        <option value="<?= $value['cat_id']; ?>"><?= $value['categoryName']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <input class="btn btn-light" type="submit" name="searchbtn" value="Search">
                            </form>
                        </div>
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
                                            <?php
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_assoc($result)) :
                                                        ?>
                                            <tr>
                                                <td><?= ++$i; ?></td>
                                                <td><?= $row["name"]; ?></td>
                                                <td><?= $row["email"]; ?></td>
                                                <td><?= $row["total_qus"]; ?></td>
                                                <td><?= $row["c_ans"]; ?></td>
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