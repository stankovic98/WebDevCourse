<?php 
    var_dump($_POST);
    $newPts = $_POST["bodovi"];
    $newUser = $_POST["name"];

    $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "highscore-32316d4b", "4jcFni9RSQMw","highscore-32316d4b");

        if(mysqli_connect_error()) {
            die ("Database Connection Error");
        }

    $query = "INSERT INTO highscore (name, score) VALUES ('". $newUser."', ".$newPts.")";
    echo $query;
   if(mysqli_query($link, $query)) {
           echo "succes";
       } else {
           echo "fail";
       }
   
?>