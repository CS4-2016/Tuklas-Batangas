<?php
    session_start();
    
    require_once("dbconn.php");
    
    $db = new db();
    $db->Connect();
    
    $username = $_GET['user'];
    
    $SQL = "SELECT `gallery`,`caption-gallery` FROM `poi` WHERE `username` = '$username'";
    
    
    $db->Query($SQL);
    
    if($db->result){
        $row[] = $db->result->fetch_assoc();
    }

    $img = $_GET['img'];
    $gallery = explode(",", $row[0]['gallery']);
    $caption = explode(",", $row[0]['caption-gallery']);

    $key = array_search($img, $gallery);    
    $delete_gallery = array_splice($gallery, $key, 1);
    $delete_caption = array_splice($caption, $key, 1);

    $gallery = implode(",", $gallery);
    $caption = implode(",", $caption);
    
    $SQL = "UPDATE `poi` SET `gallery` = '$gallery', `caption-gallery` = '$caption' WHERE `username` = '$username'";
    
    $db->Query($SQL);
    
    $db->Close();
    unset($db);

    $path = "gallery/$username/$img";
    unlink($path);

    header("Location: edit-poi.php")
        
?>