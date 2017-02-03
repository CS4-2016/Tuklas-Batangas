<?php
    session_start();
    require_once("../dbconn.php");
    $db = new db();
    $db->Connect();

    $content = addslashes($_POST['content']);
    $page = $_POST['page'];
    
    $SQL = "UPDATE `content` SET `content`='$content' WHERE page = '$page'";
     
    $db->Query($SQL);
    
    if($db->result)
        header("Location: $page.php");

?>