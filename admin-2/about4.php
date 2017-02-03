<?php
    session_start();
    require_once("../dbconn.php");

    echo $about = $_POST['about'];?> <br> <?php
    echo $content = $_POST['content'];

    $db = new db();
    $db->Connect();
    
    $SQL = "UPDATE `content` SET `content` = '$content' WHERE `page` = '$about'";

    $db->Query($SQL);
    
//    header("Location:about.php");
?>