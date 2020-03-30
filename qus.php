<?php include 'include/db.php';
session_start();
error_reporting(0);
ini_set('display_errors', 1);
if ($_SESSION['sec_email'] == "" and $_SESSION['check'] != 1) {
    header("Location: index.php");
}

$sql = "SELECT * FROM as_result WHERE user_id='" . $_SESSION['id'] . "'";
$select_result_sub = mysqli_query($conn, $sql);
$select_row_sub = mysqli_num_rows($select_result_sub);
if ($select_row_sub) {
    // 	header( "Location: result.php?check=1");
    echo "
	<script type='text/javascript'>
	 window.location.replace('./result.php?check=1');
	</script>";
    // die;
}

$user_id = $_SESSION['id'];
$sql_insert = "INSERT INTO as_result (user_id, total_qus, c_ans, to_user_id, to_c_ans) Values ('" . $user_id . "', '0', '0', '0', 0)";

$select_result_sub = mysqli_query($conn, $sql_insert);


?>
<!DOCTYPE html>
<html lang="en">

<style type="text/css">
.tab {
    display: none;
}

.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admission Test</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/carousel-animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" async
        src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML" async>
    </script>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
	extensions: ["tex2jax.js"],
	jax: ["input/TeX", "output/HTML-CSS"],
	tex2jax: {
	inlineMath: [ ['$','$'], ["\\(","\\)"] ],
	displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
	processEscapes: true,

},
"HTML-CSS": { fonts: ["TeX"] }
});
</script>

</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8">
                    <div class="mainLogo">
                        <a href="#">
                            <img alt="Admission Test" src="images/bubt_logo.png" />
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4">
                    <?php include('menu.php'); ?>
                </div>
            </div>
        </div>
    </header>
    <div class="banner" style="background-image:url('images/c.jpg');">
        <div class="banner_opacity">
            <div class="container">
                <div class="banner_content">
                    <h2 class="h1">Best of Luck <span><?php echo $_SESSION['name']; ?></span></h2>
                </div>
            </div>
        </div>
    </div>
    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h2 class="h1"><span>Start your Examination</span></h2>
                </div>
                <div class="col-md-2" style="padding-top: 20px">
                    <div id="clockdiv">
                        <div class="col-md-6"> <span class="minutes"></span> <span class="smalltext">Minutes</span>
                        </div>
                        <div class="col-md-6"> <span class="seconds"></span> <span class="smalltext">Seconds</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="padding-top:40px;padding-bottom:40px;">
                    <form action="result.php" method="POST" id="myForm">
                        <?php if (isset($_GET['user_id'])) { ?>
                        <input type="hidden" name="user_id" value="<?= $_GET['user_id']; ?>">
                        <?php } ?>
                        <div class="row">
                            <?php

                            $user_sql = "SELECT * FROM as_user WHERE id='" . $_SESSION['id'] . "'";
                            $select_result_user = mysqli_query($conn, $user_sql);
                            $select_row_user = mysqli_fetch_array($select_result_user);
                            // echo $select_row_user['subject_id'];

                            $sql = "SELECT * FROM as_subject";
                            $select_result_sub = mysqli_query($conn, $sql);
                            $i = 1;
                            while ($select_row_sub = mysqli_fetch_array($select_result_sub)) {


                                $limit_sql = "SELECT * FROM qus_limit WHERE sub_id='" . $select_row_sub['sub_id'] . "' and program_id='" . $select_row_user['subject_id'] . "'";
                                $select_result_limit = mysqli_query($conn, $limit_sql);
                                $select_row_limit = mysqli_fetch_array($select_result_limit);


                                $sql = "SELECT * FROM as_quertion where sub_id = '" . $select_row_sub['sub_id'] . "' ORDER BY rand() limit " . $select_row_limit['limit_qus'] . "";
                                // echo $sql;
                                $select_result = mysqli_query($conn, $sql);

                                while ($select_row = mysqli_fetch_array($select_result)) {

                                    ?>
                            <div class="col-md-12 tab">
                                <h4><?php echo $i . ' ) ';
                                                    echo html_entity_decode($select_row['quertion']) ?></h4>
                                <input type="hidden" name="qus_id[]" value="<?= $select_row['qus_id']; ?>">
                                <?php
                                                $qus_id = $select_row['qus_id'];
                                                $sql1 = "SELECT * FROM as_option where qus_id = '" . $qus_id . "'";
                                                $select_result1 = mysqli_query($conn, $sql1);
                                                while ($select_row1 = mysqli_fetch_array($select_result1)) {
                                                    $option = str_replace('sqrt[]', "\\sqrt[]", $select_row1['option']);
                                                    $option = str_replace('(', "{", $option);
                                                    $option = str_replace(')', "}", $option);
                                                    $option_ar = explode('/', $option);
                                                    // print_r($option_ar);
                                                    if (count($option_ar) > 1) {
                                                        $option = '\frac';
                                                        foreach ($option_ar as $key => $value) {
                                                            $option .= '{' . $value . '}';
                                                        }
                                                    }
                                                    ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="<?= $i; ?>[]"
                                            value="<?= $select_row1['op_id']; ?>">
                                        <?php echo '$' . $option . '$'; ?>
                                    </label>
                                </div>
                                <?php } ?>
                                <input type="hidden" name="ans<?= $i; ?>" value='<?= $select_row['answer_id']; ?>'>
                            </div>
                            <?php $i++;
                                }
                            }
                            ?>
                            <input type="hidden" name="i" value="<?= $i - 1 ?>">
                            <div class="col-md-4">
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button class="btn btn-success" type="button" id="preBtn"
                                            onclick="prev(1)">Prev</button>
                                        <button class="btn btn-success" type="button" id="nextBtn"
                                            onclick="next(1)">Next</button>
                                        <br>
                                    </div>
                                </div>
                                <!-- <input type="submit" value="Submit Answer" class="btn btn-success"> -->
                            </div>
                            <div class="col-md-12 clearfix">
                                <p
                                    style="background:#31B0D5;padding:10px;clear:both;color:#fff;margin-top:20px; text-align:center;">
                                    Total: <strong><?= $i - 1; ?></strong> Questions</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="bottomOuter">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-7">
                        <div class="footerMenu">
                            <h4>Pages</h4>
                            <ul>
                                <li><a href="#">Menu 1</a></li>
                                <li><a href="#">Menu 2</a></li>
                                <li><a href="#">Menu 3</a></li>
                                <li><a href="#">Menu 4</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-5">
                        <div class="footerLogo">
                            <a href="#">
                                <img src="./images/bubtLogo.png" alt="BUBT">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-8 f_address">
                        <div class="footerAddress">
                            <h4>BUBT</h4>
                            <p><strong>Bangladesh University of Business and Technology</strong></p>
                            <p>Rupnagar R/A, Mirpur-2, Dhaka-1216, Bangladesh </p>
                            <p>Phone: <a href="tel:01967169189">01967169189</a>, <a
                                    href="tel:01845734337">01845734337</a>, <a href="tel:01680050630">01680050630</a>,
                                <br><a href="tel:01741129235"></a>, <a href="tel:01554882075">01554882075</a> </p>
                            <p>Email: <a href="mailto:info@bubt.edu.bd">info@bubt.edu.bd</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>&copy <?= date('Y'); ?> BUBT. All Rights Reserved.</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>Develop By: <a href="#">Department of CSE</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/bootstrap-datetimepicker.js"></script> -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    var currentTab = 0;
    showTab(currentTab);
    // var deadline = new Date(Date.parse(new Date()) + .5 * 60 * 1000);
    // initializeClock('clockdiv', deadline);

    function showTab(n) {

        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";


        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        if (n == 0) {
            $('#preBtn').hide();
        } else {
            $('#preBtn').show();
        }
    }

    function next(n) {
        // resetTimer();
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= x.length) {
            document.getElementById("myForm").submit();
            return false;
        }
        showTab(currentTab);
    }

    function prev(n) {
        // resetTimer();
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab - n;


        showTab(currentTab);
    }

    function validateForm() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        // y = x[currentTab].getElementsByTagName("input");
        // for (i = 0; i < y.length; i++) {
        // 	if (y[i].value == "") {
        // 		y[i].className += " invalid";
        // 		valid = false;
        // 	}
        // }
        // if (valid) {
        // 	document.getElementsByClassName("step")[currentTab].className += " finish";
        // }
        return valid;
    }



    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        return {
            'total': t,
            'minutes': minutes,
            'seconds': seconds
        };
    }



    var timer;

    function startTimer(duration, display) {
        timer = duration;
        var minutes, seconds;
        setInterval(function() {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + " Minutes : " + seconds + " Seconds";

            if (--timer < 0) {
                timer = duration;
                // next(1);
                document.getElementById("myForm").submit();

            }
        }, 1000);
    }

    function resetTimer() {
        timer = 60 * parseInt("<?= $i - 1 ?>");
    }

    window.onload = function() {
        fiveMinutes = 60 * parseInt("<?= $i - 1 ?>"),
            display = document.querySelector('#clockdiv');
        startTimer(fiveMinutes, display);
    };
    </script>
</body>

</html>