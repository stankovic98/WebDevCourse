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
            } else {

                $query = "INSERT INTO users (email, password) VALUES ('". mysqli_real_escape_string($link, $_POST["email"])."', '". md5(mysqli_real_escape_string($link, $_POST["password"])). "') ";

                if(mysqli_query($link, $query)) {
                    echo "1";
                } else {
                    $error = "Couldn't create user, please try again later";
                }
            }

        } else {
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST["email"]). "'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);

            if( $row["password"] == md5(mysqli_real_escape_string($link, $_POST["password"])) ) {
                echo "1";
            } else {
                $error = "You entered wrong password";
            }

        }

         if( $error != "") {
            echo $error;
            exit();
        }
    }

?>