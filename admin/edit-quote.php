<?php 
    session_start();
    require_once("../dbconn.php");

    $db = new db();
    $db->Connect();

    
    $quote = $_POST['quote'];
    $author = $_POST['author'];

    
    $SQL = "UPDATE `content` SET `content` = '$quote' WHERE `page` = 'quote'";

    $db->Query($SQL);

    $SQL = "UPDATE `content` SET `content` = '$author' WHERE `page` = 'author'";

    $db->Query($SQL);
    
    header("Location: index.php");
?>