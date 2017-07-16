<?php 

     session_start();
    $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "usersForGame-323192f9", "a0P2zymR39rU","usersForGame-323192f9");

    if(mysqli_connect_error()) {
        die ("Database Connection Error");
    }
    $query = "SELECT score FROM users WHERE email ='".$_SESSION['email']."'";
    $result = mysqli_query($link, $query);
    if($_POST["score"] > $result) {
        $query = "UPDATE users SET score = ".$_POST['score']." WHERE email ='".$_SESSION['email']."'";

        mysqli_query($link, $query);
    }
?>