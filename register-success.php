<?php
    session_start(); 
    require_once("header.php");
?>
    
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="register-message">
                            <p class="register-thankyou">Thank you for signing up. <i class="fa fa-smile-o"></i></p>
                            <p class="account-pending-info">Your application will be pending for approval of the Provincial Tourism Council. You will receive an email upon approval. Until then you will not be given permission to create your profile.<br><br>Thank you for your patience.</p>
                           <div class="login-form-btns register-backtohome">
                                <a href="index.php"><input type="submit" class="btn btn-raised btn-primary" value="BACK TO HOME"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #content -->

<?php require_once("footer.php"); ?>
