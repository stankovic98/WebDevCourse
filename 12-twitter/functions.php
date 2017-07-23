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

    function time_since($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'min'),
            array(1 , 's')
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}";
        return $print;
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
                $userQuery = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($link, $row['userid']) ." LIMIT 1";
                $userQueryResult = mysqli_query($link, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);

                echo "<div class='tweet'><p>". $user['email']." <span class='time'>". time_since(time() - strtotime($row['datetime'])) ." ago</span></p>";

               echo "<p>".$row['tweet']."</p>";

               echo "<p><a href='' class='toggleFollow' data-userId='". $row['userid']. "'>Follow</a></p></div>";
            }
        }
    }

    function displaySearch() {
        echo '<div class="form-inline">
                <input type="text" class="form-control col-md-7 inputs" id="search" placeholder="Search">

                <button  class="btn btn-primary">Search tweets</button>
            </div>';
    }
    
    function displayTweetBox() {

        if($_SESSION['id'] > 0) {
            echo '<div class="form-inline" id="tweetbox">
                    <textarea class="form-control" id="tweetContent"> </textarea>

                    <button  class="btn btn-primary">Post tweet</button>
                </div>';
        }
    }
?>