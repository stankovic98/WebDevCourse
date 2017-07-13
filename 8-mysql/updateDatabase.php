<?php

    session_start();

    if(array_key_exists("content", $_POST)) {
       include ("connection.php");
       var_dump($_POST["content"]);
       $query = "UPDATE `users` SET `diary` = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
       #$query = "UPDATE `users` SET `diary` = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE id = '25'";
       var_dump($_SESSION['id']);
       if(mysqli_query($link, $query)) {
           echo "succes";
       } else {
           echo "fail";
       }
    }

?>