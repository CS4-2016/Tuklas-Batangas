<?php
    session_start();
    require_once("dbconn.php");
    $db = new db();
	$db -> Connect();
    
    if(empty($_POST['check'])){
        header("Location:members-pending.php");
    }
    
    $users = implode("','", $_POST['check']);

    $SQL = "SELECT `email` FROM `users` WHERE `username` IN ('$users')";
    $db->Query($SQL);

    if($db->result){
        while($row = $db->result->fetch_assoc()){
            $emails[] = $row;
        } 
    }    
    
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'jaeangelob@gmail.com';          // SMTP username
    $mail->Password = '09155012465'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to
    $mail->Subject = 'Tuklas Batangas Account Registration Result';
    $mail->setFrom('tuklas.batangas2017@gmail.com', 'Tuklas Batangas');
    $mail->addReplyTo('tuklas.batangas2017@gmail.com', 'Tuklas Batangas');

    $action = $_POST['action'];
    if($action == 'approve'){
        $SQL = "UPDATE `users` SET `status` = 'approved' WHERE `username` IN ('$users')";
        $db->Query($SQL);

        if($db->result){
            for($x=0;$x<count($emails);$x++){
                $mail->addAddress($emails[$x]['email']);   // Add a recipient

                $mail->isHTML(true);  // Set email format to HTML

                $bodyContent  = '
                    <html xmlns="http://www.w3.org/1999/xhtml">
                      <body style="background-color:#009688;">
                        <table class="mui-body" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td  style="padding:50px;" class="mui-panel">
                              <center>
                                <div style="text-align:center;" class="mui-container">     
                    <div class="mui-divider-bottom">
                    <img style="width:300px" src="http://i.imgur.com/YE5Q5fO.png" title="source: imgur.com">
                    <div class="mui-divider-bottom"></div>        
                                  <p style="padding:20px; text-align:left; font-family: cursive; color:white;">
                                  <br><br>
                                  <center>Good Day! Your account in Tuklas Batangas has been approved you may now login using your acount. </center></p>
                          <p style="padding:20px; text-align:left; font-family:  cursive;  color:white;"><center>
                                  Thank you :)</center></p>
                                    
                                  <br><br>
                                  
                                  </div>

                                </div>
                              </center>
                            </td>
                          </tr>
                        </table>
                      </body>
                    </html>';

                $mail->Body    = $bodyContent;

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else{
                    unset($bodyContent);
                }    
            }
            
            $db->Close();
            unset($db);
            header("Location: members-pending.php");
        }
    } else if($action == 'delete'){
        $SQL = "DELETE FROM `users` WHERE `username` IN ('$users')";
        
        $db->Query($SQL);
        
        if($db->result){
            for($x=0;$x<count($emails);$x++){
                $mail->addAddress($emails[$x]['email']);   // Add a recipient

                $mail->isHTML(true);  // Set email format to HTML

                $bodyContent  = '
                    <html xmlns="http://www.w3.org/1999/xhtml">
                      <body style="background-color:#009688;">
                        <table class="mui-body" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td  style="padding:50px;" class="mui-panel">
                              <center>
                                <div style="text-align:center;" class="mui-container">     
                    <div class="mui-divider-bottom">
                    <img style="width:300px" src="http://i.imgur.com/YE5Q5fO.png" title="source: imgur.com">
                    <div class="mui-divider-bottom"></div>        
                                  <p style="padding:20px; text-align:left; font-family: cursive; color:white;">
                                  <br><br>
                                  <center>Good day! We regret to inform you that your account has been denied access upon decision of the Local Tourism Officers.</center></p>
                          <p style="padding:20px; text-align:left; font-family:  cursive;  color:white;"><center>If you still wish to be a part of Tuklas Batangas you may register again a new account.</center></p>

                                  <br><br>
                                  </div>

                                </div>
                              </center>
                            </td>
                          </tr>
                        </table>
                      </body>
                    </html>';

                $mail->Body    = $bodyContent;

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else{
                    unset($bodyContent);
                }    
            }
            
            $db->Close();
            unset($db);
            header("Location: members-pending.php");
        }
    }
?>