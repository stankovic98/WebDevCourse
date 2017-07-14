 <?php
    
    $numberOfUsersOnList = 3;

    $highscores = array();
    $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "highscore-32316d4b", "4jcFni9RSQMw","highscore-32316d4b");

    if(mysqli_connect_error()) {
        die ("Database Connection Error");
    }

    $query = "SELECT * FROM highscore ORDER BY score DESC LIMIT ".$numberOfUsersOnList; 
   
    $result = mysqli_query($link, $query);

    for($i = 0; $i < mysqli_num_rows($result); $i++) {
       $highscores[$i] = mysqli_fetch_array($result);
    }

    $scoreLimit = $highscores[$numberOfUsersOnList]["score"];

    $query = "DELETE FROM highscore WHERE score < ".$scoreLimit;

    mysqli_query($link, $query);

    echo(json_encode($highscores));


?>