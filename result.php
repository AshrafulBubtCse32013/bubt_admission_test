<?php include 'include/db.php';
session_start();
if($_SESSION['sec_email']=="" and $_SESSION[ 'check']!=1){
	header( "Location: index.php"); 
}
$k=0;
$last_id =null;
//echo "<pre>";print_r($_POST); 
if($_POST){

	$sql="DELETE FROM as_result WHERE user_id='".$_SESSION['id']."' order by re_id desc limit 1 ";
	$select_result_del = mysqli_query($conn, $sql);

	$sql="SELECT * FROM as_result WHERE user_id='".$_SESSION['id']."'";
	$select_result_sub = mysqli_query($conn, $sql);
	$select_row_sub=mysqli_num_rows($select_result_sub);
	if($select_row_sub){
		header( "Location: result.php?check=1"); 
		exit();
	}

	// echo "<pre>";
	// print_r($_POST);
	// die();

	$i=validation($_POST['i']); 
	$value=0; 
	for ($j=1; $j <=$i ; $j++) {

		$submit_option = $_POST[$j];
		$correct_option = json_decode($_POST['ans'.$j]);
		$check_result = array_diff($submit_option, $correct_option);
		if(!count($check_result)){
			$check_result = array_diff($correct_option, $submit_option);
		}
		if(!count($check_result)){
			$k++;
		}



		// if(isset($_POST[$j])){ 
		// 	foreach ($_POST[$j] as $value) {
		// 		$value=$value; 
		// 	} 
		// } 
		// $ans=$_POST['ans'.$j];
		// if($value==$ans){ $k++; }

	}
	if(isset($_SESSION['id'])){
		if(isset($_POST['user_id'])){
			$ch_user_id = $_POST['user_id'];
		}else{
			$ch_user_id = 0;
		}
		$user_id = $_SESSION['id'];
		$total_qus = $i;
		$c_ans = $k; 
		$sql_insert="INSERT INTO as_result (user_id, total_qus, c_ans, to_user_id, to_c_ans) Values ('" .$user_id. "', '".$total_qus. "', '".$c_ans. "', '".$ch_user_id. "', 0)"; 
		mysqli_query($conn, $sql_insert)or die(mysql_error()); 
		$last_id =mysqli_insert_id($conn);
		$m =0;
		foreach ($_POST['qus_id'] as $key => $value) {
			$m++;
			$submit_option = json_encode($_POST[$m]);

			//echo "<pre>";print_r($_POST['ans'.$m]); die();
			$sql_insert="INSERT INTO sa_result_de (re_id, qus_id, correct_option, submit_option) Values ('" .$last_id. "', '".$_POST['qus_id'][$key]. "', '".$_POST['ans'.$m]. "', '".$submit_option. "')"; 
			mysqli_query($conn, $sql_insert)or die(mysql_error()); 
		}
		$point = $c_ans;
		$sql_i="UPDATE as_user SET point=point+$point where id='".$user_id."'"; 
		mysqli_query($conn, $sql_i)or die(mysql_error()); 
	} 




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
	<section class="home as_result">
		<?php if(isset($_GET['check'])){
			$sum = 0;
			$out = 0;
			$relId = "SELECT re_id FROM as_result  WHERE user_id = '".$_SESSION['id']."' order by re_id desc";
			$relIdresult=mysqli_query($conn, $relId);
			$nidrow = mysqli_fetch_array($relIdresult);
			$re_id = $nidrow["re_id"];
			?>
			<div class="container">
				<div class="row">

					<?php 
					$sql2="SELECT as_subject.* FROM sa_result_de left join as_quertion on as_quertion.qus_id=sa_result_de.qus_id LEFT JOIN as_subject ON as_quertion.sub_id=as_subject.sub_id  WHERE sa_result_de.re_id='".$re_id."'  GROUP BY as_subject.sub_id";
					$select_result=mysqli_query($conn, $sql2); $i=1;
					$select_result   = $select_result->fetch_all(MYSQLI_ASSOC);
					?>
					<div class="table-responsive">
						<table class="as_table table table-bordered">
							<tr>
								<th>Name</th>
								<th>ID</th>
								<?php
								$total_qus = 0; 
								foreach ($select_result as $key => $select_row) {

									$sql="SELECT sa_result_de.*  FROM sa_result_de left join as_quertion on as_quertion.qus_id=sa_result_de.qus_id WHERE sa_result_de.re_id='".$re_id."'  and as_quertion.sub_id='".$select_row['sub_id']."'";
									$select_subje=mysqli_query($conn, $sql); $i=1;
									$select_subje   = $select_subje->fetch_all(MYSQLI_ASSOC);
									$count=0;

									foreach ($select_subje as $key_subje => $value_subje) {

										$submit_option = json_decode($value_subje['submit_option']);
										$correct_option = json_decode($value_subje['correct_option']);
										$check_result = array_diff($submit_option, $correct_option);
										if(!count($check_result)){
											$check_result = array_diff($correct_option, $submit_option);
										}
										if(count($check_result)==0){
											$total_cor[$select_row['sub_id']] = $total_cor[$select_row['sub_id']]+1;
										}else{
											$total_cor[$select_row['sub_id']] = $total_cor[$select_row['sub_id']];

										}
										$total_qus++;
									}
									?>

									<th>
										<?php echo $select_row['subject_name'];?>
									</th>
									<?php $j++;
								}

								?>
								<th>Total</th>
								<th>Out Of</th>
							</tr>
							<tr>
								<td><?=$_SESSION['name'];?></td>
								<td><?=$_SESSION['sec_email'];?></td>
								<?php
								foreach ($select_result as $key => $select_row) {
									
									?>

									<td>
										<?php
										if($total_cor[$select_row['sub_id']] == ''){
										    echo '0';
										}else{
										echo $total_cor[$select_row['sub_id']];
										}
										$sum += $total_cor[$select_row['sub_id']];
										?>
									</td>
									<?php $i++;
								}
								?>
								<td><?=$sum;?></td>
								<td><?=$total_qus;?></td>
							</tr>
						</table>
					</div>

				</div>
			</div>

		<?php }?>
		<?php 
		if($_POST){?>
			<div class="container" style="font-size: 24px">
				<h2 class="h1"><span>Result</span></h2>
				<div class=""> 
					<span>Hy, <?=$_SESSION['name']?></span>
				</div>
			</div>
		<?php } ?>




		<?php 
		$sum = 0;
		$out = 0;
		if($_POST){?>
			<div class="container">
				<div class="row">

					<?php 
					$re_id = $last_id;
					$sql2="SELECT as_subject.*  FROM sa_result_de left join as_quertion on as_quertion.qus_id=sa_result_de.qus_id LEFT JOIN as_subject ON as_quertion.sub_id=as_subject.sub_id  WHERE sa_result_de.re_id='".$re_id."'  GROUP BY as_subject.sub_id";
					$select_result=mysqli_query($conn, $sql2); $i=1;
					$select_result   = $select_result->fetch_all(MYSQLI_ASSOC);
					?>
					<div class="table-responsive">
						<table class="as_table table table-bordered">
							<tr>
								<th>Name</th>
								<th>ID</th>
								<?php
								$total_qus = 0; 
								foreach ($select_result as $key => $select_row) {

									$sql="SELECT sa_result_de.*  FROM sa_result_de left join as_quertion on as_quertion.qus_id=sa_result_de.qus_id WHERE sa_result_de.re_id='".$re_id."'  and as_quertion.sub_id='".$select_row['sub_id']."'";
									$select_subje=mysqli_query($conn, $sql); $i=1;
									$select_subje   = $select_subje->fetch_all(MYSQLI_ASSOC);
									$count=0;

									foreach ($select_subje as $key_subje => $value_subje) {

										$submit_option = json_decode($value_subje['submit_option']);
										$correct_option = json_decode($value_subje['correct_option']);
										$check_result = array_diff($submit_option, $correct_option);
										if(!count($check_result)){
											$check_result = array_diff($correct_option, $submit_option);
										}
										if(count($check_result)==0){
											$total_cor[$select_row['sub_id']] = $total_cor[$select_row['sub_id']]+1;
										}else{
											$total_cor[$select_row['sub_id']] = $total_cor[$select_row['sub_id']];

										}
										$total_qus++;

										// echo "<pre>";
										// print_r($submit_option);
										// print_r($correct_option);
										// print_r($value_subje);
										// print_r($check_result);
										// echo count($check_result);
										// echo "</pre>";
									}
									?>

									<th>
										<?php echo $select_row['subject_name'];?>
									</th>
									<?php $j++;
								}
								// echo "<pre>";
								// print_r($total_cor);
								// echo "</pre>";

								?>
								<th>Total</th>
								<th>Out Of</th>
							</tr>
							<tr>
								<td><?=$_SESSION['name'];?></td>
								<td><?=$_SESSION['sec_email'];?></td>
								<?php
								foreach ($select_result as $key => $select_row) {

									
									?>

									<td>
										<?php
										if($total_cor[$select_row['sub_id']] == ''){
										    echo '0';
										}else{
										    echo $total_cor[$select_row['sub_id']];
										}
										$sum += $total_cor[$select_row['sub_id']];
										?>
									</td>
									<?php $i++;
								}
								?>
								<td><?=$sum;?></td>
								<td><?=$total_qus;?></td>
							</tr>
						</table>
					</div>

				</div>
			</div>
		<?php } ?>							
	</section>
	<?php require 'footer.php';?>