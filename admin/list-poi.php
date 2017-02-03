<?php
    session_start();    
    unset($_SESSION['page']);
    require_once("header.php");

    $db = new db();
    $db->Connect();
    
    $city = $_GET['city'];
    $SQL = "SELECT * FROM `poi` WHERE `city` = '$city'";
    
    $db->Query($SQL);
    $poiList = array();
    
    if($db->result){
        while($row = $db->result->fetch_assoc())
            $poiList[] = $row;
    }        
    
?>
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container-fluid">
                <div class="tuklas-header">
                    The beautiful places in <?php echo ucfirst($city); ?>.
                </div><br><br><br>  
            <?php if(!empty($poiList)){ ?>
                    <?php for($x=0; $x<count($poiList); $x++){ ?>
                        <div class="row" style="margin-bottom: 50px;">
                            <div class="col-md-3 col-md-offset-1">
                                <a href="#">
                                    <?php 
                                        $gallery = $poiList[$x]['gallery'];
                                        $imgs = explode(',', $gallery); 
                                    ?>
                                    <img class="img-responsive" src="../gallery/<?php echo $poiList[$x]['username']; ?>/<?php echo $imgs[0]; ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="tuklas-head"><?php echo $poiList[$x]['establishment'] ?></div><br>
                                <p><?php echo $poiList[$x]['description'] ?></p>
                                <a class="btn btn-primary btn-raised" href="view-poi.php?poi=<?php echo $poiList[$x]['id']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>
                    <?php }?>
            <?php } else{ ?>
                <div class="tuklas-header2">
                    <br>
                    Sadly, no one has published their pages yet. <i class="fa fa-frown-o"></i><br>Please come again.
                </div>
            <?php } ?>
            </div>     
        </div>
    </div>

<?php require_once("footer.php"); ?>
