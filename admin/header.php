<?php
    require_once("dbconn.php");
    
    if(empty($_SESSION['username'])){
        header("Location: ../index.php");
    }    
    
    $db = new db();
	$db -> Connect();

    $type = $_SESSION['usertype'];
    $username = $_SESSION['username'];

    $current_page = $_SESSION['current-page'];

    if($current_page == 'users'){
        $header_users = 'active';
        $header_pageviews = '';
    } else if($current_page == 'page-views'){
        $header_users = '';
        $header_pageviews = 'active';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tuklas Batangas</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!-- Bootstrap Material Design -->
    <link href="css/ripples.css" rel="stylesheet">
    <link href="css/bootstrap-material-design.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/fonts.css" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="css/tuklas.css">
    <link rel="stylesheet" href="css/skin-green-light.css">
    <link rel="stylesheet" href="css/style.css">    
    <link href="css/style_jae.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/tuklasbatangas-favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/tuklasbatangas-favicon.ico" type="image/x-icon">    
    
    <!-- Summernote -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
</head>

<body class="hold-transition skin-green-light sidebar-mini fixed">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->   <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../img/tuklas.png" class="site-logo"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg logo-index">Tuklas Batangas</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        <!-- Username on the right side of the SPA module -->
        <div class="navbar-custom-menu unselectable" style="padding: 15px; cursor: pointer"> 
            <div id="header-user-click">
                <?php echo $username; ?>
                <i class="fa fa-user fa-fw"></i>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="unselectable" id="header-drop-down">
                <a href="user-profile.php"><li><i class="fa fa-user"></i> User Profile</li></a>
                <a href="logout.php"><li><i class="fa fa-sign-out"></i> Logout</li></a>
            </ul>
        </div>
    </nav>
  </header>
    
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Main Navigation</li>
            
            <!-- ADMIN HEADER -->
            <?php if($type == 'admin'){ ?>
                <li class="<?php echo $header_users; ?>"><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
                <li class="<?php echo $header_pageviews; ?>"><a href="page-views.php"><i class="fa fa-bar-chart"></i> <span>Page Views</span></a></li>
            <?php } ?>
            
            <!-- POI HEADER -->
            <?php if($type == 'poi'){ ?>
                <li class="active"><a href="points-of-interests.php?x=<?php echo $username; ?>"><i class="fa fa-dot-circle-o"></i> <span>My Points of Interests</span></a></li>
            <?php } ?>
            
            <!-- LTO HEADER -->
            <?php if($type == 'lto'){ ?>
                <li class="active"><a href="users.php"><i class="fa fa-users"></i> <span>User Accounts</span></a></li>
                <li><a href="#"><i class="fa fa-users"></i> <span>Points of Interest</span></a></li>
            

            <?php } ?>
            
                
          
<!--
        <li><a href="#"><i class="fa fa-link"></i> <span>Clients</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-database"></i> <span>Data Sources</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Excel Spreadsheet</a></li>
            <li><a href="#">Databases</a></li>
          </ul>
        </li>
-->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">