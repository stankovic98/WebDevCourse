<?php

    if(array_key_exists("email",$_POST) && array_key_exists("nickname",$_POST) && array_key_exists("password",$_POST)) {

        $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "usersForGame-323192f9", "a0P2zymR39rU","usersForGame-323192f9");

        if(mysqli_connect_error()) {
            die ("Database Connection Error");
        }

        $query = "INSERT INTO users (email, nickname, password) VALUES ('".$_POST["email"]."', '".$_POST["nickname"]."', '".$_POST["password"]."')";

        mysqli_query($link, $query);




    } else {
        echo "You have to enter all information!";
    }

?>