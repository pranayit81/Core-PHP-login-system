<?php
 session_start();

if(empty($_SESSION['LOGINID']) && empty($_SESSION['LOGINNM']) ){

	header("Location:index.php");
}


include 'inc/db_config.php';
$delete_id = $_GET["delete_id"];



$sqlViewQuery =  "DELETE FROM tbl_user WHERE user_id = '".$delete_id."'";

$result = mysqli_query($connection, $sqlViewQuery); 


if($result){

	header("Location:welcome.php?flag=del");
}


?>