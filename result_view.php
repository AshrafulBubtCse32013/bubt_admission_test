<?php include 'include/db.php';
session_start(); 
if($_SESSION[ 'sec_email']=="" and $_SESSION[ 'check']!=1 and $_SESSION[ 'id']=="" ){ header( "Location: index.php"); }?>
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
	<section class="home">
		<div class="container" style="font-size: 24px">
			<h2 class="h1"><span>All Result</span></h2>
			<table class="table table-bordered table-hover">
				<thead>
					<tr class="">
						<th>#</th>
						<th>Total Quertion</th>
						<th>Pass Quertion</th>
						<th>%</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $id=$_SESSION['id']; $sql="SELECT * FROM as_result WHERE user_id='" .$id. "'"; $select_result=mysqli_query($conn, $sql); $i=0; while($select_row=mysqli_fetch_array($select_result)){ $i++;?>
					<tr>
						<td>
							<?=$i?>
						</td>
						<td>
							<?=$select_row['total_qus']?>
						</td>
						<td>
							<?=$select_row['c_ans']?>
						</td>
						<td>
							<?php echo ($select_row['c_ans']*100)/$select_row['total_qus'];?>%
						</td>
						<td>
							<?=$select_row['date']?>
						</td>
						<td>
							<a href="result.php?re_id=<?=$select_row['re_id']?>">View</a>
						</td>

					</tr>
					<?php }?>
				</tbody>
			</table>
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