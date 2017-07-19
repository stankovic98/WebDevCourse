<?php

    session_start();

    $link = mysqli_connect("shareddb1c.hosting.stackcp.net", "twitter-3230377d", "jabuka123", "twitter-3230377d");
    if(mysqli_connect_errno()) {
        print_r(mysqli_connect_error);
        exit();
    }

    if($_GET["function"] == "logout") {
        session_unset();
    }
?>