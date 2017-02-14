<?php
    session_start();
    $_SESSION['page'] = 'user-profile';

    if(empty($_SESSION['username'])){
        header("Location: index.php");
    }

    require_once("../dbconn.php");

    $db = new db();
	$db -> Connect();

    $username = $_SESSION['username'];
    $contact = $_POST['contact'];
    $password = $_POST['password2'];

    $SQL="UPDATE `users` SET `password`='$password', `contact`='$contact' WHERE `username`='$username'";
    $db->Query($SQL);
    header("Location: user-profile.php");
?>