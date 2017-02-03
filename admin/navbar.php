<?php
    $db = new db();
    $db->Connect();
    
    if(!empty($_SESSION['page'])){
        if($_SESSION['page'] =="contact"){
            $contact = "active";
            $about = "";
        } else if ($_SESSION['page'] == "about"){
            $contact = "";
            $about = "active";
        } else if ($_SESSION['page'] == 'members'){
            $members = "admin-header-active";
            $userprofile = "";
        } else if ($_SESSION['page'] == 'user-profile'){
            $userprofile = "admin-header-active";
            $website = "";
        } else if ($_SESSION['page'] == 'edit-website'){
            $userprofile = "";
            $website = "admin-header-active";
        } else if ($_SESSION['page'] == 'page-rank'){
            $pagerank = "admin-header-active";
        }
    }

    if(!empty($_SESSION['username'])){
        $username = $_SESSION['username'];
        $SQL = "SELECT `type`,`status` FROM `users` WHERE `username` = '$username'";
        $db->Query($SQL);
    
        if($db->result)
            $row[]=$db->result->fetch_assoc();
    }

    $db->Close();
    unset($db);
?>
        <div id="header">
            <div class="container-fluid" style="padding-right:0px;padding-left:0px;">
                    <?php if(!empty($_SESSION['username'])){ ?>
                    <div class="row admin-header" id="admin-header">
                        <div class="col-md-6 admin-header" style="padding-left:0px;">
                            <p class="admin-header-text"> You are logged in as <span class="user-logged-in"><a href="user-profile.php"> <?php echo $_SESSION['username']; ?>.</span></a></p>
                        </div>
                        
                    <!-- Admin Navbar -->
            <?php if(!empty($_SESSION['username'])){
                    if($row[0]['type'] == 'admin'){ ?>
                        <div class="col-md-6 admin-header2">
                            <ul class="admin-status-text">
                                 <a href="user-profile.php"> 
                                    <li class=" <?php if(!empty($userprofile)) echo $userprofile; ?>">
                                        <i class="fa fa-user"></i> User Profile
                                    </li>
                                </a>
                                 <a href="page.php"> 
                                    <li class=" <?php if(!empty($pagerank)) echo $pagerank; ?>">
                                        <i class="fa fa-file-text-o"></i> Page Rank
                                    </li>
                                </a>
                            </ul>
                        </div>
                        
            <?php } else{
                        header("Location: ../index.php");
                    }
            } ?> 
                    </div> 
            <?php } ?>
            <?php if(!empty($_SESSION['username'])){ ?>
                <nav class="navbar navbar-inverse tuklasbatangas-navbar-admin">
            <?php } else { ?>
                <nav class="navbar navbar-inverse tuklasbatangas-navbar">
            <?php } ?>
                            
                    <div id="tuklas-nav" class="tuklas-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="index.php" class="navbar-brand">
                                <img src="../img/banner.png" class="tuklasbatangas-logo"></a>
                        </div>
                        
                        <div class="nav navbar-nav navbar-right tuklasbatangas-nav collapse navbar-collapse" id="mainNavBar" style="margin-right:0px">
                             <form class="navbar-form navbar-left" action="search-poi.php" method="post">
                                <div class="form-group" style="margin-top: -5px;">
                                    <i class="fa fa-search" style="margin-right: 5px;"></i>
                                    <input type="text" class="form-control col-md-8" name="search" style="font-family: 'Lato', sans-serif;" placeholder="Search">
                                </div>
                            </form>
                            <ul class="nav navbar-nav" id="nav">
                                <li class="<?php echo $about; ?>"><a href="about.php">ABOUT</a></li>
                                <li class="<?php echo $contact; ?>"><a href="contact.php">CONTACT</a></li>
                                <?php if(empty($_SESSION['username'])){ ?>
                                        <li><a href="login.php" class="btn btn-login-header tuklasbatangas-transparent-btn">LOGIN</a></li>
                                        <li><a href="register.php" class="btn tuklasbatangas-transparent-btn">REGISTER</a></li>
                                <?php } else { ?>
                                        <li><a href="logout.php" class="btn btn-login-header tuklasbatangas-transparent-btn">LOGOUT</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
		</div><!-- #header -->
<?php
    if(!empty($_SESSION['page'])){
        unset($_SESSION['page']);
    }
?>