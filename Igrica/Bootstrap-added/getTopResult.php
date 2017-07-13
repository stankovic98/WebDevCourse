 <?php
    
    $newPts = $_POST["bodovi"];
    $newUser = $_POST["name"];

    $highscores = array();
    $sortedHighscores = array();
    $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "highscore-32316d4b", "4jcFni9RSQMw","highscore-32316d4b");

    if(mysqli_connect_error()) {
        die ("Database Connection Error");
    }

    $query = "SELECT * FROM highscore";


    $result = mysqli_query($link, $query); 
   

    for($i = 0; $i < mysqli_num_rows($result); $i++) {
       $highscores[$i] = mysqli_fetch_array($result);
    }
    
    $highscores = bubbleSort($highscores, "score");

    for($i = 0; $i < 3; $i++) {
        $sortedHighscores[$i] = $highscores[$i];
    }


    echo json_encode($sortedHighscores);

    function bubbleSort(array $array, $key) {
        $array_size = count($array);
        for($i = 0; $i < $array_size; $i ++) {
            for($j = 0; $j < $array_size; $j ++) {
                if ($array[$i][$key] > $array[$j][$key]) {
                    $tem = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $tem;
                }
            }
        }
        return $array;
    }


?>