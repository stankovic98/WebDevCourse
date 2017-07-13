<?php

    session_start();

    //$diaryContent = "";
    if(array_key_exists("id", $_COOKIE)) {
        $_SESSION["id"] = $_COOKIE["id"];
    }

    if(array_key_exists("id", $_SESSION)) {
        echo "<p>Logged In! <a class='btn btn-success' href='index.php?logout=1'>Log me out</a></p>";

        include ("connection.php");
        
        $query = "SELECT diary FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
        $row = mysqli_fetch_array(mysqli_query($link, $query));
 
        $diaryContent = $row['diary'];
      
    } else {
        header("Location: index.php");
    }
    include ("header.php");
?>

<div class="container-fluid">

    <textarea id="diary"><?php echo $diaryContent; ?></textarea>

    <button id="button" class="btn btn-success">Spremi</button>


</div>


<?php
    include ("footer.php");
?>