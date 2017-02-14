<?php
    session_start();
    require_once("dbconn.php");
    
    $db = new db();
    $db->Connect();
    
    $submit = $_POST['submit'];
    $username = $_SESSION['username'];
    $description = $_POST['description'];
    $poiId = $_POST['id'];

    $SQL = "SELECT `gallery`,`caption-gallery` from `poi` WHERE `username` = '$username'";
    $db->Query($SQL);

    if($db->result)
        $row[] = $db->result->fetch_assoc();

    $gallery = $row[0]['gallery'];
    $caption = $row[0]['caption-gallery'];
    

    if($submit == 'save'){
        
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        
        if(!empty($_FILES['gallery']['name'][0])){            
            $target_dir = "gallery/$username/";                                

            for($x=0;$x<count($_FILES['gallery']['name']);$x++){
                $target_file = $target_dir . $_FILES["gallery"]["name"][$x];
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

                if($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'gif' || $imageFileType == 'jpeg'){} else{
                    $uploadOk = 0;
                    $_SESSION['error'] = "extension";
                    echo "Sorry, you uploaded a wrong file extension (".$imageFileType.").";
                }
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    $_SESSION['error'] = "exists";
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $_SESSION['error'] = "not";
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["gallery"]["tmp_name"][$x], $target_file)) {
                        echo "The file ". basename( $_FILES["gallery"]["name"][$x]). " has been uploaded.";

                    if(empty($gallery)){
                        $gallery = $_FILES["gallery"]["name"][$x];    
                        $caption = "";
                    }
                    else{
                        $gallery .= ",".$_FILES["gallery"]["name"][$x];    
                        $caption .= ",";
                    }
                } else {
                    $_SESSION['error'] = "error";
                    echo "Sorry, there was an error uploading your file.";
                }
            }    
            }
        }

        if($_POST['content'] !== ""){
            $content = $_POST['content'];
            $SQL="UPDATE `poi` SET `latitude` = '$latitude', `longitude` = '$longitude', `content` = '$content',`description` = '$description',`gallery` = '$gallery',`caption-gallery` = '$caption' WHERE `username` = '$username'";   
        } else{
             $description = $_POST['description'];
            $SQL="UPDATE `poi` SET `latitude` = '$latitude', `longitude` = '$longitude', `description` = '$description', `gallery` = '$gallery', `caption-gallery` = '$caption' WHERE `username` = '$username'";   
        }

        $db->Query($SQL);
        header("Location: edit-poi.php?x=$poiId");
    }
    
    else if(substr($submit,0,12) == 'Save Caption'){
        $number = substr($submit,15,16);
        
        $SQL = "SELECT `gallery`,`caption-gallery` FROM `poi` WHERE `username` = '$username'";
    
        $db->Query($SQL);
    
        if($db->result){
            $row[] = $db->result->fetch_assoc();
        }
            
        $img = $_POST['img-caption'];
        $inputcaption = $_POST['text-caption'];
    
        $gallery = explode(",", $row[0]['gallery']);
        $caption = explode(",", $row[0]['caption-gallery']);
    
        $caption[$number] = $inputcaption[$number];
        $new_caption = implode(",", $caption);
        
        $SQL = "UPDATE `poi` SET `caption-gallery` = '$new_caption' WHERE `username` = '$username'";
        
        $db->Query($SQL);
        header("Location: edit-poi.php?x=$poiId");
    }
    
?>