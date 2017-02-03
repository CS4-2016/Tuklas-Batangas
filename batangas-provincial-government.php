<?php
    session_start(); 
    require_once("header.php");

    $db = new db();
    $db->Connect();   
    
    $SQL = "SELECT * FROM content WHERE page = 'batangas-provincial-government'";
    $db->Query($SQL);
    
    if($db->result)
        $content[]=$db->result->fetch_assoc();

    $db->Close();
    unset($db);

?>

    <div id="content">
            <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
        
                <div class="container">
                    <div class="row">
                   
                                    <?php
                                        echo $content[0]['content'];
                                    ?>   
            </div> 
               
               
         
            </div>
		</div><!-- #content -->

<?php require_once("footer.php"); ?>
