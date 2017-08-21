<?php  session_start();

if(empty($_SESSION['LOGINID']) && empty($_SESSION['LOGINNM']) ){

	header("Location:index.php");
}

$flag= "";

if(isset($_GET['flag']))
{
	$flag = $_GET['flag'];
}

if ($flag == "edit") {
	$msg = "Record Edited Successfully";
}

if ($flag == "add") {
	$msg = "Record Added Successfully";
}
if ($flag == "del") {
	$msg = "Record Deleted Successfully";
}
if ($flag == "success") {
	$msg = "Login Successful";
}


if(!empty($flag)){
	header("refresh:2 , url=welcome.php");
}

 ?>
<?php  include 'header.php';

if (isset($_POST['btn_search'])) {

	$keyword= trim($_POST['txtSearch']);

	$searchQry = "SELECT u.user_id,u.user_name, u.user_password, u.login_time, u.logout_time,u.ip_address,u.login_counter,u.browser_name,ut.user_type_name FROM tbl_user u INNER JOIN tbl_user_type ut ON u.user_type_id = ut.user_type_id AND u.user_type_id=2 AND (u.user_name LIKE '$keyword%' OR u.browser_name LIKE '$keyword%' OR u.login_counter LIKE '$keyword' OR u.user_password LIKE '$keyword%' OR u.user_id LIKE '$keyword')";

	$sqlSelectedAll = mysqli_query($connection, $searchQry);



	
	
}else{
	$sqlSelectAll = "SELECT u.user_id,u.user_name, u.user_password, u.login_time, u.logout_time,u.ip_address,u.login_counter,u.browser_name,ut.user_type_name FROM tbl_user u INNER JOIN tbl_user_type ut ON u.user_type_id = ut.user_type_id AND u.user_type_id=2 ";



                               $sqlSelectedAll = mysqli_query($connection, $sqlSelectAll);
}

  ?>
<div class="welcome_main clearfix">
    <div class="welcome_wrap clearfix">
        <div class="container">
            <h1 class="page-header text-center">Welcome Page
                <?php  if($_SESSION['LOGINID'] == 1){ ?>
                <span class="pull-right"><a href="admin_edit.php" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Edit Profile</a>
                </span>
                <?php } ?>
            </h1>
            <span class="col-md-10">
			    	<span class="form-group clearfix">
			    		<form action="" method="post" class="srch_form clearfix pull-right">
			    		<span class="col-md-10"><input type="text" class="form-control" name="txtSearch" placeholder="Search Here..."> </span>
            <span class="col-md-2"><button class="btn btn-warning" type="submit" name="btn_search"><i class="glyphicon glyphicon-search"></i></button></span>
            </form>
            </span>
            </span>
            <br>
            <span class="col-md-2"><a href="logout.php" class="btn btn-danger pull-right">logout</a></span>

            <hr>

            <hr>


            <?php 
                    if(!empty($msg)){
			 	 ?>


            <div class="alert alert-success">
                <?php echo $msg; ?>
            </div>

            <?php 
			 	}
			 	  ?>

            <table class="table table-responsive  table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Login Time</th>
                        <th>Logout Time</th>
                        <th>IP Address</th>
                        <th>Login Counter</th>
                        <th>Browser Name</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                               
                                
                               while ($list = mysqli_fetch_object($sqlSelectedAll)) {

                                    
                                   
                                    $user_id = $list->user_id;
                                    $user_name = $list->user_name;
                                    $user_password = $list->user_password;
                                    $login_time = $list->login_time;
                                    $logout_time = $list->logout_time;
                                    $ip_address = $list->ip_address;
                                    $login_counter = $list->login_counter;
                                    $browser_name = $list->browser_name;
                                    $user_type = $list->user_type_name;
                                ?>
				                    <tr>
				                        <td>
				                            <?php echo $user_id;  ?>
				                        </td>
				                        <td>
				                            <?php echo $user_name;  ?>
				                        </td>
				                        <td>
				                            <?php echo $user_password;  ?>
				                        </td>
				                        <td>
				                            <?php echo $login_time;  ?>
				                        </td>
				                        <td>
				                            <?php echo $logout_time;  ?>
				                        </td>
				                        <td>
				                            <?php echo $ip_address;  ?>
				                        </td>
				                        <td>
				                            <?php echo $login_counter;  ?>
				                        </td>
				                        <td class="bw_td">
				                            <?php echo $browser_name;  ?>
				                        </td>
				                        <td>
				                            <?php echo $user_type;  ?>
				                        </td>
				                        <td>
				                       
				                            <a href="view.php?view_id=<?php echo $user_id ; ?>" class="btn btn-info btn-xs" title="view"><span class="glyphicon glyphicon-list-alt"></span></a>
				                            <a href="edit.php?edit_id=<?php echo $user_id ; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" title="edit"></span></a>
				                            <a href="delete.php?delete_id=<?php echo $user_id ; ?>" class="btn btn-danger btn-xs" title="delete"><span class="glyphicon glyphicon-trash"></span></a>

				                        </td>
				                    </tr>

                    <?php } ?>


                </tbody>
            </table>


        </div>
    </div>
</div>
</div>
<?php  include 'footer.php';  ?>