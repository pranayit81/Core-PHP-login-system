<?php session_start(); ob_start(); ?>
<?php  include 'header.php'; ?>
<?php

if(empty($_SESSION['LOGINID']) && empty($_SESSION['LOGINNM']) ){

	header("Location:index.php");
}



include 'inc/db_config.php';

$selecAdminQry = "SELECT * FROM tbl_user WHERE user_id = 1";
$result = mysqli_query($connection, $selecAdminQry);

$row = mysqli_fetch_object($result);

$adError = array();
if(isset($_POST['ed_admin_btn'])){

	$ad_username = $_POST['ad_username'];
	$ad_password = $_POST['ad_password'];

	if (empty($ad_username)) {

		$adError[] = "Username cannot be empty!";
	}
	if (empty($ad_password)) {

		$adError[] = "Password cannot be empty!";
	}

	if(empty($adError)){

        $updateAdminQry =  "UPDATE tbl_user SET user_name='".$ad_username."', user_password='".$ad_password."' WHERE user_id = 1";
        $result = mysqli_query($connection, $updateAdminQry);
        if($result){
        	session_destroy();
        	header("Location:index.php?admin=updated");
        }
	}
}





?>
<div class="admin_edit_main">
	<div class="admin_edit_wrapper">

		<div class="container">

			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="jumbotron">
						<h3 class="page-header text-center">
							 Edit Admin Details
						</h3>
						<?php for($i=0 ; $i<count($adError); $i++) { ?>
						  <div class="alert alert-danger">
						  	<?php echo $adError[$i];  ?>
						  </div>
						<?php } ?>
						<form action="" method="post">
							<div class="form-group clearfix">
								<div class="col-md-3">
									<label for="username">Username</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="ad_username" class="form-control" value="<?php echo $row->user_name; ?>">
								</div>
							</div>
							<div class="form-group clearfix">
								<div class="col-md-3">
									<label for="username">Password</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="ad_password" class="form-control" value="<?php echo $row->user_password;  ?>">
								</div>
							</div>
							<div class="form-group clearfix">
								<div class="col-md-3">

								</div>
								<div class="col-md-9">
									<button type="submit" class="btn btn-primary" name="ed_admin_btn">Edit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php  include 'footer.php'; ?>
