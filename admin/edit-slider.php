<?php 
    session_start();
    require_once("../dbconn.php");

    $db = new db();
    $db->Connect();

    
    $slider = $_POST['slider'];
    $slider = implode(",", $slider);
    
    $SQL = "UPDATE `content` SET `content` = '$slider' WHERE `page` = 'slider'";

    $db->Query($SQL);
    
    header("Location: index.php");
?>