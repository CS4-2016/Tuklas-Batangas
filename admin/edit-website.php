<?php
    session_start(); 
    $_SESSION['page'] = 'edit-website';
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
        $row = $db->result->fetch_assoc();
    }

    $db->Close();
    unset($db);
?>
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container">
                <div class="row tuklasbatangas-UserProfile">
                        <div class="tuklas-header">
                            Edit Website Settings
                        </div>  
<!--
                        <form action="user-profile2.php" method="post" class="form-horizontal">
                            <div class="col-md-12 personal-info">



                                <div class="form-group">
                                    <label for="username" class="col-md-2 control-label user-label">Username</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-md-2 control-label user-label">Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" id="username" name="username" placeholder="Password">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="username" class="col-md-2 control-label user-label">Username</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                    </div>
                                </div>




                            </div>
                        </form>
-->
                </div>


            </div>
        </div>
    </div><!-- #content -->

<?php require_once("footer.php"); ?>
