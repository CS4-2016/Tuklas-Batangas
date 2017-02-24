<?php
    require_once("dbconn.php");
    
    $db = new db();
	$db->Connect();
?>

<!DOCTYPE html>
<html >
    <head>
        <title>Tuklas Batangas</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Mobile support -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/tuklasbatangas-favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/tuklasbatangas-favicon.ico" type="image/x-icon">

        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Material Design -->
        <link href="css/bootstrap-material-design.css" rel="stylesheet">
        <link href="css/ripples.css" rel="stylesheet">
        
        <!-- Font Awesome & Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/fonts.css" rel="stylesheet">
        
        <!-- Tuklas Batangas Styling-->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style_jae.css" rel="stylesheet">
        <link href="css/style_jae2.css" rel="stylesheet">
        
        <!-- Blueimp -->
        <link href="css/blueimp-gallery.min.css" rel="stylesheet">
        
        <!-- Summernote -->
        <link href="css/summernote.css" rel="stylesheet">
    </head>

    <body>
        <div id="wrapper">
		<?php require_once("navbar.php"); ?>		