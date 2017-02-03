<?php
    session_start(); 
    require_once("header.php");
    //TESTING GITHUB
    $db = new db();
    $db->Connect();

    $SQL = "SELECT `content` FROM `content` WHERE `page` = 'slider'";

    $db->Query($SQL);

    if($db->result)
        $sliderids = $db->result->fetch_assoc();

    $sliderids = $sliderids['content'];
    $sliderids = explode(",", $sliderids);
    $sliderids = implode("','", $sliderids);

    $SQL = "SELECT `id`, `username`, `establishment`, `gallery`, `city`,`description` FROM `poi` WHERE `id` IN ('$sliderids')";
    
    $db->Query($SQL);
    
    if($db->result)
        while($row = $db->result->fetch_assoc())
            $sliderList[] = $row;

    $SQL = "SELECT `content` FROM `content` WHERE `page` = 'quote'";
    
    $db->Query($SQL);
    
    if($db->result)
        while($row = $db->result->fetch_assoc())
            $quote[] = $row;

    $SQL = "SELECT `content` FROM `content` WHERE `page` = 'author'";

    $db->Query($SQL);
    
    if($db->result)
        while($row = $db->result->fetch_assoc())
            $author[] = $row;
?>
        <div class="tuklasbatangas-main-content tuklasbatangas-space" style="margin-bottom:0px; padding-top:0px" id="tuklas-content">
            <div class="container-fluid">                
                <div class="row">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <?php for($x=1;$x<count($sliderList);$x++){ ?>
                                 <li data-target="#carousel-example-generic" data-slide-to="<?php echo $x; ?>"></li>
                            <?php } ?>
                        </ol>
                        <!-- Wrapper for slides -->
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <?php 
                                    $gallery = explode(",", $sliderList[0]['gallery']);
                                ?>
                                <div class="slider-img">
                                    <img src="gallery/<?php echo $sliderList[0]['username']; ?>/<?php echo $gallery[0]; ?>" class="img-responsive" alt="First slide">
                                </div>
                                <div class="header-text">
                                    
                                    <div class="col-md-12 text-center">
                                        <h2>
                                            <div class="tuklaslider-header">
                                                <?php echo $sliderList[0]['establishment']; ?>
                                            </div>
                                            <div class="tuklaslider-sub">
                                                <p><?php echo $sliderList[0]['description']; ?></p>
                                            </div>
                                        </h2>
                                        <br>
                                            <a class="btn btn-raised btn-primary" href="view-poi.php?poi=<?php echo $sliderList[0]['id']; ?>">Visit Page</a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if(count($sliderList) !== 1){ ?>
                                    <?php for($x=1;$x<count($sliderList);$x++) {?>
                                        <div class="item">
                                            <?php 
                                                $gallery = explode(",", $sliderList[$x]['gallery']);
                                            ?>
                                            <div class="slider-img">
                                                <img src="gallery/<?php echo $sliderList[$x]['username']; ?>/<?php echo $gallery[0]; ?>" class="img-responsive" alt="First slide">
                                            </div>
                                            <div class="header-text">

                                                <div class="col-md-12 text-center">
                                                    <h2>
                                                        <div class="tuklaslider-header">
                                                            <?php echo $sliderList[$x]['establishment']; ?>
                                                        </div>
                                                    </h2>
                                                    <br>
                                                        <a class="btn btn-raised btn-primary" href="view-poi.php?poi=<?php echo $sliderList[$x]['id']; ?>">Visit Page</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                            <?php }?>
                        </div>
                        
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span style="margin-left:20px" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span  style="margin-right:20px" class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div> 
                </div> <!--End first row -->
                
                <div class="row">
                    <div id="slide2">
                         <p class="text-center tuklas-batangas"> Explore Batangas</p>
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect"> 
                                <img class="img-responsive tuklasbatangas-grid-photo" src="img/balete_2.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Balete</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=balete">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="img/laurel.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Laurel</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=laurel">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="img/lipa%20cathedral1.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Lipa</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=lipa">VIEW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="img/Malvar-MIGUELMALVARMUSEUM.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Malvar</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=malvar">VIEW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="img/mataas-na-kahoy.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Mataas na Kahoy</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=mataas-na-kahoy">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="img/santo-tomas.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Santo Tomas</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=santo-tomas">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="img/talisay_2.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Talisay</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=talisay">VIEW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="img/mabini.JPG" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Tanauan</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=tanauan">VIEW</a>
                                </div>
                            </div>
                        </div> 
                    </div>  
                </div> <!-- End second row -->
                
                <div class="row tuklasbatangas-quote" style="margin-top: 30px;">
                    <div class="col-md-6 col-md-offset-3">
                        <p class="tuklasbatangas-quote-message"><i class="fa fa-quote-left tuklabatangas-quote-left"></i> <?php echo $quote[0]['content']; ?> <i class="fa fa-quote-right tuklabatangas-quote-right"></i></p> <span class="quote-author">– <?php echo $author[0]['content']; ?></span>
                    </div>
                </div> <!-- End third row -->
                <div class="row">
                   <div id="slide1">
                            <div class="map-batangas">
                                <div class="col-md-6 col-lg-6">
                                    <img id="map-tuklas" class="map-tuklas map img-responsive" src="img/map_default.png" style="margin-left:70px;">    
                                </div>
                                <div class="col-xs-6 col-md-6 col-lg-6">
                                    <div id="tuklas-places">
                                        <p class="tuklasbatangas-map-header">Locate North Batangas</p>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=balete"><p class="tooltips" id="balete" onmouseover="mouseOverBalete()" onmouseout="mouseOut()">Balete</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=laurel"><p class="tooltips" id="Laurel" onmouseover="mouseOverLaurel()" onmouseout="mouseOut()">Laurel</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=lipa"><p class="tooltips" id="lipa" onmouseover="mouseOverLipa()" onmouseout="mouseOut()">Lipa</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=malvar"><p  class="tooltips" id="Malvar" onmouseover="mouseOverMalvar()" onmouseout="mouseOut()">Malvar</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=mataas-na-kahoy"><p class="tooltips" id="Mataas" onmouseover="mouseOverMataasNaKahoy()" onmouseout="mouseOut()">Mataas na Kahoy</p></a><br> 
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=santo-tomas"><p class="tooltips" id="Tomas" onmouseover="mouseOverStoTomas()" onmouseout="mouseOut()">Sto. Tomas</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=talisay"><p class="tooltips" id="Talisay" onmouseover="mouseOverTalisay()" onmouseout="mouseOut()">Talisay</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=tanauan"><p class="tooltips" id="Tanauan" onmouseover="mouseOverTanauan()" onmouseout="mouseOut()">Tanauan</p></a><br>
                                    </div>
                                </div>
                            </div>
                        <!-- END CONTENT--> 
                        </div>
                    </div> <!-- End fourth row -->
                
                
                
                
                
                
                
                
                
            </div> <!-- End Container -->
            
            
            

            </div>
    </div>
		<!-- #content -->

<?php require_once("footer.php"); ?>


<script>
function mouseOverLipa() {
document.getElementById("map-tuklas").src='img/map_lipa.png';
}

function mouseOverBalete() {
document.getElementById("map-tuklas").src='img/map_balete.png';
}
    
function mouseOverMalvar() {
document.getElementById("map-tuklas").src='img/map_malvar.png';
}

function mouseOverStoTomas() {
document.getElementById("map-tuklas").src='img/map_santo-tomas.png';
}
    
function mouseOverTalisay() {
document.getElementById("map-tuklas").src='img/map_talisay.png';
}

function mouseOverMataasNaKahoy() {
document.getElementById("map-tuklas").src='img/map_mataasnakahoy.png';
}
    
function mouseOverLaurel() {
document.getElementById("map-tuklas").src='img/map_laurel.png';
}
    
function mouseOverTanauan() {
document.getElementById("map-tuklas").src='img/map_tanauan.png';
}
    
function mouseOut() {
document.getElementById("map-tuklas").src='img/map_default.png';
}

</script>
