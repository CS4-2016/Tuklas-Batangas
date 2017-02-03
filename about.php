    <?php
    session_start(); 
    $_SESSION['page'] = "about";
    require_once("header.php");

    $db = new db();
    $db->Connect();

    $SQL = "SELECT * FROM content WHERE page = 'ptc-description'";
    $db->Query($SQL);

    if($db->result)
        $content1[]=$db->result->fetch_assoc();      

    $SQL2 = "SELECT * FROM content WHERE page = 'bp-description'";
    $db->Query($SQL2);

    if($db->result)
        $content2[]=$db->result->fetch_assoc();
    
    $SQL3 = "SELECT * FROM content WHERE page = 'mfg-description'";
    $db->Query($SQL3);

    if($db->result)
        $content3[]=$db->result->fetch_assoc();       
    
    $db->Close();
    unset($db);
?>
            <div class="tuklasbatangas-main-content tuklasbatangas-space">
                <div class="container">
                    <div class="row">
                        <div class="tuklasbatangas-about">
                            <div class="tuklas-header">
                                About
                            </div>
                            <br> 
                            <div class="col-sm-4 col-md-4">
                                <div class="post">
                                    <div class="content-tuklasbatangas-about">
                                        <?php echo  $content1[0]['content']; ?>
                                    </div>
                                        <center><a href="provincial-tourism-office.php" class="btn btn-raised btn-primary" style="margin-bottom: 30px; margin-top:30px">Read more</a></center>
                                    </div>
                                </div>
                                
                                <div class="col-sm-4 col-md-4">
                                    <div class="post">
                                        <div class="content-tuklasbatangas-about">
                                            <?php echo  $content2[0]['content']; ?>
                                        </div>
                                        <center><a href="batangas-provincial-government.php" class="btn btn-raised btn-primary" style="margin-bottom: 30px; margin-top:30px">Read more</a></center>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-4">
                                    <div class="post">
                                        <div class="content-tuklasbatangas-about">
                                            <?php echo  $content3[0]['content']; ?>
                                        </div>
                                        <center><a href="message-from-the-governor.php" class="btn btn-raised btn-primary" style="margin-bottom: 30px; margin-top:30px">Read more</a></center>
                                    </div>
                                </div>               
                            </div>
                        </div>
                    </div>
                </div>
          
		

<?php require_once("footer.php"); ?>
