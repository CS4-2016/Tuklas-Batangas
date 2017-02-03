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
                        Login to Tuklas Batangas
                    </div>
                    
                    <form class="form-horizontal" method="post" action="login-authentication.php">
                        <fieldset>  
                            <div class="form-group label-floating">
                                <label class="control-label" for="username">Username</label>
                                <input class="form-control" name="username" id="username" type="text">
                            </div>
                            
                            <div class="form-group label-floating tuklasbatangas-password-show">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" class="form-control tuklasbatangas-password" name="password">
                                <i class="fa fa-eye show-off show-password" id="showPassword"></i>
                                <?php if(!empty($_SESSION['login-attempt'])){ ?>
                                    <span class="login-fail"> Username or password is incorrect</span>
                                <?php unset($_SESSION['login-attempt']); } ?>
                            </div>
                                
                            <div class="form-group" style="margin-top: 0;">                                
                                <div class="checkbox remember-me">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="login-form-btns">
                                    <input type="submit" class="btn btn-raised btn-primary" value="LOGIN">
                                </div>
                            </div>
                            
                            <div class="form-group already-registered">
                                Don't have an account yet? Click here to <a href="register.php">Register</a>.
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
