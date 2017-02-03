<?php 
    require_once('../dbconn.php');
    
    $db = new db();
    $db->Connect();

    $SQL = "SELECT `poi`.`establishment`, `pagerank`.`visits` FROM `poi` INNER JOIN `pagerank` ON `poi`.`username` = `pagerank`.`username`";

    $db->Query($SQL);

    $pagerank = array();

    if($db->result)
        while($row = $db->result->fetch_assoc())
            $pagerank[] = $row;
        
    echo json_encode($pagerank);
?>