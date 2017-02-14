<?php
    session_start();    
    unset($_SESSION['page']);
    require_once("header.php");

    $db = new db();
    $db->Connect();
    
    $city = $_GET['city'];
    $SQL = "SELECT * FROM `pagerank` INNER JOIN `poi` ON `pagerank`.`username` = `poi`.`username` WHERE `poi`.`city` = '$city' ORDER BY `pagerank`.`visits` DESC";
    
    $db->Query($SQL);
    $poiList = array();
    
    if($db->result){
        while($row = $db->result->fetch_assoc())
            $poiList[] = $row;
?>
          <link href="./css/style_jae3.css" rel="stylesheet" media="all">
<link href="./css/animate.min.css" rel="stylesheet" media="all">
          <link href="css/style_jae2.css" rel="stylesheet">
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container-fluid">
                <div class="tuklas-header">
                    The beautiful places in <?php echo ucfirst($city); ?>
                </div><br> 
                        <?php if(!empty($poiList)){ ?>
                    <?php for($x=0; $x<count($poiList); $x++){ ?>
        <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                     <?php 
                                     $imgs = explode(",", $poiList[0]['gallery']);
                                   
                            
                                        ?>
                    
                    <img src="gallery/<?php echo $poiList[$x]['username']; ?>/<?php echo $imgs[0]; ?>" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    
             

                    <div class="container">
                        <div class="row">
            
                            <div class="slide-text slide_style_left">
                                <p data-animation="animated fadeInLeft"><?php echo $poiList[0]['establishment'] ?></p>
                                <p data-animation="animated fadeInLeft"><?php echo $poiList[0]['description'] ?></p>
                          <a href="view-poi.php?poi=<?php echo $poiList[0]['id']; ?>" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">Read more..</a>
                            </div>

                        </div>
                    </div>
                </div>
             
                  <?php if(count($poiList) !== 1){ ?>
                                    <?php for($x=1;$x<count($poiList);$x++) {?>
                                        <div class="item">
                                            <?php 
                                                $gallery = explode(",", $poiList[$x]['gallery']);
                                            ?>
                                             <img src="gallery/<?php echo $poiList[$x]['username']; ?>/<?php echo $gallery[$x]; ?>" alt="Bootstrap Touch Slider"  class="slide-image" alt="First slide"/>
                                            <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_left">
                                <p data-animation="animated fadeInLeft"><?php echo $poiList[$x]['establishment'] ?></p>
                                <p data-animation="animated fadeInLeft"><?php echo $poiList[$x]['description'] ?></p>
                                <a href="view-poi.php?poi=<?php echo $poiList[0]['id']; ?>" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">select one</a>

                            </div>
                        </div>
                    </div>
                                        </div>
                                    <?php } ?>
                            <?php }?>
                
            </div>
            
              <ol class="carousel-indicators">
                            <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                            <?php for($x=1;$x<count($poiList);$x++){ ?>
                                 <li data-target="#bootstrap-touch-slider" data-slide-to="<?php echo $x; ?>"></li>
                            <?php } ?>
                        </ol>
         
            <a class="indicator-left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span  aria-hidden="true"> <img src="./img/Chevron%20Left%20.png"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="indicator-right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span  aria-hidden="true"> <img src="./img/Chevron%20Right%20.png"></span>
                <span class="sr-only">Next</span>
            </a>
 </div>
          <?php }?>
            <?php } else{ ?>
                <div class="tuklas-header2">
                    <br>
                    Sadly, no one has published their pages yet. <i class="fa fa-frown-o"></i><br>Please come again.
                </div>
            <?php } ?>
     </div></div>
        
<?php require_once("footer.php"); ?>
