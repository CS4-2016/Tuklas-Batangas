<?php
    session_start(); 
    require_once("header.php");
?>
    
    <div id="content">
            <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
                <div class="container">
                    <div class="row">
                        
                    <?php include 'forgot_password_generate.php'; ?>

            <div class="well well-sm" style="padding:0px;">
                  <fieldset class="">
                        <legend class="forgotpassword-header"> Reset Password</legend>
                <form action="forgot_password.php" class="form-horizontal"  method="POST">
                  
                        <div class="col-md-3 forgot-password-content"><center>
                            <br>  <br>
                    <img src="img/forgot-pw-email.png" class="img-forgotpassword"></center>
                    </div>
                      <div class="col-md-3 forgot-password-content">
                    <p class="forgot-password-content-p">Enter your email . We'll email your New password </p>
                          <br>
                          <p> A note about spam filters
                              If you don't get an email from us within few minutea please be sure to check your spam filter. 
                          </p>
                          <b>The email will be coming from tuklasbatangas@gmail.com</b>
                    </div>
                        <div class="col-md-6 forgot-password-content" >
                            
                        <div class="form-group forgot-password-content-FORM">
                            <div class="col-md-10 col-md-offset-1">
                               <legend>Your Email</legend>
                                <input id="fname" name="email" type="text" placeholder="Email" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1 text-center">
                                <button type="submit" class="btn btn-primary btn-lg" >Submit</button>
                                <span class="error"><?php echo $Error;?></span>
                        <span class="success"><?php echo $successMessage;?></span>
                            </div>
                        </div>
                        </div>
                    
                </form></fieldset>
            </div>
        </div>
        
    </div>   
                        
                    </div>
                </div>
  

<?php require_once("footer.php"); ?>
