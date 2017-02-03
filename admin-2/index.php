<?php
    session_start(); 
    require_once("header.php");

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
        
    $SQL = "SELECT `id`, `establishment`, `gallery`, `city` FROM `poi` WHERE `status` = 'published'";
    
    $db->Query($SQL);
    
    if($db->result)
        while($row = $db->result->fetch_assoc())
            $slider[] = $row;
    
    $tanauan = array();
    $lipa = array();
    $balete = array();
    $laurel = array();
    $talisay = array();
    $mataasnakahoy = array();
    $malvar = array();
    $stotomas = array();
        
    for($x=0;$x<count($slider);$x++){
        if($slider[$x]['city'] == 'tanauan')
            $tanauan[] = $slider[$x];
        else if($slider[$x]['city'] == 'lipa')
            $lipa[] = $slider[$x];
        else if($slider[$x]['city'] == 'balete')
            $balete[] = $slider[$x];
        else if($slider[$x]['city'] == 'laurel')
            $laurel[] = $slider[$x];
        else if($slider[$x]['city'] == 'talisay')
            $talisay[] = $slider[$x];
        else if($slider[$x]['city'] == 'mataas-na-kahoy')
            $mataasnakahoy[] = $slider[$x];
        else if($slider[$x]['city'] == 'malvar')
            $malvar[] = $slider[$x];
        else if($slider[$x]['city'] == 'santo-tomas')
            $stotomas[] = $slider[$x];
    }

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
                    <button class="btn btn-primary btn-raised edit-slider" type="button" data-toggle="modal" data-target="#edit-slider">Edit Section</button>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <?php for($x=1;$x<count($sliderList);$x++){ ?>
                                 <li data-target="#carousel-example-generic" data-slide-to="<?php echo $x; ?>"></li>
                            <?php } ?>
                        </ol>
                        <div class="modal fade" role="dialog" id="edit-slider">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Edit Slider Section</h4>
                                    </div>
                                    <div class="modal-body slider-modal">
                                        <p>Please choose the POIs that you would like to feature in the slider section</p>
                                        <form method="post" action="edit-slider.php">
                                            <table>
                                                <tr>
                                                    <td style="width:50%" valign="top">
                                                        <div class="slider-modal-header">Balete:</div>
                                                        <?php if(empty($balete)) { ?> none <?php } ?>
                                                        <?php for($x=0;$x<count($balete);$x++){ ?>
                                                            <label class="slider-checkbox">
                                                                <input type="checkbox" <?php if(strpos($sliderids, $balete[$x]['id']) !== false) { echo "checked"; } ?> name="slider[]" value="<?php echo $balete[$x]['id']; ?>"> <?php echo $balete[$x]['establishment'];  ?>
                                                            </label>
                                                        <?php } ?>
                                                        
                                                        <hr width=200px>
                                                        
                                                        <div class="slider-modal-header">Laurel:</div>
                                                        <?php if(empty($laurel)) { ?> none <?php } ?>
                                                        <?php for($x=0;$x<count($laurel);$x++){ ?>
                                                            <label class="slider-checkbox">
                                                                <input type="checkbox" <?php if(strpos($sliderids, $laurel[$x]['id']) !== false) { echo "checked"; } ?> name="slider[]" value="<?php echo $laurel[$x]['id']; ?>"> <?php echo $laurel[$x]['establishment'];  ?>
                                                            </label>
                                                        <?php } ?>

                                                        <hr width=200px>
                                                        
                                                        <div class="slider-modal-header">Lipa:</div>
                                                        <?php if(empty($lipa)) { ?> none <?php } ?>
                                                        <?php for($x=0;$x<count($lipa);$x++){ ?>
                                                            <label class="slider-checkbox">
                                                                <input type="checkbox" <?php if(strpos($sliderids, $lipa[$x]['id']) !== false) { echo "checked"; } ?> name="slider[]" value="<?php echo $lipa[$x]['id']; ?>"> <?php echo $lipa[$x]['establishment'];  ?>
                                                            </label>
                                                        <?php } ?>

                                                        <hr width=200px>
                                                        
                                                        <div class="slider-modal-header">Malvar:</div>
                                                        <?php if(empty($malvar)) { ?> none <?php } ?>
                                                        <?php for($x=0;$x<count($malvar);$x++){ ?>
                                                            <label class="slider-checkbox">
                                                                <input type="checkbox" <?php if(strpos($sliderids, $malvar[$x]['id']) !== false) { echo "checked"; } ?> name="slider[]" value="<?php echo $malvar[$x]['id']; ?>"> <?php echo $malvar[$x]['establishment'];  ?>
                                                            </label>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="width:50%" valign="top">                                                       
                                                        <div class="slider-modal-header">Mataas na Kahoy:</div>
                                                        <?php if(empty($mataasnakahoy)) { ?> none <?php } ?>
                                                        <?php for($x=0;$x<count($mataasnakahoy);$x++){ ?>
                                                            <label class="slider-checkbox">
                                                                <input type="checkbox" <?php if(strpos($sliderids, $mataasnakahoy[$x]['id']) !== false) { echo "checked"; } ?> name="slider[]" value="<?php echo $mataasnakahoy[$x]['id']; ?>"> <?php echo $mataasnakahoy[$x]['establishment'];  ?>
                                                            </label>
                                                        <?php } ?>

                                                        <hr width=200px>
                                                        
                                                        <div class="slider-modal-header">Sto. Tomas:</div>
                                                        <?php if(empty($stotomas)) { ?> none <?php } ?>
                                                        <?php for($x=0;$x<count($stotomas);$x++){ ?>
                                                            <label class="slider-checkbox">
                                                                <input type="checkbox" <?php if(strpos($sliderids, $stotomas[$x]['id']) !== false) { echo "checked"; } ?> name="slider[]" value="<?php echo $stotomas[$x]['id']; ?>"> <?php echo $stotomas[$x]['establishment'];  ?>
                                                            </label>
                                                        <?php } ?>

                                                        <hr width=200px>
                                                        
                                                        <div class="slider-modal-header">Talisay:</div>
                                                        <?php if(empty($talisay)) { ?> none <?php } ?>
                                                        <?php for($x=0;$x<count($talisay);$x++){ ?>
                                                            <label class="slider-checkbox">
                                                                <input type="checkbox" <?php if(strpos($sliderids, $tanauan[$x]['id']) !== false) { echo "checked"; } ?> name="slider[]" value="<?php echo $talisay[$x]['id']; ?>"> <?php echo $talisay[$x]['establishment'];  ?>
                                                            </label>
                                                        <?php } ?>
                                                        
                                                        <hr width=200px>
                                                        
                                                        <div class="slider-modal-header">Tanauan:</div>
                                                        <?php if(empty($tanauan)) { ?> none <?php } ?>
                                                        <?php for($x=0;$x<count($tanauan);$x++){ ?>
                                                            <label class="slider-checkbox">
                                                                <input type="checkbox" <?php if(strpos($sliderids, $tanauan[$x]['id']) !== false) { echo "checked"; } ?> name="slider[]" value="<?php echo $tanauan[$x]['id']; ?>"> <?php echo $tanauan[$x]['establishment'];  ?>
                                                            </label>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary">
                                        <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Cancel</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <!-- Wrapper for slides -->
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <?php 
                                    $gallery = explode(",", $sliderList[0]['gallery']);
                                ?>
                                <div class="slider-img">
                                    <img src="../gallery/<?php echo $sliderList[0]['username']; ?>/<?php echo $gallery[0]; ?>" class="img-responsive" alt="First slide" style="webkit-filter: brightness(50%);filter: brightness(50%);">
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
                                                <img src="../gallery/<?php echo $sliderList[$x]['username']; ?>/<?php echo $gallery[0]; ?>" class="img-responsive" alt="First slide">
                                            </div>
                                            <div class="header-text">

                                                <div class="col-md-12 text-center">
                                                    <h2>
                                                        <div class="tuklaslider-header">
                                                            <?php echo $sliderList[$x]['establishment']; ?>
                                                        </div>
                                                        <div class="tuklaslider-sub">
                                                            <p><?php echo $sliderList[$x]['description']; ?></p>
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
                        
                         <div class="col-lg-3 col-md-4 col-sm-6 thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="../img/mabini.JPG" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Tanauan</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=tanauan">VIEW</a>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="../img/lipa%20cathedral1.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Lipa</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=lipa">VIEW</a>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="../img/laurel.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Laurel</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=laurel">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect"> 
                                <img class="img-responsive tuklasbatangas-grid-photo" src="../img/balete_2.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Balete</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=balete">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="../img/Malvar-MIGUELMALVARMUSEUM.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Malvar</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=malvar">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="../img/santo-tomas.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Santo Tomas</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=santo-tomas">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="../img/mataas-na-kahoy.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Mataas na Kahoy</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=mataas-na-kahoy">VIEW</a>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-4 col-sm-6  thumb">  
                            <div class="hovereffect">
                                <img class="img-responsive tuklasbatangas-grid-photo" src="../img/talisay_2.jpg" alt="">
                                <div class="overlay">
                                    <h2 class="h2-grid">Talisay</h2>
                                    <a class="btn btn-raised btn-primary tuklas-gridview" href="list-poi.php?city=talisay">VIEW</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div> <!-- End second row -->
                
                <div class="row tuklasbatangas-quote" style="margin-top: 30px;">
                    <button class="btn btn-raised edit-quote" type="button" data-toggle="modal" data-target="#edit-quote">Edit Section</button>
                    <div class="col-md-6 col-md-offset-3">
                        <p class="tuklasbatangas-quote-message"><i class="fa fa-quote-left tuklabatangas-quote-left"></i> <?php echo $quote[0]['content']; ?> <i class="fa fa-quote-right tuklabatangas-quote-right"></i></p> <span class="quote-author">– <?php echo $author[0]['content']; ?></span>
                    </div>
                </div> <!-- End third row -->
                
                <div class="modal fade" role="dialog" id="edit-quote">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Edit Quote Section</h4>
                                    </div>
                                    <div class="modal-body slider-modal">
                                        <p>Please provide a quote preferably about travel and / or Batangas. Also please try to provide the author of the quote</p>
                                        <form method="post" action="edit-quote.php">
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="author">Quote</label>
                                            <textarea class="form-control" name="quote" rows="3" id="textArea"><?php echo $quote[0]['content']; ?></textarea>
                                            <span class="help-block">Maximum of 70 characters</span>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="author">Quote Author</label>
                                            <input class="form-control" value="<?php echo $author[0]['content']; ?>" id="author" name="author" type="text">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary">
                                        <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Cancel</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                
                <div class="row">
                   <div id="slide1">
                            <div class="map-batangas">
                                <div class="col-md-6 col-lg-6">
                                    <img id="map-tuklas" class="map-tuklas map img-responsive" src="../img/map_default.png" style="margin-left:70px;">    
                                </div>
                                <div class="col-xs-6 col-md-6 col-lg-6">
                                    <div id="tuklas-places">
                                        <p class="tuklasbatangas-map-header">Locate North Batangas</p>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=lipa"><p class="tooltips" id="lipa" onmouseover="mouseOverLipa()" onmouseout="mouseOut()">Lipa</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=balete"><p class="tooltips" id="balete" onmouseover="mouseOverBalete()" onmouseout="mouseOut()">Balete</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=malvar"><p  class="tooltips" id="Malvar" onmouseover="mouseOverMalvar()" onmouseout="mouseOut()">Malvar</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=santo-tomas"><p class="tooltips" id="Tomas" onmouseover="mouseOverStoTomas()" onmouseout="mouseOut()">Sto. Tomas</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=talisay"><p class="tooltips" id="Talisay" onmouseover="mouseOverTalisay()" onmouseout="mouseOut()">Talisay</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=mataas-na-kahoy"><p class="tooltips" id="Mataas" onmouseover="mouseOverMataasNaKahoy()" onmouseout="mouseOut()">Mataas na Kahoy</p></a><br> 
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=tanauan"><p class="tooltips" id="Tanauan" onmouseover="mouseOverTanauan()" onmouseout="mouseOut()">Tanauan</p></a><br>
                                        <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=laurel"><p class="tooltips" id="Laurel" onmouseover="mouseOverLaurel()" onmouseout="mouseOut()">Laurel</p></a>
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
document.getElementById("map-tuklas").src='../img/map_lipa.png';
}

function mouseOverBalete() {
document.getElementById("map-tuklas").src='../img/map_balete.png';
}
    
function mouseOverMalvar() {
document.getElementById("map-tuklas").src='../img/map_malvar.png';
}

function mouseOverStoTomas() {
document.getElementById("map-tuklas").src='../img/map_santo-tomas.png';
}
    
function mouseOverTalisay() {
document.getElementById("map-tuklas").src='../img/map_talisay.png';
}

function mouseOverMataasNaKahoy() {
document.getElementById("map-tuklas").src='../img/map_mataasnakahoy.png';
}
    
function mouseOverLaurel() {
document.getElementById("map-tuklas").src='../img/map_laurel.png';
}
    
function mouseOverTanauan() {
document.getElementById("map-tuklas").src='../img/map_tanauan.png';
}
    
function mouseOut() {
document.getElementById("map-tuklas").src='../img/map_default.png';
}

</script>
