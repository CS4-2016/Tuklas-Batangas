<?php
    session_start();
    $_SESSION['page'] = 'user-profile';

    if(empty($_SESSION['username'])){
        header("Location: index.php");
    }

    require_once("dbconn.php");
    $db = new db();
	$db -> Connect();
    $username = $_SESSION['username'];
    
    
    if(!empty($_POST['password2'])){
        $password = $_POST['password2'];
        $SQL="UPDATE `users` SET `password`='$password' WHERE `username`='$username'";
        $db->Query($SQL);
    }

    if(!empty($_POST['password2'])){
        $contact = $_POST['contact'];    
        $SQL="UPDATE `users` SET `contact`='$contact' WHERE `username`='$username'";
        $db->Query($SQL);
    }
   
    $db->Close();
    unset($db);
    header("Location: user-profile.php");
?>