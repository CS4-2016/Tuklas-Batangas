<?php
    session_start(); 
    $_SESSION['page'] = 'user-profile';
    require_once("header.php");

    if(empty($_SESSION['username'])){
        header("Location: index.php");
    }
    
    $db = new db();
    $db->Connect();
    
    $username = $_SESSION['username'];
    $SQL = "SELECT * FROM `users` WHERE `username` = '$username'";
    $db->Query($SQL);
    
    if($db->result){
        $user[] = $db->result->fetch_assoc();
    }

    $db->Close();
    unset($db);
?>
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container">
                <div class="col-md-6 col-md-offset-3">
                        <div class="tuklas-header">
                            Edit User Profile 
                        </div>  
                        <form action="user-profile2.php" method="post" class="form-horizontal" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <label for="username" class="col-md-2 control-label user-label">Username</label>
                                    <div class="col-md-10">
                                        <input type="text" disabled class="form-control" id="username" name="username" value="<?php echo $user[0]['username']; ?>">
                                    </div>
                                </div>
                                   <div class="form-group tuklasbatangas-password-show">
                                            <label class="col-md-2 control-label password-label" for="password">Password</label>
                                       <div class="col-md-10">
                                            <input type="password" disabled class="form-control tuklasbatangas-password" name="password" value="<?php echo $user[0]['password']; ?>">
                                            <i class="fa fa-eye show-off show-password" id="showPassword"></i>
                                            
                                        </div>
                                    </div>
                                     <div class="form-group tuklasbatangas-password-show">
                                            <label class="col-md-2 control-label password-label" for="password"> New Password</label>
                                       <div class="col-md-10">
                                            <input type="password" class="form-control tuklasbatangas-password2" name="password2" id="password2" data-minlength="6" >
                                            <i class="fa fa-eye show-off2 show-password2" id="showPassword2"></i>
                                           <div class="help-block">Minimum of 6 characters</div>
                                           </div>
                                    </div>
                                    <div class="form-group tuklasbatangas-password-show">
                                            <label class="col-md-2 control-label password-label" for="password"> Confirm -Password</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control tuklasbatangas-password3" name="password3" data-match="#password2" data-match-error="Passwords do not match">
                                            <div class="help-block with-errors"></div>
                                            <i class="fa fa-eye show-off3 show-password3" id="showPassword3"></i>
                                        </div>
                                    </div>
                                 <div class="form-group">
                                    <label for="username" class="col-md-2 control-label user-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $user[0]['email']; ?>" disabled>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="username" class="col-md-2 control-label user-label">Contact</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user[0]['contact']; ?>">
                                    </div>
                                </div>  
                                <br><br>
                            
                                <div class="form-group">
                                    <center> <input class="btn btn-raised btn-primary" type="button" data-toggle="modal" data-target="#save-changes" value="Save Changes"></center>
                                </div>
                            
                                <div class="modal fade" role="dialog" id="save-changes">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Are you sure you want to save changes?</h4>
                                            </div>
                                            <div class="modal-body">
                                                You can change them back whenever you feel like it.
                                            </div>
                                            <div class="modal-footer">
                                                <input class="btn btn-primary" type="submit" value="SAVE">
                                                <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>


            </div>
        </div>
    </div><!-- #content -->

<?php require_once("footer.php"); ?>
