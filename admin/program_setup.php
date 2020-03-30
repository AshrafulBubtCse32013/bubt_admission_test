<?php

include 'include/db.php';

include 'include/session.php';

$msg = '';

$class = 'alert';

if (isset($_POST['save'])) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $sql_insert = "DELETE FROM qus_limit";
    $result  = mysqli_query($conn, $sql_insert);
    foreach ($_POST['program'] as $program_key => $program_value) {
        foreach ($_POST['subject'] as $subject_key => $subject_value) {
            // echo 'program-'.$program_value.'<br>';
            // echo 'subject-'.$subject_value.'<br>';
            // echo 'value-'.$_POST[$subject_value][$program_key].'<br>';

            $sql_insert = "INSERT INTO qus_limit (sub_id, program_id, limit_qus) Values ('" . $subject_value . "', '" . $program_value . "', '" . $_POST[$subject_value][$program_key] . "')";
            $result  = mysqli_query($conn, $sql_insert);
            if ($result) {
                $msg = 'Save Successfully!';
                $class .= ' alert-success';
            } else {
                $msg = 'Not Save !';
                $class .= ' alert-danger';
            }
        }
    }
    // die();

}

$sql = "SELECT * FROM as_category";
$result  = mysqli_query($conn, $sql);

$sql_sub = "SELECT * FROM as_subject";
$result_sub  = mysqli_query($conn, $sql_sub);
$select_result   = $result_sub->fetch_all(MYSQLI_ASSOC);

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('program_setup');

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
                    <p class="text-center <?= $class; ?>"><?= $msg; ?></p>
                    <div class="card">
                        <header class="card-header">
                            <h2 class="card-title">Question limit Program wise</h2>
                        </header>
                        </header>
                        <div class="card-content collapse show">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="table-responsive">
                                    <?php if (mysqli_num_rows($result) > 0) : ?>
                                    <table class="table" id="datatable-default">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col"><?php echo ucwords("Program"); ?></th>
                                                <?php foreach ($select_result as $key => $value) : ?>
                                                <input type="hidden" name="subject[]" value="<?= $value["sub_id"]; ?>">
                                                <th><?= $value["subject_name"]; ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                            <input type="hidden" name="program[]" value="<?= $row["cat_id"]; ?>">
                                            <tr>
                                                <td><?= ++$i ?></td>
                                                <th><?= $row["categoryName"]; ?></th>
                                                <?php
                                                                foreach ($select_result as $key => $value) {
                                                                    $sql_limit = "SELECT * FROM qus_limit WHERE sub_id='" . $value["sub_id"] . "' and  program_id='" . $row["cat_id"] . "'";
                                                                    $result_limit  = mysqli_query($conn, $sql_limit);
                                                                    $select_limit   = $result_limit->fetch_all(MYSQLI_ASSOC);
                                                                    // echo "<pre>";
                                                                    // print_r($select_limit);
                                                                    ?>

                                                <td>
                                                    <?php $value["subject_name"]; ?>
                                                    <input type="text"
                                                        value="<?= (isset($select_limit[0]['limit_qus']) ? $select_limit[0]['limit_qus'] : ''); ?>"
                                                        class="text-center input-sm" name="<?= $value["sub_id"]; ?>[]">
                                                    <!-- <input type="hidden" > -->
                                                </td>
                                                <?php }
                                                                ?>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <?php else : ?>
                                    <h2 class="alert alert-danger text-center">NO Program</h2>
                                    <?php endif; ?>
                                    <input type="submit" value="Save" name="save" class="btn btn-success">
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

$getFooter('plrogram_setup');

?>