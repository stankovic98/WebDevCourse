<?php 

    session_start();
    $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "usersForGame-323192f9", "a0P2zymR39rU","usersForGame-323192f9");

    if(mysqli_connect_error()) {
        die ("Database Connection Error");
    }

    $query = "SELECT nickname FROM users WHERE email ='".$_SESSION['email']."'";

    echo (mysqli_fetch_array(mysqli_query($link, $query))['nickname']);

?>