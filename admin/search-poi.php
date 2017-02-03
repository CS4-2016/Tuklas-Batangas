<?php 
    session_start();
    $search = $_SESSION['search'];
    $query = $_SESSION['query'];
    
    require_once("header.php");

 
?>
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container-fluid">
                <div class="tuklas-header">
                    Search: "<?php echo $query; ?>"
                </div><br><br><br>  
            <?php if(!empty($search)){ ?>
                    <?php for($x=0; $x<count($search); $x++){ ?>
                        <div class="row" style="margin-bottom: 50px;">
                            <div class="col-md-3 col-md-offset-1">
                                <a href="#">
                                    <?php 
                                        $gallery = $search[$x]['gallery'];
                                        $imgs = explode(',', $gallery); 
                                    ?>
                                    <img class="img-responsive" src="../gallery/<?php echo $search[$x]['username']; ?>/<?php echo $imgs[0]; ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="tuklas-head"><?php echo $search[$x]['establishment'] ?></div><br>
                                <p><?php echo $search[$x]['description'] ?></p>
                                <a class="btn btn-primary btn-raised" href="view-poi.php?poi=<?php echo $search[$x]['id']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>
                    <?php }?>
            <?php } else{ ?>
                <div class="tuklas-header2">
                    <br>
                    Sadly, there were no results with your query<i class="fa fa-frown-o"></i><br>Please come again.
                </div>
            <?php } ?>
            </div>     
        </div>
    </div>

<?php require_once("footer.php"); ?>
