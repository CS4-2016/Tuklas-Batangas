<?php
    session_start(); 
    require_once("header.php");    
?>    

    <div id="content">
            <div class="tuklasbatangas-main-content tuklasbatangas-space">
                <div class="container">
                    <div class="row">
                        <!-- CONTENT-->              
                            <div class="col-md-4 col-md-offset-4">
                                <div class="tuklas-header">
                                    Register to Tuklas Batangas
                                </div>
                                
                                <div class="login-sub-header">
                                    Step 2 of 3<br>
                                    Account details
                                </div>
                                
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" style="width: 67%"></div>
                                </div>

                                <form class="form-horizontal" method="post" action="register-lto-step3.php" role="form" data-toggle="validator">
                                    <fieldset>  
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="username">Username</label>
                                            <input class="form-control" id="username" name="username" type="text" required>
                                            <?php if(!empty($_SESSION['register-username'])){ ?>
                                                    <span class="username-taken"> Username is already taken</span>
                                            <?php } ?>
                                        </div>                                       
                                        
                                        <div class="form-group label-floating tuklasbatangas-password-show">
                                            <label class="control-label" for="password" >Password</label>
                                            <input type="password" class="form-control tuklasbatangas-password" id="password" name="password" required data-minlength="6">
                                            <i class="fa fa-eye show-off show-password" id="showPassword"></i>
                                            <div class="help-block">Minimum of 6 characters</div>
                                            
                                        </div>
                                    
                                        <div class="form-group label-floating tuklasbatangas-password-show">
                                            <label class="control-label" for="password">Confirm Password</label>
                                
                                            <input type="password" class="form-control tuklasbatangas-password2" name="confirm" data-match="#password" required data-match-error="Passwords do not match">
                                            <div class="help-block with-errors"></div>
                                
                                            <i class="fa fa-eye show-off2 show-password" id="showPassword2"></i>
                                        </div>
                                        <div class="form-group">
                                            <div class="login-form-btns">
                                                <input type="submit" value="Proceed to Step 3" class="btn btn-raised btn-primary">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group already-registered">
                                            Already have an account? Click here to <a href="login.php">Login</a>.
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        <!-- END CONTENT-->                        
                    </div>
                </div>
            </div>
		</div><!-- #content -->

<?php require_once("footer.php"); ?>


<?php 

    unset($_SESSION['register-username']);

?>
