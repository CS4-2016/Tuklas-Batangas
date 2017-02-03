<?php 
    session_start();

    $type = $_POST['type'];
    $_SESSION['type'] = $_POST['type'];

    if($type == 'poi'){
        header("Location: register-step2.php");
    } 
    else if ($type == 'lto'){
        header("Location: register-lto-step2.php");    
    }
    else if ($type == ''){
        $_SESSION['type-error'] = 'error';
        header("Location: register.php");    
    }
?>