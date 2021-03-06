<?php
    session_start(); 
    
    if(!empty($_SESSION['username'])){
        unset($_SESSION['username']);
    }
       
    require_once("header.php");
?>
    
    <div id="content">
            <div class="tuklasbatangas-main-content tuklasbatangas-space">
                <div class="container">
                    <div class="row">
                        
                        
                        <!-- CONTENT-->
                            
                            <div class="col-md-4 col-md-offset-4">
                    <div class="tuklas-header">
                        Login to Tuklas Batangas
                    </div>
                    
                    <form class="form-horizontal" method="post" action="login-authentication.php">
                        <fieldset>  
                            <?php if(!empty($_SESSION['login-attempt']) && $_SESSION['login-attempt'] == 'username'){ ?>
                                
                                <div class="form-group label-floating">
                                    <label class="control-label" for="username">Username</label>
                                    <input class="form-control" name="username" id="username" type="text" value="<?php echo $_SESSION['username-attempt']; ?>">
                                </div>
    
                            <?php }else{ ?>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="username">Username</label>
                                    <input class="form-control" name="username" id="username" type="text">
                                </div>
                            <?php } ?>        
                            
                            
                            <div class="form-group label-floating tuklasbatangas-password-show">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" class="form-control tuklasbatangas-password" name="password">
                                <i class="fa fa-eye show-off show-password" id="showPassword"></i>
                                
                                <?php if(!empty($_SESSION['login-attempt']) && $_SESSION['login-attempt'] == 1){ ?>
                                    <span class="login-fail"> Username or password is incorrect</span>
                                <?php unset($_SESSION['login-attempt']); } ?>
                                
                                <?php if(!empty($_SESSION['login-attempt']) && $_SESSION['login-attempt'] == 'username') { ?>
                                    <span class="login-fail"> Password is incorrect</span>
                                <?php unset($_SESSION['login-attempt']);
                                      unset($_SESSION['username-attempt']); } ?>
                                
                            </div>
                            
                            <div class="form-group">
                                <div class="login-form-btns">
                                    <input type="submit" class="btn btn-raised btn-primary" value="LOGIN">
                                </div>
                            </div>
                            
                            <div class="form-group already-registered">
                                <a href="forgot_password.php">Forgot Password?</a>
                            </div>
                             
                            <div class="form-group already-registered">
                                Don't have an account yet? Click here to <a href="register.php">Register</a>.<br>
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
