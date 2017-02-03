<?php
    session_start();
    require_once("../dbconn.php");

    $about = $_POST['about'];

    if(!empty($_POST['content'])){
        $content = $_POST['content'];
    } else if(!empty($_POST['content2'])){
        $content = $_POST['content2'];
    } else if(!empty($_POST['content3'])){
        $content = $_POST['content3'];
    }

    $db = new db();
    $db->Connect();

    $content = $db->Escape($content);
    
    $SQL = "UPDATE `content` SET `content` = '$content' WHERE `page` = '$about'";

    $db->Query($SQL);
    
    header("Location:about.php");
?>