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
        if( $error != "") {
            echo $error;
            exit();
        }
        if($_POST["loginActive"] == "0") {

            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST["email"]). "'";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) > 0) {
                $error = "That email address is already taken!";
            }
            echo $error;
        }
    }

?>