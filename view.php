<?php  session_start();

if(empty($_SESSION['LOGINID']) && empty($_SESSION['LOGINNM']) ){

	header("Location:index.php");
}


 ?>
<?php   

include 'inc/db_config.php';

$view_id = $_GET['view_id'];



$sqlViewQuery =  "SELECT * FROM tbl_user WHERE user_id = '".$view_id."'";

$result = mysqli_query($connection, $sqlViewQuery);  ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View </title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<div class="jumbotron col-md-7 col-md-offset-2">
		<h1 class="page-header text-center text-info">User Info</h1>
<?php	while ($row = mysqli_fetch_object($result)) { ?>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>User Id:</p>
			</div>
			<div class="col-md-8">
				<p><?php echo $row->user_id;  ?></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Username:</p>
			</div>
			<div class="col-md-8">
				<p><?php echo $row->user_name;  ?></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Password:</p>
			</div>
			<div class="col-md-8">
				<p><?php echo $row->user_password;  ?></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Login Time:</p>
			</div>
			<div class="col-md-8">
				<p><?php echo $row->login_time;  ?></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Logout Time:</p>
			</div>
			<div class="col-md-8">
				<p><?php echo $row->logout_time;  ?></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Ipaddress:</p>
			</div>
			<div class="col-md-8">
				<p><?php echo $row->ip_address;  ?></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Login Counter:</p>
			</div>
			<div class="col-md-8">
				<p><?php echo $row->login_time - $row->logout_time ;  ?></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>User Type Id:</p>
			</div>
			<div class="col-md-8">
				<p><?php echo $row->user_type_id;  ?></p>
			</div>
		</div>
	</div>
</div>
<?php }




?>

<script src="js/jquery.js"></script>	
<script src="js/bootstrap.min.js"></script>	
</body>
</html>