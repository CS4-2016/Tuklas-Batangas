<?php
    session_start(); 
    $_SESSION['page'] = 'poi';
    require_once("header.php");
    $db = new db();
    $db->Connect();
    
    $id = $_GET['poi'];
    
    $SQL = "SELECT * FROM `poi` WHERE `id` = '$id'";
    $db->Query($SQL);
    
    if($db->result){
        $row = $db->result->fetch_assoc();
    }

    $gallery = explode(",",$row['gallery']);

    $SQL = "SELECT `poi`.`username`,`pagerank`.`visits` FROM `poi` INNER JOIN `pagerank` ON `poi`.`username` = `pagerank`.`username` WHERE `poi`.`id` = '$id'";

    $db->Query($SQL);
    
    if($db->result)
        $page = $db->result->fetch_assoc();

    $cookie_name = $page['username'];
    $cookie_value = $page['username'];
    
    if(isset($_COOKIE[$cookie_name])) {
    
    } else {
        setcookie($cookie_name, $cookie_value,time()+86400,'/');
        $visits = 0;
        $visits = $page['visits']+1;
        $SQL = "UPDATE `pagerank` set `visits` = '$visits' where `username` = '$cookie_value'";
        $db->Query($SQL);
    }
    
    $db->Close();
    unset($db);
?>
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">            
            <div class="container">
                <div class="row tuklasbatangas-UserProfile">
                    <div class="col-md-12">
                        <div class="tuklas-header" style="margin-bottom:40px">
                            <?php echo $row['establishment']; ?>
                        </div>  
                    </div>           
                </div>
                <div class="row">
                    <div class="col-md-12 personal-info">
                        <div class="tuklas-batangas-view">
                         
                           
                                    <?php echo $row['content']; ?>
                                      
                        </div>
                    </div>     
                        
                        
                </div>
                <div class="row">
                    <div id="links">
                        <div class="tuklas-header2"><br><br>Gallery<br><br></div>                        
                      
                        <div class="container">
                            
                            <?php for($x=0;$x<count($gallery);$x++){ 
                                if($x%3 == 0){ ?>
                                    <div class="row">
                                <?php }  ?>
                                    <div class="col-md-4" style="margin-top:20px;">
                                        <a data-gallery="" title="<?php echo $caption[$x]; ?>" href="../gallery/<?php echo $row['username']; ?>/<?php echo $gallery[$x] ?>">
                                            <img class="img-responsive" style="border:2px solid #009688; max-height: 250px; margin-left:auto;margin-right:auto;" src="../gallery/<?php echo $row['username']; ?>/<?php echo $gallery[$x]; ?>">
                                        </a>          
                                    </div>
                                <?php if($x%3 == 2 || $x == (count($gallery)-1)){ ?>
                                    </div>
                                <?php }  ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
          
            
            <div class="container">
                <div class="row">
                       <div class="tuklas-header2">
                            <input type="hidden" id="current-lat"  name="current-lat" value="<?php echo $row['latitude']; ?>">
                            <input type="hidden" id="current-long"  name="current-long" value="<?php echo $row['longitude']; ?>">
                            <br><br><br><br>
                            Establishment Location and Directions
                        </div><br>
                    <div class="col-md-8" id="mapCanvas" style="padding:0px; height:450px; border: 2px solid #009688; ">
                    </div>

                    <center>
                        <div id="directionsPanel" class="col-md-4" style="padding:0px; height:450px; border: 2px solid #009688; border-left: none; background-color: white;">
                            <div class="direction-maps">
                                <a href="#geoLocation" type="button" class="btn btn-raised btn-primary" id="useGPS" style="padding-right: 10px; padding-left:10px; margin-top: 20px;">Use My Location</a>
                                <div class="directionInputs">
                                    <form>
                                        <div class="form-group label-floating" style="margin:5px">
                                            <input class="form-control" id="dirSource" value="" type="text" style="width: 300px">
                                        </div>
                                        <p><input type="hidden" value="" id="dirDestination" /></p>
                                        <a type="button" class="btn btn-raised btn-primary" href="#getDirections" id="getDirections" style="padding-right: 10px; padding-left:10px; margin:0">Get Directions</a>
                                        <a type="button" class="btn btn-raised btn-primary" href="#reset" id="paneReset" style="padding-right: 10px; padding-left:10px; margin:0">Reset</a>
                                    </form>	
                                </div>
                                <div id="directionSteps" style="height: 260px; margin-top:15px; margin-left:20px; overflow: auto">
                                    <p class="msg">Direction Steps Will Render Here</p>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
            	
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ_mVAhURUv7C-jrsWPkAHp9iqaAeFnGs&sensor=true&libraries=places"></script>
 
 
        </div>
    </div>
 <!-- #content -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>

<?php require_once("footer.php"); ?>


    <script>

(function(mapDemo, $, undefined) {    
	mapDemo.Directions = (function() {
		function _Directions() {
			var map,   
				directionsService, directionsDisplay, 
				autoSrc, autoDest, pinA, pinB, 
				
				markerA = new google.maps.MarkerImage('../img/point-a.png',
						  new google.maps.Size(24, 42),
						  new google.maps.Point(0, 0),
						  new google.maps.Point(12, 42)),		
				markerB = new google.maps.MarkerImage('../img/point-b.png',
						  new google.maps.Size(24, 41),
						  new google.maps.Point(0, 0),
						  new google.maps.Point(12, 41)), 
				
				// Caching the Selectors		
				$Selectors = {
					mapCanvas: jQuery('#mapCanvas')[0], 
					dirPanel: jQuery('#directionsPanel'),
					dirInputs: jQuery('.directionInputs'),
					dirSrc: jQuery('#dirSource'),
				    dirDst: jQuery('#dirDestination'),
					getDirBtn: jQuery('#getDirections'),
					dirSteps: jQuery('#directionSteps'), 
					useGPSBtn: jQuery('#useGPS'), 
					paneResetBtn: jQuery('#paneReset')
				},
				
				autoCompleteSetup = function() {
					autoSrc = new google.maps.places.Autocomplete($Selectors.dirSrc[0]);
					autoDest = new google.maps.places.Autocomplete($Selectors.dirDst[0]);
				}, // autoCompleteSetup Ends
			
				directionsSetup = function() {
					directionsService = new google.maps.DirectionsService();
					directionsDisplay = new google.maps.DirectionsRenderer({
						suppressMarkers: true
					});	
					
					directionsDisplay.setPanel($Selectors.dirSteps[0]);											
				}, // direstionsSetup Ends
				
				trafficSetup = function() {					
					// Creating a Custom Control and appending it to the map
					var controlDiv = document.createElement('div'), 
						controlUI = document.createElement('div'), 
						trafficLayer = new google.maps.TrafficLayer();
							
					jQuery(controlDiv).addClass('gmap-control-container').addClass('gmnoprint');
					jQuery(controlUI).text('Traffic').addClass('gmap-control');
					jQuery(controlDiv).append(controlUI);				
							
					// Traffic Btn Click Event	  
					google.maps.event.addDomListener(controlUI, 'click', function() {
						if (typeof trafficLayer.getMap() == 'undefined' || trafficLayer.getMap() === null) {
							jQuery(controlUI).addClass('gmap-control-active');
							trafficLayer.setMap(map);
						} else {
							trafficLayer.setMap(null);
							jQuery(controlUI).removeClass('gmap-control-active');
						}
					});							  
					map.controls[google.maps.ControlPosition.TOP_RIGHT].push(controlDiv);								
				}, // trafficSetup Ends
				
				mapSetup = function() {					
					map = new google.maps.Map($Selectors.mapCanvas, {
							zoom: 9,
							center: new google.maps.LatLng(13.9419, 121.1644),	
							
		                    mapTypeControl: true,
		                    mapTypeControlOptions: {
		                        style: google.maps.MapTypeControlStyle.DEFAULT,
		                        position: google.maps.ControlPosition.TOP_RIGHT
		                    },
		
		                    panControl: true,
		                    panControlOptions: {
		                        position: google.maps.ControlPosition.RIGHT_TOP
		                    },
		
		                    zoomControl: true,
		                    zoomControlOptions: {
		                        style: google.maps.ZoomControlStyle.LARGE,
		                        position: google.maps.ControlPosition.RIGHT_TOP
		                    },
		                    
		                    scaleControl: true,
							streetViewControl: true, 
							overviewMapControl: true,
							 							
							mapTypeId: google.maps.MapTypeId.ROADMAP
					});
					
					autoCompleteSetup();
					directionsSetup();
					trafficSetup();
				}, // mapSetup Ends 
				
				directionsRender = function(source, destination) {
					$Selectors.dirSteps.find('.msg').hide();
					directionsDisplay.setMap(map);
					
					var request = {
						origin: source,
						destination: destination,
						provideRouteAlternatives: false, 
						travelMode: google.maps.DirectionsTravelMode.DRIVING
					};		
					
					directionsService.route(request, function(response, status) {
						if (status == google.maps.DirectionsStatus.OK) {

							directionsDisplay.setDirections(response);
							
							var _route = response.routes[0].legs[0]; 
							
							pinA = new google.maps.Marker({position: _route.start_location, map: map, icon: markerA}), 
							pinB = new google.maps.Marker({position: _route.end_location, map: map, icon: markerB});																	
						}
					});
				}, // directionsRender Ends
				
				fetchAddress = function(p) {
					var Position = new google.maps.LatLng(p.coords.latitude, p.coords.longitude),  
						Locater = new google.maps.Geocoder();
					
					Locater.geocode({'latLng': Position}, function (results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							var _r = results[0];
							$Selectors.dirSrc.val(_r.formatted_address);
						}
					});
				}, // fetchAddress Ends
				
				invokeEvents = function() {
					// Get Directions
					$Selectors.getDirBtn.on('click', function(e) {
						e.preventDefault();
                        var latitude = document.getElementById('current-lat').value;
                        var longitude = document.getElementById('current-long').value;
                        var dst = latitude+", "+longitude;
						var src = $Selectors.dirSrc.val();
						
						directionsRender(src, dst);

					});
					
					// Reset Btn
					$Selectors.paneResetBtn.on('click', function(e) {
						$Selectors.dirSteps.html('');
						$Selectors.dirSrc.val('');
						$Selectors.dirDst.val('');
						
						pinA.setMap(null);
						pinB.setMap(null);		
						
						directionsDisplay.setMap(null);					
					});
					

					// Use My Location / Geo Location Btn
					$Selectors.useGPSBtn.on('click', function(e) {		
						if (navigator.geolocation) {
							navigator.geolocation.getCurrentPosition(function(position) {
								fetchAddress(position);
							});	
						}
					});
				}, //invokeEvents Ends 
				
				_init = function() {
					mapSetup();
					invokeEvents();
				}; // _init Ends
				
			this.init = function() {
				_init();
				return this; // Refers to: mapDemo.Directions
			}
			return this.init(); // Refers to: mapDemo.Directions.init()
		} // _Directions Ends
		return new _Directions(); // Creating a new object of _Directions rather than a funtion
	}()); // mapDemo.Directions Ends
})(window.mapDemo = window.mapDemo || {}, jQuery);

</script>