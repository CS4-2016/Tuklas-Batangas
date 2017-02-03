<?php 
    session_start();
    require_once("dbconn.php");

    $db = new db();
    $db->Connect();

    $username = $_SESSION['free-username'];
    $password = $_SESSION['password'];
    
    $officer = $_POST['officer'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    
    $SQL = "INSERT INTO `lto`(`username`,`name`, `city`) VALUES ('$username','$officer','$city')";
    
    $db->Query($SQL);

    $SQL = "INSERT INTO `users`(`username`, `password`, `email`,`contact`,`type`,`status`) VALUES ('$username','$password','$email','$contact','lto','pending')";

    $db->Query($SQL);

    $db->Close();
    unset($db);

    header("Location: login-authentication.php");    
?>