<?php
//CAPTCHA Matching code
session_start();
if ($_SESSION["vercode"] == $_POST["captcha"]) {
        header("Location: register-step3.php");
} else {
   header("Location: register-step2.php");
}
?>