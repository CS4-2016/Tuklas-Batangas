<?php
    session_start();
    require_once("dbconn.php");
    $db = new db();
	$db -> Connect();

    if(empty($_SESSION['free-username']) ||
       empty($_SESSION['accounttype']) ||
       empty($_SESSION['password']) ||
       empty($_SESSION['owner']) ||
       empty($_SESSION['contactown']) ||
       empty($_SESSION['emailown']) ||
       empty($_POST['establishment']) ||
       empty($_POST['city']) ||
       empty($_POST['address']) ||
       empty($_POST['emailpoi']) ||
       empty($_POST['contactpoi'])){
        header("Location: register-step3.php");
    }

    if ($_FILES['document']['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error " . $_FILES['document']['error']);
    }
    $target_dir = "documents/";
    $document = $_SESSION['free-username'] . "-" . basename($_FILES["document"]["name"]);
    $target_file = $target_dir . $document;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    if($imageFileType == 'jpeg' ||$imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'gif' || $imageFileType == 'pdf'){} else{
        $uploadOk = 0;
        echo "Sorry, you uploaded a wrong file extension (".$imageFileType.").";
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["document"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["document"]["name"]). " has been uploaded.";
            
            $username = $_SESSION['free-username'];
            $type = $_SESSION['type'];
            $password = $_SESSION['password'];
            $emailown = $_SESSION['emailown'];
            $contactown = $_SESSION['contactown'];
            $owner = $_SESSION['owner'];
            $establishment = $db->Escape($_POST['establishment']);
            $city = $db->Escape($_POST['city']);
            $address = $db->Escape($_POST['address']);
            $emailpoi = $db->Escape($_POST['emailpoi']);
            $contactpoi = $db->Escape($_POST['contactpoi']);
            
            if ($db->Escape($_POST['city']) == "lipa") {
                $latitude = "13.941876";
                $longitude ="121.164420";
            } else if ($db->Escape($_POST['city']) == "malvar") {
                $latitude = "14.048032016333252";
                $longitude ="121.15709797646582";
            } else if ($db->Escape($_POST['city']) == "tanauan") {
                $latitude = "14.083709907345";
                $longitude ="121.1489439410617";
            } else if ($db->Escape($_POST['city']) == "stotomas") {
                $latitude = "14.089849565726764";
                $longitude ="121.17462877458831";
            } else if ($db->Escape($_POST['city']) == "mataasnakahoy") {
                $latitude = "13.979912183997522";
                $longitude ="121.09512821938574";
            } else if ($db->Escape($_POST['city']) == "talisay") {
                $latitude = "14.093033798098988";
                $longitude ="121.02157119936248";
            } else if ($db->Escape($_POST['city']) == "balete") {
                $latitude = "14.009644229714441";
                $longitude ="121.10800282265723";
            } else if ($db->Escape($_POST['city']) == "laurel") {
                $latitude = "14.05007196823586";
                $longitude ="120.93363777901709";
            }
            
            $_SESSION['new-account'] = 1;

            $SQL = "INSERT INTO `users`(`username`, `password`, `email`,`contact`,`type`,`status`) VALUES ('$username','$password','$emailown','$contactown','poi','pending')";
            
            $db->Query($SQL);
            
            $SQL2 = "INSERT INTO `poi`(`username`,`owner`,`establishment`,`city`,`address`,`latitude`,`longitude`,`document`,`email`,`contact`) VALUES ('$username','$owner','$establishment','$city','$address','$latitude','$longitude','$document','$emailpoi','$contactpoi')";
            
            $db->Query($SQL2);
            
            mkdir("gallery/$username");
            
            $SQL3 = "INSERT INTO `pagerank`(`username`,`visits`) VALUES ('$username', '0')";
            
            $db->Query($SQL3);
            
            $db->Close();
            unset($db);
            
            header("Location: login-authentication.php");    
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }    
?>