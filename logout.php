<?php    

include 'inc/db_config.php';
session_start();

$sess_user_id = $_SESSION['LOGINID']; 


$sqlUpdateQuery = "UPDATE tbl_user SET logout_time= now() WHERE user_id='".$sess_user_id."'";
$res = mysqli_query($connection,$sqlUpdateQuery);



if($res){
	session_destroy();
	header("Location:index.php?logout=success");

}










?>