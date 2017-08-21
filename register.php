<?php include('header.php');  ?>
<?php
  $regError = array();
  $regSuccess = array();
 if(isset($_POST['reg_btn'])){
   
    $rusername = $_POST['r_username'];
    $rpassword = $_POST['r_password'];
     
    //Check form empty field
    if (empty($rusername)) {
        
        $regError[] = "Please Enter Username";
    }
    if (empty($rpassword)) {
        
        $regError[] = "Please Enter Password";
    }
     
    
      if (empty($regError)) {
          
      $sql = "INSERT INTO tbl_user (user_name,user_password,browser_name,ip_address,user_type_id) VALUES ('".$rusername."','".$rpassword."','".$_SERVER['HTTP_USER_AGENT']."','".$_SERVER['REMOTE_ADDR']."',2)";


      $result = mysqli_query($connection, $sql);

       if ($result) {
           $regSuccess[] = "registration successful! <a href='index.php' class='text-info'>Click Here</a> to Login..!";
       }
       else{
           
       }

      }
      

     
    
     
 }
    



?>


    <div class="register_main clearfix">

        <div class="register_wrap clearfix">

            <div class="container">
                <div class="col-md-6 col-md-offset-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Registration Form</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row container-fluid clearfix">
                                <?php for($j=0;$j<count($regSuccess); $j++){  ?>
                                <div class="alert alert-success">
                                    <p>
                                        <?php echo $regSuccess[$j];  ?>
                                    </p>
                                </div>
                                <?php } ?>

                                <?php for($i=0; $i<count($regError); $i++){  ?>
                                <div class="alert alert-danger">
                                    <p>
                                        <?php echo $regError[$i];  ?>
                                    </p>
                                </div>

                                <?php }  ?>
                            </div>
                            <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                                <div class="form-group clearfix">
                                    <div class="col-md-3">
                                        <label for="Username">USERNAME:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="r_username" placeholder="Enter Your Username">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-md-3">
                                        <label for="password">PASSWORD:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="r_password" placeholder="Enter Your Password">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-9">
                                        <button class="btn btn-info" type="submit" name="reg_btn">Register</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php');  ?>