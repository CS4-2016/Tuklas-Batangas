<?php
    session_start();
    require_once("dbconn.php");
    
    $db = new db();
    $db->Connect();

    $user = $_POST['user'];
    $establishment = $_POST['establishment'];
    $owner = $_POST['owner'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $SQL = "INSERT INTO `poi`(`username`,`establishment`,`owner`,`address`,`city`,`contact`,`email`) VALUES('$user','$establishment','$owner','$address','$city','$contact','$email')";
    
    $db->Query($SQL);
    $db->Close();

    header("Location: points-of-interests.php?x=$user");
?>