<?php
    session_start(); 
    require_once("header.php");
    
    $db = new db();
    $db->Connect();

    if(empty($_SESSION['free-username']) ||                                 
       empty($_SESSION['type']) ||
       empty($_SESSION['password']) ||
       empty($_POST['owner']) ||
       empty($_POST['contactown']) ||
       empty($_POST['emailown'])){
        header("Location: register-step3.php");
    }
    
    $_SESSION['owner'] = $db->Escape($_POST['owner']);
    $_SESSION['contactown'] = $db->Escape($_POST['contactown']);
    $_SESSION['emailown'] = $db->Escape($_POST['emailown']);

    $db->Close();
    unset($db);
?>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id="content">
            <div class="tuklasbatangas-main-content tuklasbatangas-space">
                <div class="container">
                    <div class="row">                      
                        <!-- CONTENT -->
                            <div class="col-md-4 col-md-offset-4">
                                <div class="tuklas-header">
                                    Register to Tuklas Batangas
                                </div>
                                <div class="login-sub-header">
                                    Step 4 of 4<br>
                                    Establishment Information 
                                </div>
                                
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                    
                                <form class="form-horizontal"  method="post" action="register-complete.php" enctype="multipart/form-data">
                                    <fieldset>  
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="establishment">Name of Establishment:</label>
                                            <input class="form-control" id="establishment" name="establishment" type="text" required>
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
                                        
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="address">Address</label>
                                            <textarea name="address" class="form-control" rows=3 required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="emailpoi">Email Address:</label>
                                            <input class="form-control" id="emailpoi" name="emailpoi" type="email" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="contactpoi">Contact Number:</label>
                                            <input class="form-control" id="contactpoi" name="contactpoi" type="text" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" id="document" name="document" accept="image/*, application/pdf">
                                            <div class="input-group">
                                                <input type="text" readonly="" class="form-control" placeholder="Attach legal document...">
                                                <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="6LdqzhMUAAAAAL5RU1phSBwjhnr9lgc95clBQc8Q"></div>
                                        </div>
                                        <i class="fa fa-question-circle fa-document-info" aria-hidden="true" type="button" data-toggle="modal" data-target="#document-info"></i>     
                                        <div class="modal fade" role="dialog" id="document-info">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Document upload</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>To prove that you are indeed the owner of the establishment you are trying to register, we need a piece of document that justifies your ownership of said establishment. <br><br> Upload only images or PDF files</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Got it!</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                     
                               
                                        <div class="form-group">
                                            <div class="login-form-btns">
                                                <input type="submit" value="submit" name="submit" class="btn btn-raised btn-primary">
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
    