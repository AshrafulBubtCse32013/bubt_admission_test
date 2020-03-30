<?php include 'include/db.php'; session_start(); if($_SESSION[ 'sec_email']=="" and $_SESSION[ 'check']!=1){ header( "Location: index.php"); }
$sq="UPDATE as_result SET is_comp=1 where re_id = '" .$_GET['re_id']. "'"; 
mysqli_query($conn, $sq);
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
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<a href="main.php">
						<img alt="Admission Test" src="images/logo.png" />
					</a>
				</div>
				<div class="col-md-6">
					<?php include('menu.php'); ?>
				</div>
			</div>
		</div>
	</header>
	<div class="banner" style="background-image:url('images/c.jpg');">
		<div class="banner_opacity">
			<div class="container">
				<div class="banner_content">
					<h2 class="h1">Fight Qus</span></h2>
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
						<div class="col-md-6"> <span class="minutes"></span>  <span class="smalltext">Minutes</span>
						</div>
						<div class="col-md-6"> <span class="seconds"></span>  <span class="smalltext">Seconds</span>
						</div>
					</div>
				</div>
			</div>
			<form action="fight_result.php" method="POST" id="myForm">
				<?php if(isset($_GET['re_id'])){?>
					<input type="hidden" name="re_id" value="<?=$_GET['re_id'];?>">
				<?php } ?>
				<div class="row">
					<?php $sql="SELECT * FROM sa_result_de left join as_quertion on sa_result_de.qus_id=as_quertion.qus_id  where sa_result_de.re_id = '" .$_GET['re_id']. "'"; $select_result=mysqli_query($conn, $sql); $i=1; while($select_row=mysqli_fetch_array($select_result)){ ?>
						<div class="col-md-12 tab">
							<h4><?php echo $i.' ) '; echo $select_row['quertion']?></h4>
							<input type="hidden" name="qus_id[]" value="<?=$select_row['qus_id'];?>">
							<?php $qus_id=$select_row[ 'qus_id']; $sql1="SELECT * FROM as_option where qus_id = '" .$qus_id. "'"; $select_result1=mysqli_query($conn, $sql1); while($select_row1=mysqli_fetch_array($select_result1)){ ?>
								<div class="checkbox">
									<label>
										<input type="radio" name="<?=$i;?>[]" value="<?=$select_row1['op_id'];?>">
										<?php echo $select_row1[ 'option'];?>
									</label>
								</div>
							<?php } ?>
							<input type="hidden" name="ans<?=$i;?>" value="<?=$select_row['answer_id'];?>">
						</div>
						<?php $i++;} ?>
						<input type="hidden" name="i" value="<?=$i-1?>">
						<div class="col-md-12">
							<div style="overflow:auto;">
								<div style="float:right;">
									<button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
								</div>
							</div>
							<!-- <input type="submit" value="Submit Answer" class="btn btn-success"> -->
						</div>
					</div>
				</form>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<nav class="navbar">
							<ul class="nav navbar-nav">
								<li><a href="#">Privacy Policy</a>
								</li>
								<li><a href="#">term & condition</a>
								</li>
								<li><a href="#">FLQ's</a>
								</li>
								<li><a href="#">Help</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 text-right footer_right">
						<p>&copy;
							<?php echo date( 'Y');?>BUBT. All Rights Reserved.</p>
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
				}

				function nextPrev(n) {
					resetTimer();
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
					setInterval(function () {
						minutes = parseInt(timer / 60, 10)
						seconds = parseInt(timer % 60, 10);

						minutes = minutes < 10 ? "0" + minutes : minutes;
						seconds = seconds < 10 ? "0" + seconds : seconds;

						display.textContent = minutes + " Minutes : " + seconds+" Seconds";

						if (--timer < 0) {
							timer = duration;
							nextPrev(1);

						}
					}, 1000);
				}

				function resetTimer() {
					timer = 60 * 0.5;
				}

				window.onload = function () {
					fiveMinutes = 60 * 0.5,
					display = document.querySelector('#clockdiv');
					startTimer(fiveMinutes, display);
				};
				
			</script>
		</body>

		</html>