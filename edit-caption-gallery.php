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
    $key = array_search($img, $gallery);    

    

    header("Location: edit-poi.php")
        
?>