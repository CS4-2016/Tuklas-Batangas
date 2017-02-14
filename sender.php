<?php

session_start();
if(isset($_POST['submit']) && !empty($_POST['submit'])){
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        //your site secret key
        $secretKey = '6LdqzhMUAAAAAMU3cQ_7OtYlwXSMnV9fwVthlYgM';
        //get verify response data
        $verifydata = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
        $response= json_decode($verifydata);
        if($response->success){
    $to = "jaeangelob@gmail.com";
    $subject = "My Contact Message";
    $bodyContent = '    First Name: ';
    $bodyContent .= $_POST["fname"];
    $bodyContent .= '   Last Name:  ';
    $bodyContent .= $_POST["lname"];
    $bodyContent .= '   Email:  ';
    $bodyContent .= $_POST["email"];
    $bodyContent .= '   Phone Number:   ';
    $bodyContent .= $_POST["phone"];
    $bodyContent .= '   Message ';
    $bodyContent .= $_POST["message"];
    $bodyContent .= '';
    $headers = "From: jaeangelob@gmail.com" . "\r\n" ."CC: jaeangelob@gmail.com";
    mail($to,$subject,$bodyContent,$headers);
     header("Location: index.php");
}
        else{
            $error = 'Robot verification failed, please try again.';
		}
	}
    else{
        $error = 'Please select Google reCAPTCHA.';
    }
}
else{
    $error = '';
    $success = '';
}

?>


