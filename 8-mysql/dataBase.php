<?php 
    var_dump($_POST);
    $newPts = $_POST["bodovi"];
    $newUser = $_POST["name"];
    

    $file =  file_get_contents('highscore.txt');
    $table = explode(",", $file);
    
    for($i = 0; $i < sizeof($table); $i++) {
        $players = explode("|", $table[$i]);
            
        if($newPts >=  $players[1]) {
            $insert = $newUser. "|".$newPts;
            array_splice($table, $i, 0, $insert);
           
            break;
        } 
        
    }

    $data = saveFile($table);
    storeData($data);
    

    $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "highscore-32316d4b", "4jcFni9RSQMw","highscore-32316d4b");

        if(mysqli_connect_error()) {
            die ("Database Connection Error");
        }

    $query = "SELECT * FROM highscore";
    $row = mysqli_fetch_array(mysqli_query($link, $query));

    var_dump($row[1]);




    function saveFile($arr) {
        $newFile = "";
        for($i = 0; $i < 3; $i++) {
            if($i+1 == 3) {
                 $newFile .= $arr[$i];
                 break;
            }
            $newFile .= $arr[$i]. ",";
        }
        return $newFile;
    }

    function storeData($str) {
        
        file_put_contents("highscore.txt", $str);
    }
   
?>