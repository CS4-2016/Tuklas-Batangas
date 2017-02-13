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
                                    <img src="gallery/<?php echo $sliderList[0]['username']; ?>/<?php echo $gallery[0]; ?>" class="img-responsive slider-imgs" alt="First slide">
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
                                                <img src="gallery/<?php echo $sliderList[$x]['username']; ?>/<?php echo $gallery[0]; ?>" class="img-responsive slider-imgs" alt="First slide">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 thumb">  
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
                            <div class="col-md-8 col-lg-8">
  <?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 21.0.2, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 600 400" style="enable-background:new 0 0 600 400;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#FCE6A2;stroke:#000000;stroke-width:0.25;stroke-miterlimit:10;}
    .map:hover{fill:#808080;stroke:#000000;stroke-width:0.25;stroke-miterlimit:10;}
	.st1{fill:#3399CC;stroke:#000000;stroke-width:0.25;stroke-miterlimit:10;}
    
</style>
<path class="st0" d="M18,35l6,2.5l16.9,7L54.2,35l21.8,11.2l-8,13.6h10.9l15.8,18.6c0,0,6.9-3.5,9.8-3c2.9,0.5,6,3,11.8,3
	c0,0,4,0.3,6.6,9.6c0,0,5.5,13.4,15.8,6.3c0,0,11.2-3,22.1,16.9c0,0,4.9,1.2,8.3-1.1c0,0,1.4-1.6,8.9-2.7l6.6-2.2c0,0,2-2.7,5.2,0.3
	l25.3-4.1c0,0,13.5-7.9,28.7-12.6c0,0,18.1-4.6,24.4-8.5c0,0,17.2-7.1,23-12c0,0,9.5-2.5,17,5.4c0,0,6.6-2.4,11.2,1.7
	c0,0,1.1-3,9.5,1.6l9.8,0.5c0,0,12.1,2.7,12.6,31.7c0,0,0,21.8,14.7,36.6c0,0,13.5-3.3,11.8,4.9c0,0-2.6,5.2,2.3,10.1
	s1.7,8.2,1.7,8.2H373c0,0-9.8,7.4-6,13.1c0,0-4.3,9,14.1,10.1c0,0,1.2,2.2,1.9,6s18.3,3.8,18.3,3.8l15.2,5.2c0,0,5.2,0.5,7.8-3
	l10.9,0.3c0,0,10.3,11.2,19.5,12c0,0,26.2,7.1,24.7,11.7l-4,5.2l-1.4,1.4h-7.2l2.3,2.7l0.3,5.2c0,0-1.4,2.7-0.9,4.4
	c0,0-3.2,4.9-1.1,6.8c2,1.9,1.1,7.4,1.1,7.4s5.2,7.4,6,7.9c0.9,0.5,0,7.6,0,7.6l-3.4,3c0,0-0.6,5.5,5.2-1.1c0,0,5.2-0.1,7.8,3.2v5.2
	l-12.9,9l-8,6c0,0-7.2,3-10.1-4.1c0,0-10.6-5.7-16.7,0.3c0,0-7.8,1.5-10.1,4.5c0,0-6.3,4.8-8.9,4.3l-10.9,9.6l-0.6,3.5l-3.2,1.6
	h-3.2l-4.6,5.5l-1.7,1.6h-17.5L361,316.4l-13.2-0.5c0,0-4.9-1.1-6.6-3.3c0,0,0.6-7.4-11.2-4.9l-5.5,0.5l-23.9,4.1l-2.3,2.7
	l-10.6,0.3c0,0-3.4,5.5-9.5-2.5l-5.5,0.8l-4-1.4l-1.7-1.9l-1.4,1.6l-4-1.6c0,0-2.3-6.6,6-9.6l2.6-9c0,0-5.2-8.7-1.7-10.6l6-8.2
	l-1.4-5.7l-1.4-3l-2.9-3l-1.7-3l0.6-6l-3.2-3.3l-3.2-3.5l-1.7,2.7l-4.3-1.1l-4.2-2.5l-4.5-1.4l-1.4-2.2c0,0-23.9-4.6-25.9,17.7
	l-2.9,2.5l-4,0.8l-3.2,3.8l-2.9,6l-4,4.6l-2.3,3.3l-9.5,4.6c0,0-14.4,1.4-14.1-15.6l4.3-1.9l9.8-11.2c0,0,4.3-4.6,13.2-3.5l1.1-2.7
	l-0.9-3.3l2-1.9l-2-4.1l-2.6-0.8l-0.6-2.7l-2.9-1.6l-1.1-4.9l-2.3-3l-3.4-2.7l-1.1-1.6c0,0,12.1,1.6,8.3-13.9c0,0-3.4-3-2.9-7.1
	l-6.9-8.7c0,0-12.1-4.9-12.6-6.3c0,0-5.7,1.6-9.8-0.8l-5.7-0.3c0,0-3.2-2.5-8.3-3.7c-5.2-1.2-1.4,0-1.4,0l-9.2-3.4l-19-1.4l-1.4-1.4
	H114c0,0-1.7-4.9-10.1-1.6h-6c0,0-14.1,11.3-9.2,20.5l11.2,10.6l-0.9,4.9l-3.4,1.1l-1.1,1.6c0,0-4.9,1.9-6.3,0.5s-6.6-3.8-6.6-3.8
	l-12.6-0.8l-1.7,0.5l-2.9-0.5l-2.3,0.8l-0.6,1.4l1.4,3.3l-1.4,1.9l-0.6,2.7c0,0,2,1.1,2.9,1.6s3.4,5.5,3.4,5.5s2.6,7.4,6.9,10.1
	l-1.4,4.9l-2.6,2.7l-3.4,2.5l-0.6,1.6l-6.3-2.2l-2.3-4.1l-3.2-4.4l-6.3-6.8l-4.3-2.5v-2.7l4.6-1.1l0.3-2.5l-3.4,1.1l-2.6-2.5l-2-5.7
	v-6l1.1-13.9l3.7-5.2l-0.3-6l0.6-7.9c0,0-0.9-5.2-4.9-5.2l-0.9-4.4l2-0.3v-4.4h-2.6l-3.7-4.1l-0.9-4.1l5.5-0.5c0,0,3.7,4.9,7.5,1.1
	l1.1-4.4l-1.1-2.2l-2.3-4.1l-2.3-2.7l-1.7-3.8l1.4-2.5l-0.9-2.2L43,127l2.9-4.4l0.6-13.4c0,0,0.9-4.1-1.7-6l-1.1-7.4
	c0,0,10.1-7.9-13.8-9.3l-0.6-2.7l-6.3-0.5L18,81.4v-3.5l3.4-1.1l6,1.4l3.2,0.3l-1.1-3.5c0,0,21.6-1.1-0.6-8.2l-7.2-2.2v-1.6l3.2-1.1
	l9.8-0.3l4-1.6L37,58.2l-4,0.5l-1.1-2.2l-4-0.5l-1.4-8.2v-4.6L18,35z"/>
<path class="st1 " d="M210.1,111.6c0,0-1.7,4.5,5.6,6.3c0,0,3.9,1.8,1.3,6.1c-2.6,4.3,0.9,3.9,0.9,3.9v1.6l1.1,1.4v17.6l1.7,1v2.9
	v1.4c0,0-15.7,7.6,0,20.3l11.4,5.7c0,0,3.9-1,1.3,12.5c0,0,1.7,8.2,7.8,0c0,0,1.1-5.3,5.4-1c0,0,3.7,2.5,4.5-3.7h3.5
	c0,0,4.3,3.9,1.3-6.8c0,0,4.1-9.8,4.1-12.5l5.6-0.4l11.4-3.9c0,0,2.4-3.5,2.4-4.7s2.6-2.3,2.6-2.3l1.3-14.1c0,0,8.4-8,2.6-11.5
	l-2.8-0.2c0,0-3-4.5-7.3,1.2l-6.3,0.4l-0.4-6.6c0,0,7.1-4.1,5.4-10.2l1.3-1.2l0.2-3.5l-1.9-3.5l-1.3-2.7l-2.8-2.3h-2.6v-2.3h-3.4
	l-4.3,1l-3.2,1.4l-6.3-0.8c0,0-5.8-1.8-7.8,2.3l-5,1.6l-2.8-1.2l-3.2-2l-3.2-0.4l-3.7,0.4l-2.2,3.3v2l-4.1,2h-3.9l-2.8,0.8
	L210.1,111.6z"/>
<path class="st0" d="M224.8,126.9c0,0-3-5.9,5.4-5.5l2.6,2.8h3l4.5-1.1c0,0,1.3-0.2,1.9-0.2s5.4-1.5,5.4-1.5l3.4-2l2.2,3.8l-1.3,3.8
	l-0.9,3.3l2.2,2l-3.2,9.6c0,0-5.6,5.3-6.3,5.3s-6.9,0-6.9,0l-3.7,1.3l-0.9,2.8h-3.4l-2.4-2.8l2.8-3.4l-1.3-2l-1.1-0.4l-1.5-6.1
	l1.3-5.5l0.4-2v-1.4L224.8,126.9z"/>
<polygon class="st0" points="236.2,135.3 238.7,137.6 242.2,135.3 242.2,132.9 238.7,131.6 236.2,133.1 "/>
<path class="st1" d="M233.8,130.2c0,0-1.3,4.3-1.1,5.1c0.2,0.8,2.4,4.3,3.4,4.5c1.1,0.2,6-2.3,6-2.3l4.3-5.1l-3.7-2.3l-6.7-1.2
	L233.8,130.2z"/>
<path class="st0 map" d="M321.3,112.5"/>
<a href="list-poi.php?city=laurel"> <path class="st0 map" id="laurel" d="M160.9,111.2l3.3,2.5l4,7.5c0,0,25.7,15,29.5,16.4l21.3-5.9V131l-1.1-1.4v-1.6c0,0-3.4-0.2-0.9-3.9
	c0,0,2.7-4.1-1.3-6.1c-4-2-5.9-1.4-5.6-6.3c0,0,3.1-0.8,4.1-1h3.9l4.1-2v-2l2.2-3.3l1.7-0.2l-3.9-5.3l-6.9,3.7l-25.3,4.1
	c0,0-3-3.2-5.2-0.3l-6.6,2.2c0,0-7.3,1.2-8.9,2.7C169.2,110.1,163.1,112.7,160.9,111.2z"/></a>
<path class="st0 " d="M159.8,87.6"/>
<a href="list-poi.php?city=talisay"> <path class="st0 map" id="talisay" d="M222.1,97.7l3.9,5.3l2-0.2l3.2,0.4l3.2,2l2.8,1.2l5-1.6c0,0,2.1-4.1,7.8-2.3l6.3,0.8l3.2-1.4l4.3-1h3.4l6.3-6.3
    V82.3l-1.9-3.3l-3.4,1.5l-7.6,3.3l-10.4,3.3c0,0-5.9,1.5-9.7,2.8C240.4,89.9,228.6,94.3,222.1,97.7z"/></a>
<a href="list-poi.php?city=tanauan" ><path class="st0 map" id="Tanauan1" d="M308.3,117.9l16.3-5.9l-0.6-7.7l-11.1-8.7l-0.3-3.2l1.4-1.7c0,0,2.3-2.5-6.2-6.8l-0.4-11.3
	c0,0-5.9-6.5-15.9-4.4c0,0-6.6,5-19.8,10.7l1.9,3.3v12.4l-6.3,6.3v2.3h2.6l2.8,2.3l3.2,6.1l-0.2,3.5l-1.3,1.2c0,0,2.1,5.3-5.4,10.2
    l0.4,6.6l6.3-0.4c0,0,2.1-3.5,5.4-2.7l0.5-0.8L308.3,117.9z"/> </a>
<a href="list-poi.php?city=balete"> <path class="st0 map" id="balete" d="M281,129.9c0,0,1.2,0.2,2,1.5s0,0,0,0l2.8,0.2c0,0,2.6,2,2,3.1c-0.6,1.2,0,0,0,0l3.2,0c0,0,0.1,3.6,4.2,7.7
	l10.3,8l4-4.7c0,0,1.7-3.4,7.8-3.1l0.6,0.3c0,0-2.4-4.7-2.7-5.7s0.4-2.3-6-5.9c-6.4-3.5-5.5-3.3-5.5-3.3l-5.4,0l-4.3-4.2l-12.4,5.2
	L281,129.9"/></a>
<a href="list-poi.php?city=malvar" ><path class="st0 map" id="malvar" d="M293.9,123.9l13.9-5.8l17.2-6.4l6.1,3l0.3,3.2c0,0,1.1,0.4,2.9,3.3l0.9,3.9l1.5,1.5l1.7,5h-3.2l-2.6,4.5
    l-10.5,7.2c0,0-2.8,2.4-5-0.5l-2.2-5.4c0,0-0.3-1.8-1.4-2.7c-1.1-0.9-9.3-6.1-10.1-6.5c-0.8-0.4-5.4,0-5.4,0L293.9,123.9z"/></a>
<a href="list-poi.php?city=lipa" ><path class="st0 map" id="lipa" d="M380.2,160.8c-5-4.8-2.3-10.1-2.3-10.1s2.9-8.2-11.8-4.9l-4.4,3.4c0,0-0.2,2.3-8.5-0.7l-8-4l-6.8-13h-3.2
	l-2.6,4.5l-11.5,7.8c0,0-1.9,1-4-1.1c0,0-5-0.9-7.8,3.1l-4,4.7l1.7,3.9v2.7c0,0-4.9,11.4-8.5,2.9l-12.5-0.4l-4.3-2.4
	c0,0-2.6,0.7-2.6,2.3c0,1.5-2.4,4.7-2.4,4.7l-4.3,1.8l9.3,9.9l18.7,2.7l0.5,8.3l4.5,0.6v6.5l5.1,1.4v5.5l16.6,6l26.5-16.9l15-1.1
	c0,0-4.2-3.7-2-6.8c0,0-4.1-4.9,6-13.1h8.9C381.9,169,385.2,165.6,380.2,160.8z M373.4,168.7c-0.1,0-0.1,0.1-0.1,0.1
	C373.3,168.8,373.3,168.8,373.4,168.7z M375,167.4 M373.7,168.5c0,0-0.1,0.1-0.1,0.1C373.6,168.6,373.6,168.5,373.7,168.5z
    M377.3,165.5"/></a>
<a href="list-poi.php?city=santo-tomas" ><path class="st0 map" id="tomas" d=" M308.4,73.7l-1.1-1.1l0.4,11.3c1.4,0,9.9,5,4.8,8.5l0.3,3.2l11.1,8.7l0.6,7.7l0.5-0.3l6.1,3l0.3,3.2
	c0,0,2.6,2,2.9,3.3c0.3,1.3,0.9,3.9,0.9,3.9l1.5,1.5l1.7,5l6.8,13l8,4c0,0,7.1,2.8,8.5,0.7c1.3-2.1,3.6-3.2,4.4-3.4
	c0.8-0.2-8.5-10-10.7-17.1c-2.2-7.1-4.2-12.6-4.2-25.2s-6.5-21.6-12.4-26c-1-0.7,2.2,1.6,0,0L329,77c0,0-6.5-4.3-9.5-1.6
    c-0.4,0.4,1.7-1.5,0,0C319.6,75.4,317.3,71.9,308.4,73.7C307.6,73.9,310.8,73.2,308.4,73.7l-1.1-1.1"/></a>
<a href="list-poi.php?city=mataasnakahoy"><path class="st0 map"  id="Mataas1"  d="M287.8,134.8l3.2,0c0,0,1.8,6.9,4.2,7.7l10.3,8l1.7,3.9v2.7c0,0-4.6,10.7-8.5,2.9l-12.5-0.4l-4.3-2.4l1.3-14.1
	C283.2,143.1,288.1,137.9,287.8,134.8"/> </a>
</svg>


  
                            </div>
                            <div class="col-xs-6 col-md-4 col-lg-4">
                                <div id="tuklas-places">
                                    <p class="tuklasbatangas-map-header">Locate North Batangas</p>
                                    <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=balete"><p class="tooltips"  id="Balete" >Balete</p></a><br>
                                    <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=laurel"><p class="tooltips" id="Laurel" >Laurel</p></a><br>
                                    <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=lipa"><p class="tooltips" id="Lipa"  >Lipa</p></a><br>
                                    <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=malvar"><p  class="tooltips" id="Malvar">Malvar</p></a><br>
                                    <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=mataas-na-kahoy" >
                                    <p class="tooltips" id="Mataas"> Mataas na Kahoy</p></a><br> 
                                    <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=santo-tomas"><p class="tooltips" id="Tomas">Sto. Tomas</p></a><br>
                                    <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=talisay"><p class="tooltips" id="Talisay" >Talisay</p></a><br>
                                    <i class="fa fa-caret-right map-bullet" aria-hidden="true"></i><a href="list-poi.php?city=tanauan"><p class="tooltips" id="Tanauan">Tanauan</p></a><br>
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
$( "#Mataas" ).hover(
  function() {
    $("#Mataas1").css('fill' ,'#808080');
  }, function() {
    $("#Mataas1").css('fill' ,'#FCE6A2');
  }
);
$('#Mataas').mouseover(function(e) {
    $(this).prev().mouseover();
});
//<--tanauan---->
$( "#Tanauan" ).hover(
  function() {
    $("#Tanauan1").css('fill' ,'#808080');
  }, function() {
    $("#Tanauan1").css('fill' ,'#FCE6A2');
  }
);
$('#Tanauan').mouseover(function(e) {
    $(this).prev().mouseover();
});
//<--lipa---->
    $( "#Lipa" ).hover(
  function() {
    $("#lipa").css('fill' ,'#808080');
  }, function() {
    $("#lipa").css('fill' ,'#FCE6A2');
  }
);
$('#Lipa').mouseover(function(e) {
    $(this).prev().mouseover();
});
    //<--laurel---->
    $( "#Laurel" ).hover(
  function() {
    $("#laurel").css('fill' ,'#808080');
  }, function() {
    $("#laurel").css('fill' ,'#FCE6A2');
  }
);
$('#Laurel').mouseover(function(e) {
    $(this).prev().mouseover();
});
        //<--malvar---->
    $( "#Malvar" ).hover(
  function() {
    $("#malvar").css('fill' ,'#808080');
  }, function() {
    $("#malvar").css('fill' ,'#FCE6A2');
  }
);
$('#Malvar').mouseover(function(e) {
    $(this).prev().mouseover();
});
            //<--balete---->
    $( "#Balete" ).hover(
  function() {
    $("#balete").css('fill' ,'#808080');
  }, function() {
    $("#balete").css('fill' ,'#FCE6A2');
  }
);
$('#Balete').mouseover(function(e) {
    $(this).prev().mouseover();
});
         //<--talisay---->
    $( "#Talisay" ).hover(
  function() {
    $("#talisay").css('fill' ,'#808080');
  }, function() {
    $("#talisay").css('fill' ,'#FCE6A2');
  }
);
$('#Talisay').mouseover(function(e) {
    $(this).prev().mouseover();
});  
          //<--stotomas---->
    $( "#Tomas" ).hover(
  function() {
    $("#tomas").css('fill' ,'#808080');
  }, function() {
    $("#tomas").css('fill' ,'#FCE6A2');
  }
);
$('#Tomas').mouseover(function(e) {
    $(this).prev().mouseover();
});   
</script>
