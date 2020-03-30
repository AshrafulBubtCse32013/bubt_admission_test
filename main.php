<?php include 'include/db.php'; session_start(); if($_SESSION[ 'sec_email']=="" and $_SESSION[ 'check']!=1){ header( "Location: index.php"); } ?>
<!DOCTYPE html>
<html lang="en">

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
	<section class="main_banner" id="main_slider">
		<div class="item" style="background-image:url('images/banner.jpg')">
			<div class="slider_content">
				<div class="container">
					<h1 class="lead animation an-delay-15 an-duration-05 fadeInUpSlider">Welcome to Multiple Choice Questions</h1>
					<p class="lead animation an-delay-20 an-duration-05 fadeInUpSlider">Multiple Choice Questions</p>
					<p class="lead animation an-delay-25 an-duration-05 fadeInUpSlider">Multiple Choice Questions</p>
					<p class="lead animation an-delay-30 an-duration-05 fadeInUpSlider">Multiple Choice Questions</p>
				</div>
			</div>
		</div>
		<div class="item" style="background-image:url('images/banner2.jpg')">
			<div class="slider_content">
				<div class="container">
					<h1 class="lead animation an-delay-15 an-duration-05 fadeInUpSlider">Welcome to Multiple Choice Questions</h1>
					<p class="lead animation an-delay-20 an-duration-05 fadeInUpSlider">Multiple Choice Questions</p>
					<p class="lead animation an-delay-25 an-duration-05 fadeInUpSlider">Multiple Choice Questions</p>
					<p class="lead animation an-delay-30 an-duration-05 fadeInUpSlider">Multiple Choice Questions</p>
				</div>
			</div>
		</div>
	</section>
	<section class="home">
		<div class="container">
			<h2 class="h1 text-center">What you are interested?</h2>
			<div class="row">
				<?php $sql="SELECT * FROM as_category" ; $select_result=mysqli_query($conn, $sql); $i=0; while($select_row=mysqli_fetch_array($select_result)){ $i++;?>
				<div class="col-md-4">
					<div class="box_inner">
						<img src="./admin/upload/<?=$select_row['categoryImage']?>" alt="img">
						<h3><?=$select_row['categoryName']?></h3>
						<ul>
							<?php $cat_id=$select_row[ 'cat_id']; $sql2="SELECT * FROM as_subject where cat_id='" .$cat_id. "'"; $select_result2=mysqli_query($conn, $sql2); $i=0; while($value=mysqli_fetch_array($select_result2)){ $i++;?>
							<li>
								<a href="qus.php?id=<?=$value['sub_id'];?>&name=<?=$value['subject_name'];?>">
									<?=$value[ 'subject_name'];?>
								</a>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>
				<?php }?>
			</div>
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
						<?php echo date( 'Y');?>MSQ. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>