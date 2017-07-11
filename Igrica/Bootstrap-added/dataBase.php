<?php 
    var_dump($_POST);
    $newPts = $_POST["bodovi"];
    $newUser = $_POST["name"];
    

    $file =  file_get_contents('highscore.txt');
    $table = explode(",", $file);
    
    for($i = 0; $i < sizeof($table); $i++) {
        $players = explode("|", $table[$i]);
            var_dump($players[1]);
        if($newPts >=  $players[1]) {
            $insert = $newUser. "|".$newPts;
            array_splice($table, $i, 0, $insert);
            var_dump($table);
            break;
        } 
        var_dump($table);
    }

    $data = saveFile($table);
    storeData($data);
    var_dump(saveFile($table));





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