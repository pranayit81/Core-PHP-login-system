<?php
 session_start();

if(empty($_SESSION['LOGINID']) && empty($_SESSION['LOGINNM']) ){

	header("Location:index.php");
}


include 'inc/db_config.php';
$edit_id = $_GET["edit_id"];



$sqlViewQuery =  "SELECT * FROM tbl_user WHERE user_id = '".$edit_id."'";

$result = mysqli_query($connection, $sqlViewQuery);  

$edError = array();


if (isset($_POST['ed_submit_btn'])) 
{

   
/*Array
(
    [txtUsername] => abc
    [txtPassword] => abc
    [txtLoginTime] => 2017-07-20 11:36:31
    [txtLogoutTime] => 0000-00-00 00:00:00
    [txtIpAddress] => 127.0.0.1
    [txtLoginCounter] => 2017
    [ed_submit_btn] => 
)*/

$username = trim($_POST['txtUsername']);
$password = trim($_POST['txtPassword']);
$login_time = trim($_POST['txtLoginTime']);
$logout_time = trim($_POST['txtLogoutTime']);
$ipaddress = trim($_POST['txtIpAddress']);
$login_counter = trim($_POST['txtLoginCounter']);
 



//check for empty varible and append error 
  if(empty($username)){
  	 $edError[] = "Username Cannot be empty!";
  }
  if(empty($password)){
  	 $edError[] = "Password Cannot be empty!";
  }
	
  if(empty($edError)){

   

        // Setting the updated value for the username and password
         
   $sqlUpdateQuery  = "UPDATE tbl_user SET user_name='".$username."' , user_password='".$password."' , login_time = '".$login_time."', logout_time='".$logout_time."', ip_address='".$ipaddress."', login_counter='".$login_counter."' WHERE user_id='".$edit_id."'";
  



  	 	$res = mysqli_query($connection, $sqlUpdateQuery);
  	 

  	 	
  	 	if($res){
    
            header("Location:welcome.php?flag=edit");
  	 	}
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View User Info</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<div class="jumbotron col-md-7 col-md-offset-2">
		<h1 class="page-header text-center text-info">Edit User Info</h1>
		<?php  for($i=0; $i<count($edError); $i++){  ?>
           <div class="alert alert-danger">
           	  <?php echo $edError[$i];  ?>
           </div>
		<?php } ?>
		<form action="" method="post">
		
		<?php	while ($row = mysqli_fetch_object($result)) { ?>
       
		
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Username:</p>
			</div>
			<div class="col-md-8">
				<p><input type="text" name="txtUsername" class="form-control" value="<?php echo $row->user_name;  ?>"></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Password:</p>
			</div>
			<div class="col-md-8">
				<p><input type="text" name="txtPassword" class="form-control" value="<?php echo $row->user_password;  ?>"></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Login Time:</p>
			</div>
			<div class="col-md-8">
				<p><input type="text" name="txtLoginTime" class="form-control" value="<?php echo $row->login_time;  ?>"></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Logout Time:</p>
			</div>
			<div class="col-md-8">
				<p><input type="text" name="txtLogoutTime"  class="form-control" value="<?php echo $row->logout_time;  ?>"></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Ipaddress:</p>
			</div>
			<div class="col-md-8">
				<p><input type="text" name="txtIpAddress"  class="form-control" value="<?php echo $row->ip_address;  ?>"></p>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-4">
				<p>Login Counter:</p>
			</div>
			<div class="col-md-8">
				<p><input type="text" name="txtLoginCounter"  class="form-control" value="<?php echo $row->login_time - $row->logout_time ;  ?>"></p>
			</div>
		</div>
	
		<div class="row clearfix">
			<hr>
			<div class="col-md-12 text-center">
				<button type="submit" name="ed_submit_btn" class="btn btn-primary">Edit User</button>
			</div>
		</div>
    </div>
<?php }
   
    ?>

		</form>
<script src="js/jquery.js"></script>	
<script src="js/bootstrap.min.js"></script>	
</body>
</html>