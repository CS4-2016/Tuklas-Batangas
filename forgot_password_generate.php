<?php
// Initialize variables to null.
$email =""; //Sender's email ID
$Error ="";
$successMessage ="";


  $db = new db();
	$db -> Connect(); 
//On submitting form below function will execute
if(isset($_POST['submit']))
 {	
	if (!($_POST["email"]=="")){	
		$email =$_POST["email"];//calling function to remove special characters from email
		// check if e-mail address syntax is valid or not
		$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {	  
			// generating password
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
			$password = substr( str_shuffle( $chars ), 0, 5 );
			$password1= sha1($password);
				 	
			


$SQL = "UPDATE `users` SET `password`='$password1' WHERE `email`='$email'";
  $db->Query($SQL);
			
	 
			if($db->result){	
				$to = $email;
                $subject = 'Your New Password...';
								
				/* Let's prepare the message for the e-mail */
				$message = 'Hello User

				Your new password : '.$password1.'
				E-mail: '.$email.'
				 
				Now you can login with this email and password.';
					 
				/* Send the message using mail() function */
					if(mail($to, $subject, $message ))
					{
						$successMessage = "New Password has been sent to your mail, Please check your mail and SignIn.";
					}
			} 
		}
		else{
			$Error = "Invalid Email";
		}	
	}
	else{
		$Error = "Email is required";	
	}	
}
 
?>