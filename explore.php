<?php
    session_start(); 
    require_once("header.php");


    $con = mysqli_connect("localhost","root","","tuklasbatangas");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    $a= array();
    $i=0;
    $sql= mysqli_query($con,"SELECT * FROM poi");

    while( $row =mysqli_fetch_array($sql)){
    $str = $row['gallery'];
      $image= explode(",",$str);
         $last = $image[0];
      
    $b=array('id'=>$row["id"], 'name'=>$row["establishment"],'lat' => $row["latitude"], 'lng' => $row["longitude"], 'address'=>$row["address"],'description'=> $row["description"],'gallery'=> $str =$last, 'username'=>$row["username"]);
          $a[$i]=$b;
         $i++;
            
    
     }
?>
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ_mVAhURUv7C-jrsWPkAHp9iqaAeFnGs&libraries=geometry,places">
</script>
   <link href="css/style_jae3.css" rel="stylesheet">  
    <div id="content">
            <div class=" <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
                <div class="container-fluid">
                    <div class="row">
                
           
                        
                            <div id="map_canvas" class="col-md-8"> 
                                </div>
                      <div class="list-places col-md-4">
                            <input type="hidden" id="demo1" placeholder="Input Address" >
                           <div class="header-explore"> <center>The List Of Places</center></div><br><br>
                            <div >
                            
                                <p id="demo" class="demo">
                        </p>
                        
                        </div></div>
                        </div>
                
                    </div>
                </div>
            </div>  
		<!-- #content -->

<?php require_once("footer.php"); ?>

<script>
        var map = null;
          var radius_circle = null;
          var markers_on_map = [];
          var geocoder = null;
          var infowindow = null;
 
          var all_locations =  <?php echo json_encode($a);?>; 
      console.log(all_locations);
          
          $(document).ready(function(){
              var latlng = new google.maps.LatLng(13.7572, 121.0581); 
              var myOptions = {
                zoom: 10,
                center: latlng,
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              };
              map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
              geocoder = new google.maps.Geocoder();
              google.maps.event.addListener(map, 'click', function(){
                   if(infowindow){
                     infowindow.setMap(null);
                     infowindow = null;
                   }
              });
          });

          function showCloseLocations(position) {
              
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var latlong1= position.coords.latitude+", "+ position.coords.longitude;
            var i;
            var radius_km = 30;
            var address = latlong1;
            if (radius_circle) {
                radius_circle.setMap(null);
                radius_circle = null;
            }
            for (i = 0; i < markers_on_map.length; i++) {
                if (markers_on_map[i]) {
                    markers_on_map[i].setMap(null);
                    markers_on_map[i] = null;
                }
            }

            if (geocoder) {
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                            var address_lat_lng = results[0].geometry.location;
                            radius_circle = new google.maps.Circle({
                                center: address_lat_lng,
                                radius: radius_km * 1000,
                                clickable: false,
                                map: map

                            });
  
                            if (radius_circle) map.fitBounds(radius_circle.getBounds());
                            for (var j = 0; j < all_locations.length; j++) {
                                (function (location) {
                                    
                                    var marker_lat_lng = new google.maps.LatLng(location.lat, location.lng);
                                    var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(address_lat_lng, marker_lat_lng);
                                   
                                    if (distance_from_location <= radius_km * 1000) {
                                        var new_marker = new google.maps.Marker({
                                            position: marker_lat_lng,
                                            map: map,
                                            title: location.name,
                                             id: all_locations[j]['id'],
                                          
                                            
                                        }); 
                                      
                                      var  content = all_locations[j]['description'];
                                        
                                       
                                    var  image = all_locations[j]['gallery'];
                                        
                                      
                                     var  link = all_locations[j]['id'];
                                    var  username = all_locations[j]['username'];  
                                        var x = document.getElementById("demo1").value;
                                        document.getElementById("demo").innerHTML +="<div class='explore-info'><a href='view-poi.php?poi="+link+"'>"+'<center><img  class="image-explore" src="gallery/'+username +'/'+ image +'"></center>'+"</a><div class='contentexplore'><b><a class='title-place' href='view-poi.php?poi="+link+"'>" + new_marker.title +"</a></b><br> meters from my location "+ distance_from_location+ "<br></div><p class='contentexplore'>"
                                            +content+"</p><br>    <center><a href='view-poi.php?poi="+link+"' type='button' class='btn btn-raised btn-primary' id='useGPS' style='padding-right: 10px; padding-left:10px; margin-top: 20px;'>See More</a><br></center></div><br>";
                                        google.maps.event.addListener(new_marker, 'click', function () {
                                            if(infowindow){
                             infowindow.setMap(null);
                             infowindow = null;

                           }

                            infowindow = new google.maps.InfoWindow(
                            { content: '<div style="color:red">'+location.name +'</div>' + " is " + distance_from_location + " meters from my location",
                              size: new google.maps.Size(150,50),
                              pixelOffset: new google.maps.Size(0, -30)
                            , position: marker_lat_lng, map: map});
                                                });
                                                markers_on_map.push(new_marker);

                                            }
                                        })(all_locations[j]);


                                    }

                                } else {
                                    alert("No results found while geocoding!");
                                }
                            } else {
                                alert("Geocode was not successful: " + status);
                            }
                        });

            }


          }
    
    function getLocation(){
               var options = {timeout:60000};
               navigator.geolocation.getCurrentPosition(showCloseLocations);
        
         } getLocation();
    
</script>
