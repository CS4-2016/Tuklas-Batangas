<?php 
    session_start();
    $connect = mysql_connect("localhost", "root","") or die ("mysql_error()");
    $database = mysql_select_db ("regis") or die("mysql_error()");
    
    $ret = mysql_query("SELECT * FROM `users` WHERE (username = '".mysql_real_escape_string($_POST['username'])."') and (password = '".mysql_real_escape_string($_POST['password'])."')") or die("mysql_error()");

    if(mysql_num_rows($ret) == 1){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['dbname'] = "regis";
        
//        if(!empty($_POST["remember-me"])) {
//            setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
//            setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
//        } 
//        
//        else {            
//            if(isset($_COOKIE["member_login"])) {
//				setcookie ("member_login","");
//			}
//			if(isset($_COOKIE["member_password"])) {
//				setcookie ("member_password","");
//			}
//		}
//        
        header("Location: index.php");
    }
    
    else{
        $_SESSION['login-attempt'] = 1;
         header("Location: login.php");
    }
?>

