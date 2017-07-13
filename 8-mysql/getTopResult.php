 <?php
 
    $highscores = array();
    $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "highscore-32316d4b", "4jcFni9RSQMw","highscore-32316d4b");

    if(mysqli_connect_error()) {
        die ("Database Connection Error");
    }

    $query = "SELECT * FROM highscore";

    $result = mysqli_query($link, $query); 
    
    for($i = 0; $i < 3; $i++) {
       $highscores[$i] = mysqli_fetch_assoc($result);
    }
    

    echo json_encode($highscores);

?>