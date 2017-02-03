<?php
    session_start(); 
    $_SESSION['page'] = 'poi';
    require_once("header.php");

    if(empty($_SESSION['username'])){
        header("Location: index.php");
    }
    
    $db = new db();
    $db->Connect();
    
    $username = $_SESSION['username'];
    $SQL = "SELECT * FROM `poi` WHERE `username` = '$username'";
    $db->Query($SQL);
    
    if($db->result){
        $row = $db->result->fetch_assoc();
    }

    $db->Close();
    unset($db); 
    
    if($row['gallery'] !== ""){
        $gallery = explode(",",$row['gallery']);
        $caption = explode(",",$row['caption-gallery']);
    }

    else 
        $gallery = "empty";

?>
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container">
                <div class="row tuklasbatangas-UserProfile">
                    <div class="col-md-12">
                        <div class="tuklas-header" style="margin-bottom:40px">
                            Edit <?php echo $row['establishment']; ?>
                        </div>  
                    </div>           
                </div>
                <div class="row">
                    <div class="col-md-12 personal-info">
                        <div class="tuklas-batangas-view">
                            <div class="tuklas-header2">
                                Content 
                            </div><br>
                            <center>
                                <button id="edit" class="btn btn-raised btn-primary" onclick="edit()">Edit</button>
                                <button id="save" class="btn btn-raised btn-primary" onclick="save()">Save</button>  
                            </center><br>
                            <form action="edit-poi2.php" method="post" class="form-horizontal" id="form1" enctype="multipart/form-data">
                                <input type="hidden" name="current-lat" id="current-lat" value="<?php echo $row['latitude']; ?>">
                                <input type="hidden" name="current-long" id="current-long" value="<?php echo $row['longitude']; ?>">
                                
                                <input type="hidden" name="latitude" id="latitude"/>
                                <input type="hidden" name="longitude" id="longitude"/>
                                <input type="hidden" name="content" id="content"/>
                                <div class="click2edit">
                                    <?php echo $row['content']; ?>
                                </div>	            
                        </div> 
                    </div>     
                        
                        
                </div>
                        <div class="modal fade" role="dialog" id="document-info">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Short Description</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Please provide a short description of your establishment. This will be displayed on the list of points of interest by area as the description of your listing.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Got it!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="tuklas-header2"><br><br>Short Description <i class="fa fa-question-circle fa-document-info" aria-hidden="true" type="button" data-toggle="modal" data-target="#document-info"></i> <br><br></div> 
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group label-floating">
                                <label for="t1" class="control-label">Floating label</label>
                                <textarea rows=7 id="description" name="description" class="form-control"><?php echo $row['description']; ?></textarea>
                             </div>
                        </div>  
                    </div>
                <div class="row">
                    <div id="links">
                        <div class="tuklas-header2"><br><br>Gallery<br><br></div>                        
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <input type="file" name="gallery[]" multiple accept="image/*">
                                <div class="input-group">
                                    <input form="form1" type="text" readonly="" class="form-control" placeholder="Insert image/s">
                                    <span class="input-group-btn input-group-sm">
                                        <button type="button" class="btn btn-fab btn-fab-mini" style="color: white; background-color:#009688">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                </div>
                            </div><br><br>
                        </div>
                        <div class="container">
                            <?php if(!empty($_SESSION['error'])){ ?>
                                
                            
                                    <?php if($_SESSION['error'] == 'error'){
                                            $error = "Sorry, there was an error in uploading your file.";
                                     } else if($_SESSION['error'] == 'extension'){ 
                                            $error = "Sorry, you have uploaded a wrong file extension.";
                                     } else if($_SESSION['error'] == 'exists'){
                                            $error = "Sorry, this file already exists.";
                                     } else if($_SESSION['error'] == 'not'){
                                            $error = "Sorry, your file was not uploaded";
                                     } 
                                        unset($_SESSION['error']); ?>
                                    
                                    <span style="color:#f44336;"><?php echo $error; ?></span>
                            
    
                            <?php } ?>
                            <?php if($gallery !== "empty"){ ?>
                                <?php for($x=0;$x<count($gallery);$x++){ ?>
                                    <div class="modal fade" role="dialog" id="caption<?php echo $x; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Caption</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <textarea name="text-caption[]" class="form-control" rows="5" id="textArea"><?php echo $caption[$x]; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" value="<?php echo $gallery[$x]; ?>" name="img-caption[]">
                                                    <input type="submit" value="Save Caption - <?php echo $x; ?>" name="submit" class="btn btn-primary"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                
                                <?php if($x%3 == 0){ ?>
                                    <div class="row">
                                <?php }  ?>
                                    <div class="col-md-4" style="margin-top:20px;">
                                        <div class="hovereffect" style=" background-color:black;">
                                            <center><img  class="img-responsive" style="height:200px; width:auto;" src="gallery/<?php echo $_SESSION['username']; ?>/<?php echo $gallery[$x]; ?>"></center>
                                            <div class="overlay">
                                            
                                                <a class="btn btn-fab btn-primary tuklas-gridview2" type="button" data-toggle="modal" data-target="#caption<?php echo $x; ?>"><center><i class="fa fa-pencil-square-o" style="margin-top:16px"></i></center></a>    
                                                
                                                <a title="<?php echo $caption[$x]; ?>" data-gallery="" href="gallery/<?php echo $row['username']; ?>/<?php echo $gallery[$x] ?>" class="btn btn-fab btn-primary tuklas-gridview2"><center><i class="fa fa-eye" style="margin-top:16px"></i></center></a>
                                                
                                                
                                                <a class="btn btn-fab btn-primary tuklas-gridview2" href="delete-gallery.php?user=<?php echo $_SESSION['username']; ?>&img=<?php echo $gallery[$x]; ?>"><center><i class="fa fa-trash-o" style="margin-top:16px"></i></center></a>
                                                
                                            </div>
                                        
                                            <?php if($x%3 == 2 || $x == (count($gallery)-1)){ ?>
                                        </div>  <!-- end row -->
                                    <?php }  ?>
                                    </div>
                                    </div>
                            
                                <?php } ?>
                            <?php } ?>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="padding:0px">
                        <div class="tuklas-header2">
                            <br><br><br><br>
                            Establishment Location 
                        </div><br>
                        <div id="myMap" style="border-top: 2px solid #009688; border-bottom: 2px solid #009688">
                        </div>
                        <div class="tuklas-header2">
                            <br> Drag the marker to the exact location of the establishment.
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <center> <input class="btn btn-raised btn-primary" type="button" data-toggle="modal" data-target="#save-changes" value="Save Changes"></center>
                </div>

                <div class="modal fade" role="dialog" id="save-changes">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Are you sure you want to save changes?</h4>
                            </div>
                            <div class="modal-body">
                                You can change them back whenever you feel like it.
                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-primary" name="submit" type="submit" value="save">
                                <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- #content -->
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


<style>
#myMap {
    width:100%;
    min-height: 350px;  
}
</style>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ_mVAhURUv7C-jrsWPkAHp9iqaAeFnGs&libraries=places"></script>


<script type="text/javascript"> 
    var latitude = document.getElementById('current-lat').value;
    var longitude = document.getElementById('current-long').value;
    
    var map;
    var marker;
    var myLatlng = new google.maps.LatLng(latitude,longitude);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    function initialize(){
        var mapOptions = {
            zoom: 18,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

        marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true 
        });     

        geocoder.geocode({'latLng': myLatlng }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('#address').val(results[0].formatted_address);
                    $('#latitude').val(marker.getPosition().lat());
                    $('#longitude').val(marker.getPosition().lng());
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            }
        });


        google.maps.event.addListener(marker, 'dragend', function() {

        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('#address').val(results[0].formatted_address);
                    $('#latitude').val(marker.getPosition().lat());
                    $('#longitude').val(marker.getPosition().lng());
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            }
        });
    });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>  