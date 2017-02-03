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
                                        <div class="modal fade" role="dialog" id="modal-edit">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Edit Section</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>
                                                            <button id="save" class="btn btn-raised btn-primary" onclick="save()">Save</button>  
                                                        </center>
                                                        <form action="about2.php" method="post" class="form-horizontal">
                                                            <div class="click2edit">
                                                                <?php echo  $content1[0]['content']; ?>
                                                            </div>	
                                                            <input type="hidden" value="ptc-description" name="about">
                                                            <input type="hidden" name="content" id="content"/>
                                                            <input class="btn btn-primary" name="submit" type="submit" value="save">
                                                            <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Cancel</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Got it!</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <?php echo  $content1[0]['content']; ?>
                                    </div>
                                        <center><a href="provincial-tourism-office.php" class="btn btn-raised btn-primary" style="margin-bottom: 30px; margin-top:30px">Read more</a></center>
                                    </div>
                                <br>
                                <center>
                                            <button class="btn btn-raised btn-primary" aria-hidden="true" type="button" data-toggle="modal" data-target="#modal-edit" onclick="edit()">Edit Section</button>
                                        </center>
                                </div>
                                
                                <div class="col-sm-4 col-md-4">
                                    <div class="post">
                                        <div class="content-tuklasbatangas-about">
                                            <div class="modal fade" role="dialog" id="modal-edit2">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Edit Section</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center>
                                                                <button id="save" class="btn btn-raised btn-primary" onclick="save2()">Save</button>  
                                                            </center>
                                                            <form action="about2.php" method="post" class="form-horizontal" id="form1" enctype="multipart/form-data">
                                                                <div class="click2edit2">
                                                                    <?php echo  $content2[0]['content']; ?>
                                                                </div>	
                                                                <input type="hidden" value="bp-description" name="about">
                                                                <input type="hidden" name="content2" id="content"/>
                                                                <input class="btn btn-primary" name="submit" type="submit" value="save">
                                                                <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Cancel</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Got it!</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php echo  $content2[0]['content']; ?>
                                            </div>
                                        <center><a href="batangas-provincial-government.php" class="btn btn-raised btn-primary" style="margin-bottom: 30px; margin-top:30px">Read more</a></center>
                                    </div>
                                <br>
                                <center>
                                            <button class="btn btn-raised btn-primary" aria-hidden="true" type="button" data-toggle="modal" data-target="#modal-edit2" onclick="edit2()">Edit Section</button>
                                        </center>
                                </div>
                            
                                       
                            
                                <div class="col-sm-4 col-md-4">
                                    <div class="post">
                                        <div class="content-tuklasbatangas-about">
                                            <div class="modal fade" role="dialog" id="modal-edit3">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Edit Section</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center>
                                                                <button id="save" class="btn btn-raised btn-primary" onclick="save3()">Save</button>  
                                                            </center>
                                                            <form action="about2.php" method="post" class="form-horizontal" id="form1" enctype="multipart/form-data">
                                                                <div class="click2edit3">
                                                                    <?php echo  $content3[0]['content']; ?>
                                                                </div>	
                                                                <input type="hidden" value="mfg-description" name="about">
                                                                <input type="hidden" name="content3" id="content">
                                                                <input class="btn btn-primary" name="submit" type="submit" value="save">
                                                                <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Cancel</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Got it!</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php echo  $content3[0]['content']; ?>
                                            </div>
                                        <center><a href="message-from-the-governor.php" class="btn btn-raised btn-primary" style="margin-bottom: 30px; margin-top:30px">Read more</a></center>
                                    </div>
                                <br>
                                <center>
                                            <button class="btn btn-raised btn-primary" aria-hidden="true" type="button" data-toggle="modal" data-target="#modal-edit3" onclick="edit3()">Edit Section</button>
                                        </center>
                                </div>
                                                         
                            </div>
                        </div>
                    </div>
                </div>
          
		

<?php require_once("footer.php"); ?>
