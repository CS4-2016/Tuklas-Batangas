<?php 
    session_start();
    require_once("dbconn.php");
    
    $db = new db();
	$db -> Connect();
    
    $username = $db->Escape($_POST['username']);
    $password = $db->Escape($_POST['password']);

    if(empty($_SESSION['new-account'])){ //ibig sabihin galing sa register pag meron
        $SQL = "SELECT * FROM `users` WHERE BINARY (username = '".$username."') and BINARY(password = '".$password."')";
        $db->Query($SQL);
        
        $rowcount = mysqli_num_rows($db->result);
        
        if($rowcount == 1){            
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['dbname'] = "tuklasbatangas";
            
            if($db->result){
                $account = $db->result->fetch_assoc();
                
                $_SESSION['usertype'] = $account['type'];
                
                header("Location: admin/index.php");
            }
        }else{
            echo $_SESSION['login-attempt'] = 1;
            header("Location: login.php");
        }  
    }else{
        $_SESSION['username'] = $_SESSION['free-username'];
        header("Location: register-success.php");
    }
    
    $db->Close();
    unset($db);
?>

