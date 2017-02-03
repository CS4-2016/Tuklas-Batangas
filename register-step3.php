<?php
    session_start(); 
    require_once("header.php");

    if(empty($_POST['username']) || empty($_POST['password'])){
        header("Location: register-step2.php");
    }
        
    $db = new db();
    $db -> Connect();
    $username = $db->Escape($_POST['username']);

    $SQL = "SELECT * FROM users WHERE username = '$username'";
    $db->Query($SQL);
    
    $rowcount = mysqli_num_rows($db->result);
    if($rowcount == 1){
        $_SESSION["register-username"] = 1;
        header("Location:register-step2.php");
    }

    $captcha = $db->Escape($_POST['captcha']);
    if ($_SESSION["vercode"] == $captcha) {} else{
        $_SESSION["captcha"] = 1;
        header("Location:register-step2.php");
    }
    
    $_SESSION['free-username'] = $db->Escape($_POST['username']);
    $_SESSION['password'] = $db->Escape($_POST['password']);

    $db->Close();
    unset($db);
    
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
                                    Step 3 of 4<br>
                                    Owner Details
                                </div>
                                
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                    
                                <form class="form-horizontal" method="post" action="register-step4.php" role="form" data-toggle="validator">
                                    <fieldset>                                  
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="owner">Name of Owner:</label>
                                            <input class="form-control" id="owner" name="owner" type="text" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="contact-own">Contact Number:</label>
                                            <input class="form-control" id="contactown" name="contactown" type="text" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="email-own">Email Address:</label>
                                            <input class="form-control" id="emailown" name="emailown" type="email" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="login-form-btns">
                                                <input type="submit" value="Proceed to Step 4" class="btn btn-raised btn-primary">
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
