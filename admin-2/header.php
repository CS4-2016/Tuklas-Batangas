<?php
    require_once("../dbconn.php");
    
    $db = new db();
	$db -> Connect();

    $SQL = "SELECT * FROM `users` WHERE `type` = 'admin'";
    $db -> Query($SQL);

    if($db->result){
        $row[] = $db->result->fetch_assoc();
    }

    if($_SESSION['username'] !== $row[0]['username']){
        header("Location:../index.php");
    }

    $db->Close();
    unset($db);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tuklas Batangas</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Mobile support -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="../img/tuklasbatangas-favicon.ico" type="image/x-icon">
        <link rel="icon" href="../img/tuklasbatangas-favicon.ico" type="image/x-icon">

        <!-- Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Material Design -->
        <link href="../css/bootstrap-material-design.css" rel="stylesheet">
        <link href="../css/ripples.css" rel="stylesheet">
        
        <!-- Font Awesome & Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/fonts.css" rel="stylesheet">
        
        <!-- Tuklas Batangas Styling-->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/style_jae.css" rel="stylesheet">
        <link href="../css/style_jae2.css" rel="stylesheet">

        <!-- Summernote -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
        
        <!--  Blueimp -->
        <link rel="stylesheet" href="../css/blueimp-gallery.min.css">
    </head>

    <body>
        <div id="wrapper">
		<?php require_once("navbar.php"); ?>		
		
        
        