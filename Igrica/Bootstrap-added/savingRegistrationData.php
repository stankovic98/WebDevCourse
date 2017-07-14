<?php

    if(($_POST["email"] !=  "") && ($_POST["nickname"] != "") && ($_POST["password"] != "")) {

        if ($_POST["registration"]) {
            $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "usersForGame-323192f9", "a0P2zymR39rU","usersForGame-323192f9");

            if(mysqli_connect_error()) {
                die ("Database Connection Error");
            }

            $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) > 0) {
               echo "Email is already taken!";
            } else {
                 $query = "INSERT INTO users (email, nickname, password) VALUES ('".$_POST["email"]."', '".$_POST["nickname"]."', '".$_POST["password"]."')";

                mysqli_query($link, $query);
            }
        } else {
            #login
        }

    } else {
        echo "You have to enter all information!".$_POST["login"];
    }

?>