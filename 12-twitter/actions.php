<?php

    include("functions.php");
    if($_GET["action"] == "loginSingUp") {
        $error = "";
        if(!$_POST["email"]) {
            $error .= "You need to enter email";
        }
        if (!$_POST["password"]) {
            $error .= "You need to enter password";
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error .= "Invalid email format"; 
        }
        echo $error;
        if($_POST["loginActive"] == "0") {

        }
    }

?>