<?php
    session_start(); 
    require_once("header.php");
    $db = new db();
    $db -> Connect();
    if(empty($_POST['username']) || empty($_POST['password'])){
        header("Location: register-lto-step2.php");
    }
        

    $username = $db->Escape($_POST['username']);

    $SQL = "SELECT * FROM users WHERE username = '$username'";
    $db->Query($SQL);
    
    $rowcount = mysqli_num_rows($db->result);
    if($rowcount == 1){
        $_SESSION["register-username"] = 1;
        header("Location:register-lto-step2.php");
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
                                    Step 3 of 3<br>
                                    Officer Details
                                </div>
                                
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                    
                                <form class="form-horizontal" method="post" action="register-lto-complete.php" role="form" data-toggle="validator">
                                    <fieldset>                                  
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="officer">Name of Officer:</label>
                                            <input class="form-control" id="officer" name="officer" type="text" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="contact">Contact Number:</label>
                                            <input class="form-control" id="contact" name="contact" type="text" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="email">Email Address:</label>
                                            <input class="form-control" id="email" name="email" type="email" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <label for="city" class="control-label">Choose City...</label>                                           
                                                <select id="city" name="city" class="form-control" required>
                                                    <option value="" unselectable></option>
                                                    <option value="lipa">Lipa City</option>
                                                    <option value="tanauan">Tanauan City</option>
                                                    <option value="malvar">Malvar</option>
                                                    <option value="stotomas">Sto. Tomas</option>
                                                    <option value="mataasnakahoy">Mataas na Kahoy</option>
                                                    <option value="talisay">Talisay</option>
                                                    <option value="balete">Balete</option>
                                                    <option value="laurel">Laurel</option>
                                                </select>
                                            <i class="fa fa-caret-down fa-select-city" aria-hidden="true"></i>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="login-form-btns">
                                                <input type="submit" value="REGISTER" class="btn btn-raised btn-primary">
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
