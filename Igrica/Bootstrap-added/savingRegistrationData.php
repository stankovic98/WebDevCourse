<?php
    session_start();

    if(($_POST["email"] !=  "") && ($_POST["nickname"] != "" || $_POST["registration"] == "false") && ($_POST["password"] != "")) {

        if ($_POST["registration"]) {
            $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "usersForGame-323192f9", "a0P2zymR39rU","usersForGame-323192f9");

            if(mysqli_connect_error()) {
                die ("Database Connection Error");
            }

            $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) > 0) {
                $arr = array('message' => 'Email is already taken');
                echo json_encode($arr);
            } else {

                $query = "INSERT INTO users (email, nickname, password) VALUES ('".$_POST["email"]."', '".$_POST["nickname"]."', '".$_POST["password"]."')";

                mysqli_query($link, $query);
              
                $_SESSION['email'] = $_POST['email'];

                $arr = array('message' => '', 'location' => 'igrica.php');
                echo json_encode($arr);

                #header("Location: igrica.php");
            }
        } else {
            $query = "SELECT nickname FROM users WHERE email ='". $_POST['email']. "' AND password = '". $_POST['password']. "'";

            if( mysqli_query($link, $query)) {
                 $_SESSION['email'] = $_POST['email'];
                 $arr = array('message' => '', 'location' => 'igrica.php');
                 echo json_encode($arr);
            } else {
                $arr = array('message' => 'That email/password do not exist');
                echo json_encode($arr);
            }
        }

    } else {
        $arr = array('message' => 'You have to enter all information!');
        echo json_encode($arr);
    }

?>