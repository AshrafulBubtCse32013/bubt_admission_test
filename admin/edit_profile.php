<?php
ob_start();

session_start();

include 'include/db.php';

include 'include/session.php';

/**
 * ---------------------------------------------------------------------
 *  	      INCLUDING HTML DOCTYPE, HEADER AND TOP BODY TAG
 * ---------------------------------------------------------------------
 * 
 */
$getHeader = require_once 'helpers/getHeader.php';

$getHeader('edit_profile');

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

$sql = "SELECT * FROM admin_info WHERE admin_email='{$_SESSION['admin_email']}'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

if (isset($_POST['edit_profile'])) {
    $newName = $_POST['admin_name'];
    $newEmail = $_POST['admin_email'];
    $newPhone = $_POST['admin_phone'];
    $newPass =  $_POST['admin_password'];
    $confPass =  $_POST['confirm_password'];

    if ($newPass === $confPass) {
        $newPass = md5($newPass);
        $sql = "UPDATE admin_info
                SET admin_name = '{$newName}', admin_email = '{$newEmail}', admin_phone = '{$newPhone}', admin_pass = '{$newPass}'
                WHERE admin_email = '{$_SESSION['admin_email']}'";

        mysqli_query($conn, $sql);

        $_SESSION['admin_email'] = $newEmail;
        $_SESSION['admin_name'] = $newName;
        header('location: edit_profile.php');
        exit;
    }
}
?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Edit profile</h3>
            </div>
        </div>

        <div class="content-body">
            <!-- Table head options start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (isset($_POST['edit_profile'])) {
                                $newPass = $_POST['admin_password'];
                                $confPass = $_POST['confirm_password'];

                                if ($newPass !== $confPass) : ?>
                            <div class="alert alert-danger">
                                Password did not match
                            </div>
                            <?php endif;
                            }; ?>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="mt-2">Name</h5>
                                        <fieldset class="form-group">
                                            <input type="text" name="admin_name" class="form-control" id="admin_name"
                                                value="<?= $result['admin_name'] ?>" />
                                        </fieldset>
                                    </div>

                                    <div class="col-6">
                                        <h5 class="mt-2">Email</h5>
                                        <fieldset class="form-group">
                                            <input type="text" name="admin_email" class="form-control" id="admin_email"
                                                value="<?= $result['admin_email'] ?>" />
                                        </fieldset>
                                    </div>

                                    <div class="col-6">
                                        <h5 class="mt-2">Phone</h5>
                                        <fieldset class="form-group">
                                            <input type="text" name="admin_phone" class="form-control" id="admin_phone"
                                                value="<?= $result['admin_phone'] ?>" />
                                        </fieldset>
                                    </div>

                                    <div class="col-6">
                                        <h5 class="mt-2">Password</h5>
                                        <fieldset class="form-group">
                                            <input required name="admin_password" class="form-control"
                                                id="admin_password" />
                                        </fieldset>
                                    </div>

                                    <div class="col-6">
                                        <h5 class="mt-2">Confirm password</h5>
                                        <fieldset class="form-group">
                                            <input required name="confirm_password" class="form-control"
                                                id="confirm_password" />
                                        </fieldset>
                                    </div>
                                </div>

                                <button type="submit" name="edit_profile" class="btn btn-primary">Update</button>
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

$getFooter('edit_profile');

?>