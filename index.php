<?php session_start(); ob_start(); ?>

<?php  include("header.php");  ?>
<?php 



   $strError= array();

   if (isset($_POST['submit_btn'])) {

    
        
          $username = $_POST['username'];
          if (empty($username)) {
            $strError[]= "Please enter username...!!";
          }
          $password = $_POST['password'];
          if (empty($password)) {
             $strError[]= "Please enter passowrd...!!";
          }

          if (empty($strError)) {
            
            $sqlSelect = "SELECT * FROM tbl_user WHERE user_name = '".$username."' AND user_password = '".$password."'" ;

            $result = mysqli_query($connection,$sqlSelect);
            $count = mysqli_num_rows($result);

            while ($list = mysqli_fetch_assoc($result)) {
              
              $_SESSION['LOGINID'] = $list['user_id'];
              $_SESSION['LOGINNM'] = $list['user_name'];
            }

            if($count > 0){

              $ip_address = $_SERVER['REMOTE_ADDR'];
              $browser_name = explode(" ",$_SERVER['HTTP_USER_AGENT']) ;
              $mybrowser = $browser_name[6];



              $sqlUpdate = "UPDATE tbl_user SET
                                                  login_counter = login_counter + 1,
                                                  login_time = now() ,
                                                  ip_address = '".$ip_address."',
                                                  browser_name = '".$mybrowser."'
                                                

                                            WHERE
                                                  user_id = '".$_SESSION['LOGINID']."'           
                     ";
               
             /* echo $sqlUpdate;
              exit;*/

              $sqlUpdated = mysqli_query($connection, $sqlUpdate);      
                
              header("Location:welcome.php?flag=success");
            }
            else{
              $strError[]= "Invalid Username or Password please try again..!";
            }

          }
          

  }



?>

<div class="container">
    <div class="login_main clearfix">
        <div class="login_wrap clearfix">
            <?php   
                // Setting the value of logout variable
                if(isset($_GET['logout'])){
                         $logout = $_GET['logout'] ;
                }else{
                  $logout = "";
                }
                

                if( $logout == "success"){ ?>

            <div class="alert alert-success">
                <p>You are logged out!</p>
                <?php header("refresh:2 , url=index.php"); ?>
            </div>
            <?php } ?>

            <?php 
                //Setting the value of the logout variable
                if(isset($_GET['admin'])){
                       $logout = $_GET['admin'] ;
                }else{
                        $logout = "";
                }
                

                if( $logout == "updated"){ ?>

            <div class="alert alert-success">
                <p>Admin credentials updated successfully!</p>
                <?php header("refresh:2 , url=index.php"); ?>
            </div>
            <?php } ?>
            <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <?php for($i=0; $i< count($strError) ; $i++) { ?>


                        <div class="alert alert-danger">
                            <?php echo $strError[$i].nl2br("\n"); ?>
                        </div>

                        <?php } ?>

                        <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="username"><p>Username:</p></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Enter Username" name="username">
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="password"><p>Password:</p></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-9">
                                        <button type="submit" name="submit_btn" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>


                            </div>


                        </form>
                    </div>
                </div>
                <p class="text-center">Not a member yet? Register <a href="register.php" target="_blank">Here</a></p>




            </div>

        </div>
    </div>
</div>
<?php  include("footer.php");  ?>