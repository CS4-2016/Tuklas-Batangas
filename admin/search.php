<?php

require_once("../dbconn.php");
$db = new db();
$db->Connect();

$output = '';
//
    if(isset($_POST['search']))
    {
        $search = $_POST['search'];
        $search = preg_replace("#[^0-9a-z]#i","",$search);
        $query= $db->Query("SELECT * FROM poi WHERE establishment LIKE'%$search%' OR city LIKE'%$search%'");
        
        if($db->result){
            while($row = $db->result->fetch_assoc())
                $search2[] = $row;
            
            $count = count($search);
            
            if($count == 0){
                $search2 ='NONE';
            }
            
            $_SESSION['search'] = $search2;
            $_SESSION['query'] = $_POST['search'];
            header("Location: search-poi.php");
        }    
    }

?>  