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

    function displayTweets($type) {

        global $link;

        if($type == 'public') {
            $whereClause = '';
        }

        $query = "SELECT * FROM tweets ". $whereClause ." ORDER BY `datetime` DESC LIMIT 10";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) == 0 ) {
            echo "There are no result";
        } else {
            while($row = mysqli_fetch_assoc($result) ) {
                echo $row["tweet"];
            }
        }
    }
?>