<?php
include 'include/db.php';

?>
<?php
$error = '';

if (isset($_POST['submit'])) {
    $email = $_POST['u_name'];
    $pass = md5($_POST['pass']);
    $sql = "SELECT * FROM admin_info where admin_email = '" . $email . "' and admin_pass = '" . $pass . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_email'] = $row['admin_email'];
        $_SESSION['admin_name'] = $row['admin_name'];
        $_SESSION['admin_check'] = 1;
        echo "
<script type='text/javascript'>
	window.location.replace('./main.php');
</script>";
        die;
        //header('Location: main.php');
    } else {
        $error = 'Wrong Username or Password';
    }

    mysqli_close($conn);
} ?>
<!doctype html>
<html class="fixed loginAdmin">

<head>
    <title>Admission Test | BUBT</title>
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
            <a href="index.php" class="logo pull-left"> <img src="./assets/images/bubt_logo.png" height="54"
                    alt="BUBT Admin" /> </a>
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up
                    </h2>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group mb-lg">
                            <label>User Name</label>
                            <input name="u_name" type="text" class="form-control input-lg" />
                        </div>
                        <div class="form-group mb-lg">
                            <label>Password</label>
                            <input name="pass" type="password" class="form-control input-lg" />
                        </div>
                        <p style="color:#f00;">
                            <?php
                            echo $error; ?>
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center " style="color:#fff;">&copy; Copyright
                <?php
                echo date('Y'); ?>. All Rights Reserved.</p>
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
</body>

</html>