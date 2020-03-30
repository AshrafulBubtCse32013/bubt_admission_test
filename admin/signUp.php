<?php
include 'include/db.php';
?>
<?php
$error = '';

if (isset($_POST['submit'])) {
    $u_email = $_POST['uEmail'];
    $u_name = $_POST['uName'];
    $u_phone = $_POST['uPhone'];
    $u_pwd = $_POST['pwd'];
    $pwd_confirm = $_POST['pwd_confirm'];
    $sql = "SELECT * FROM admin_info where admin_name = $u_name";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error = 'User Name Already Used !';
    } else {
        if ($u_pwd != $pwd_confirm) {
            $error = 'Password are Not Same ';
        } else {
            $u_pwd = md5($u_pwd);
            $sql_insert = "INSERT INTO admin_info (admin_name, admin_email, admin_phone, admin_pass, admin_status) VALUES ('$u_name' , '$u_email', '$u_phone', '$u_pwd', 1)";
            mysqli_query($conn, $sql_insert) or die(mysqli_error($conn));
            $error = "ThankYou";
        }
    }
} ?>
<!doctype html>
<html class="fixed">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
    <script src="assets/vendor/modernizr/modernizr.js"></script>
</head>

<body>
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo pull-left"> <img src="assets/images/logo.png" height="54" alt="Porto Admin" /> </a>
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <a href="index.php">
                        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign
                            In
                        </h2>
                    </a>

                </div>
                <div class="panel-body">
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group mb-lg">
                            <label>User Email</label>
                            <input name="uEmail" type="text" class="form-control input-lg" />
                        </div>
                        <div class="form-group mb-lg">
                            <label>User Name</label>
                            <input name="uName" type="text" class="form-control input-lg" />
                        </div>
                        <div class="form-group mb-lg">
                            <label>User Phone</label>
                            <input name="uPhone" type="text" class="form-control input-lg" />
                        </div>
                        <div class="form-group mb-none">
                            <div class="row">
                                <div class="col-sm-6 mb-lg">
                                    <label>Password</label>
                                    <input name="pwd" type="password" class="form-control input-lg" />
                                </div>
                                <div class="col-sm-6 mb-lg">
                                    <label>Password Confirmation</label>
                                    <input name="pwd_confirm" type="password" class="form-control input-lg" />
                                </div>
                            </div>
                        </div>
                        <p style="color:#f00;">
                            <?php
                            echo $error; ?>
                        </p>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="AgreeTerms" name="agreeterms" type="checkbox" />
                                    <label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right" id="sign_up">
                                <button type="submit" class="btn btn-primary hidden-xs" name="submit">Sign
                                    Up</button>
                                <button type="submit"
                                    class="btn btn-primary btn-block btn-lg visible-xs mt-lg disabled">Sign Up</button>
                            </div>
                        </div>
                        <p class="text-center">Already have an account? <a href="index.php">Sign In!</a>
                    </form>
                </div>
            </div>
            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2014. All Rights Reserved.</p>
        </div>
    </section>
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="assets/javascripts/theme.js"></script>
    <script src="assets/javascripts/theme.custom.js"></script>
    <script src="assets/javascripts/theme.init.js"></script>
    <script src="assets/javascripts/custom.js"></script>
</body>

</html>