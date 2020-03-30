<?php include 'include/db.php';
session_start();
if($_SESSION['sec_email']=="" and $_SESSION[ 'check']!=1){
	header( "Location: index.php"); 
}
$k=0;
$last_id =null;
// echo "<pre>";print_r($_POST); die;
if($_POST){

	

	$i=$_POST['i']; 
	$value=0; 
	for ($j=1; $j <=$i ; $j++) {
		if(isset($_POST[$j])){ 
			foreach ($_POST[$j] as $value) {
				$value=$value; 
			} 
		} 
		$ans=$_POST['ans'.$j];
		if($value==$ans){ $k++; }

	}
	if(isset($_SESSION['id'])){
		if(isset($_POST['re_id'])){
			$re_id = $_POST['re_id'];
		}else{
			$re_id = 0;
		}

		$user_id = $_SESSION['id'];
		$total_qus = $_POST['i'];
		$c_ans = $k; 

		$sql_i="UPDATE as_result SET to_c_ans='".$c_ans."' where re_id='".$re_id."'"; 
		mysqli_query($conn, $sql_i)or die(mysql_error()); 

		

		$sql_insert="INSERT INTO as_result (user_id, total_qus, c_ans) Values ('" .$user_id. "', '".$total_qus. "', '".$c_ans. "')"; 
		mysqli_query($conn, $sql_insert)or die(mysql_error()); 
		$last_id =mysqli_insert_id($conn);
		$m =0;
		foreach ($_POST['qus_id'] as $key => $value) {
			$m++;
			if(isset($_POST[$key+1][0])){
				$submit_option = $_POST[$m][0];
			}else{
				$submit_option = 0;
			}
			//echo "<pre>";print_r($_POST['ans'.$m]); die();
			$sql_insert="INSERT INTO sa_result_de (re_id, qus_id, correct_option, submit_option) Values ('" .$last_id. "', '".$_POST['qus_id'][$key]. "', '".$_POST['ans'.$m]. "', '".$submit_option. "')"; 
			mysqli_query($conn, $sql_insert)or die(mysql_error()); 
		}
	} 

	$sql_sh="SELECT * FROM as_result where re_id = '" .$re_id. "'";
	$select_result=mysqli_query($conn, $sql_sh);
	$select_row_data=mysqli_fetch_array($select_result);

	$point = ($select_row_data['c_ans']>$select_row_data['to_c_ans']?10:-10);

	$sql_i="UPDATE as_user SET point=point+$point where id='".$select_row_data['to_user_id']."'"; 
	mysqli_query($conn, $sql_i)or die(mysql_error()); 




}
?>
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
	<link rel="stylesheet" href="css/font-awesome.min.css">
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
					<h2 class="h1">You are interested in <span>C Programming</span></h2>
				</div>
			</div>
		</div>
	</div>
	<section class="home as_result">
		<?php 
		if($_POST){
			?>
			<div class="container" style="font-size: 24px">
				<h2 class="h1">You are <?=($select_row_data['c_ans']>$select_row_data['to_c_ans']?"fail":($select_row_data['c_ans']==$select_row_data['to_c_ans']?'Equal':'Pass'))?>. Your patner complete <?=$select_row_data['c_ans'];?> ans</h2>
				<h2 class="h1"><span>Result</span></h2>
				<div class=""> <span>Hy, <?=$_SESSION['name']?></span>
					<p>Your Result
						<?=$k?>of
						<?=$_POST['i']?>
					</p>
					<p>Complete
						<?php echo ($k*100)/$_POST['i'];?>%
					</p>
				</div>
			</div>
		<?php } ?>
		<?php 
		if($_GET){?>
			<div class="container">
				<div class="row">
					<?php 
					$re_id = $_GET['re_id'];
					$sql="SELECT * FROM sa_result_de LEFT JOIN as_quertion ON sa_result_de.qus_id = as_quertion.qus_id where sa_result_de.re_id = '" .$re_id. "' ; ";
					$select_result=mysqli_query($conn, $sql); $i=1;
					while($select_row=mysqli_fetch_array($select_result)){ ?>
						<div class="col-md-12">
							<h4><?php echo $i.' ) '; echo $select_row['quertion']?></h4>
							<?php $qus_id=$select_row[ 'qus_id']; $sql1="SELECT * FROM as_option where qus_id = '" .$qus_id. "'"; $select_result1=mysqli_query($conn, $sql1); while($select_row1=mysqli_fetch_array($select_result1)){ ?>
								<div class="checkbox">
									<label class="
									<?php
									if($select_row['correct_option']==$select_row1['op_id']){echo " green ";}
									if($select_row['submit_option']!=$select_row['correct_option']){
										if($select_row['submit_option']==$select_row1['op_id']){echo " red ";}
										if($select_row['submit_option']==0){echo " notSubmit ";}
										}else{
											echo "click";
										}
										?>
										">
										<?php echo $select_row1[ 'option'];?>

									</label>
								</div>
							<?php } ?>
						</div>
						<?php $i++;} ?>

					</div>
				</div>
			<?php } ?>

			<?php 
			if($_POST){?>
				<div class="container">
					<div class="row">
						<?php 
						$re_id = $last_id;
						$sql="SELECT * FROM sa_result_de LEFT JOIN as_quertion ON sa_result_de.qus_id = as_quertion.qus_id where sa_result_de.re_id = '" .$re_id. "' ; ";
						$select_result=mysqli_query($conn, $sql); $i=1;
						while($select_row=mysqli_fetch_array($select_result)){ ?>
							<div class="col-md-12">
								<h4><?php echo $i.' ) '; echo $select_row['quertion']?></h4>
								<?php $qus_id=$select_row[ 'qus_id']; $sql1="SELECT * FROM as_option where qus_id = '" .$qus_id. "'"; $select_result1=mysqli_query($conn, $sql1); while($select_row1=mysqli_fetch_array($select_result1)){ ?>
									<div class="checkbox">
										<label class="
										<?php
										if($select_row['correct_option']==$select_row1['op_id']){echo " green ";}
										if($select_row['submit_option']!=$select_row['correct_option']){
											if($select_row['submit_option']==$select_row1['op_id']){echo " red ";}
											if($select_row['submit_option']==0){echo " notSubmit ";}
											}else{
												echo "click";
											}
											?>
											">
											<?php echo $select_row1[ 'option'];?>

										</label>
									</div>
								<?php } ?>
							</div>
							<?php $i++;} ?>

						</div>
					</div>
				<?php } ?>


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