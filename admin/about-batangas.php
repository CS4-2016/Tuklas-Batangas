<?php
    session_start(); 
    require_once("header.php");

    $db = new db();
    $db->Connect();   
    
    $SQL = "SELECT * FROM content WHERE page = 'about-batangas'";
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
                        <center><button id="edit" class="btn btn-raised btn-primary tuklas-gridview" onclick="edit()">Edit 1</button>
                        <button id="save" class="btn btn-raised btn-primary tuklas-gridview"  onclick="save()">Save 2</button></center>
                        <form action="edit-pages.php" method="post">
                                <div class="click2edit">
                                    <?php
                                        echo $content[0]['content'];
                                    ?>   
                                </div>
                           <input type="hidden" name="content" id="summernote-content">
                            <input type="hidden" name="page" id="summernote-content" value="about-batangas">
                            
                                 <center><input type="submit" class="btn btn-raised btn-primary tuklas-gridview" ></center>
                        <!-- END CONTENT-->
                        </form>
                         
                        </div>
                    </div>
                </div>
            </div>
	<!-- #content -->

<?php require_once("footer.php"); ?>
