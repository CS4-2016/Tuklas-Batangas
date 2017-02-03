<?php
    require_once("dbconn.php");
    
    $db = new db();
	$db -> Connect();
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

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/tuklasbatangas-favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/tuklasbatangas-favicon.ico" type="image/x-icon">    
</head>

<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->   <a href="#" class="logo">
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
    </nav>
  </header>
    
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
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