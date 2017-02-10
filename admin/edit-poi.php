<?php
    session_start(); 
    require_once("header.php");
    
    $db = new db();
    $db->Connect();
    
    $poi = $_GET['x'];
    $SQL = "SELECT * FROM `poi` WHERE `id` = '$poi'";
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
<style>
.tuklas-header2{
    color:#009688;
    font-family: 'Rancho', cursive;
    font-size: 25px;    
}
</style>

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit <?php echo $row['establishment']; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        <div class="poi-content">
            <form action="edit-poi2.php" method="post" class="form-horizontal" id="form1" enctype="multipart/form-data">
                
            <input type="hidden" name="id" value="<?php echo $poi; ?>">    
            <input type="hidden" name="current-lat" id="current-lat" value="<?php echo $row['latitude']; ?>">
            <input type="hidden" name="current-long" id="current-long" value="<?php echo $row['longitude']; ?>">

            <input type="hidden" name="latitude" id="latitude"/>
            <input type="hidden" name="longitude" id="longitude"/>
            <input type="hidden" name="content" id="content"/>
            
            <div class="tuklas-header2">
                Content 
            </div>    
            <br>
            
            <div class="summernote">
                <?php echo $row['content']; ?>
            </div>
            <br><br>
            <div class="tuklas-header2">
                Short Description <i class="fa fa-sm fa-question-circle fa-document-info" aria-hidden="true" type="button" data-toggle="modal" data-target="#document-info"></i> 
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea name="description" class="form-control" rows="5" id="textArea"><?php echo $row['description']; ?></textarea>
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
                                <button type="button" data-dismiss="modal" class="btn btn-raised btn-primary modal-dismiss">Got it!</button>                                </div>
                        </div>
                    </div>
                </div>
                
            <br><br>
            <div class="tuklas-header2">
                Gallery
            </div>
            <div class="row">
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
                    </div>
                </div>   
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
                                                    <input type="submit" value="Save Caption - <?php echo $x; ?>" name="submit" class="btn btn-raised btn-primary"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                
                                <?php if($x%3 == 0){ ?>
                                    <div class="row">
                                <?php }  ?>
                                    <div class="col-md-4" style="margin-top:20px;">
                                        <div class="hovereffect" style=" background-color:black;">
                                            <center><img  class="img-responsive" style="height:200px; width:auto;" src="../gallery/<?php echo $_SESSION['username']; ?>/<?php echo $gallery[$x]; ?>"></center>
                                            <div class="overlay">
                                            
                                                <a class="btn btn-fab btn-primary tuklas-gridview2" type="button" data-toggle="modal" data-target="#caption<?php echo $x; ?>" style="margin-top:70px"><center><i class="fa fa-pencil-square-o" style="margin-top:16px"></i></center></a>    
                                                
                                                <a title="<?php echo $caption[$x]; ?>" data-gallery="" href="../gallery/<?php echo $row['username']; ?>/<?php echo $gallery[$x]; ?>" class="btn btn-fab btn-primary tuklas-gridview2" style="margin-top:70px"><center><i class="fa fa-eye" style="margin-top:16px"></i></center></a>
                                                
                                                
                                                <a class="btn btn-fab btn-primary tuklas-gridview2" href="delete-gallery.php?user=<?php echo $_SESSION['username']; ?>&img=<?php echo $gallery[$x]; ?>" style="margin-top:70px"><center><i class="fa fa-trash-o" style="margin-top:16px"></i></center></a>
                                                
                                            </div>
                                        
                                            <?php if($x%3 == 2 || $x == (count($gallery)-1)){ ?>
                                        </div>  <!-- end row -->
                                    <?php }  ?>
                                    </div>
                                    </div>
                            
                                <?php } ?>
                            <?php } ?>
                            
                            
                        </div>
            <br><br><br><br>
                
            <div class="tuklas-header2">
                Establishment Location
            </div>
            <br>
            <div id="myMap" style="border: 2px solid #009688;">
            </div>
        </div>
        <br><br>
        <center> <input class="btn btn-raised btn-primary" type="button" data-toggle="modal" data-target="#save-changes" value="Save Changes"></center>
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
                                <input class="btn btn-raised btn-primary" name="submit" type="submit" value="save">
                                <button type="button" data-dismiss="modal" class="btn btn-raised btn-primary modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
        
        
<?php
    require_once("footer.php");
?>
        
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
    