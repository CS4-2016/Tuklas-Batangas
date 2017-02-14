<?php
    session_start(); 
    session_destroy();
    session_start();
    require_once("header.php");
?>
    
    <div id="content">
            <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="tuklas-header">
                                Register to Tuklas Batangas
                            </div>                        
                            <div class="login-sub-header">
                                Step 1 <br>
                                Please choose account type:
                            </div>
                            <div class="progress progress-striped active">
                                <div class="progress-bar" style="width: 2%"></div>
                            </div>
                            <form class="form-horizontal" method="post" action="register-type.php" role="form" data-toggle="validator"> 
                                <br>
                                <div class="form-group label-floating tuklasbatangas-password-show">
                                    
                                    <label class="control-label" for="type" >Account Type:</label>
                                    
                                    <select id="type" name="type" class="form-control" required>
                                        <option value="" unselectable></option>
                                        <option value="poi">Point of Interest Owner</option>
                                        <option value="lto">Local Tourism Officer</option>
                                    </select>                
                                </div>
                              
                                <br>
                                <div class="form-group">
                                    <center><input class="btn btn-raised btn-primary" type="submit" value="NEXT"></center>
                                </div>
                                <div class="form-group already-registered">
                                    Already have an account? Click here to <a href="login.php">Login</a>.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		</div><!-- #content -->

<?php require_once("footer.php"); ?>
<script language="javascript">
    $(document).ready(function(){
        $(".refresh").click(function () {
            $(".imgcaptcha").attr("src","demo_captcha.php?_="+((new Date()).getTime()));
        });
    });

</script>