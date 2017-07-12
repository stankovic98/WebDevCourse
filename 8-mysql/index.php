<?php

    session_start();

    $error = "";

    if(array_key_exists("logout", $_GET)) {
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);

        $_COOKIE["id"] = "";
    } else if(array_key_exists("id", $_SESSION) OR array_key_exists("id", $_COOKIE)){
        header("loggedinpage.php");
    }

    if(array_key_exists("submit", $_POST)) {

        $link = mysqli_connect("shareddb1d.hosting.stackcp.net", "projektDatabase-32317de9", "WbdxG4tRs9AB","projektDatabase-32317de9");

        if(mysqli_connect_error()) {
            die ("Database Connection Error");
        }


        
        if(!$_POST["email"]) {
            $error .= "An email address is required<br>";
        }
        if(!$_POST["password"]) {
            $error .= "An password address is required<br>";
        }
        if($error != "") {
            $error = "<p>There were errors in your form: </p>".$error;
        } else {
          
            if($_POST["signUp"] == "1")  {
        
                $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                } else {

                    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
        
                    if (!mysqli_query($link, $query)) {
                        $error = "Could not sing you up";
                    } else {
                        $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST["password"]) ."' WHERE id = ".mysqli_insert_id($link);

                        mysqli_query($link, $query);
                        
                        $_SESSION["id"] = mysqli_insert_id($link);

                        if($_POST["stayLoggedIn"] == "1") {
                            setcookie("id", mysqli_insert_id($link), time() + 60*60*24*356);
                        }
                        header("Location: loggedinpage.php");
                    }

                    
                }
            } else {
                $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

                $result = mysqli_query($link, $query);

                $row = mysqli_fetch_array($result);

                if(isset($row)) {
                    $hashedPassword = md5(md5($row['id']).$_POST['password']);

                    if($hashedPassword == $row["password"]) {
                        $_SESSION["id"] = $row["id"];
                         if($_POST["stayLoggedIn"] == "1") {
                            setcookie("id", $row["id"], time() + 60*60*24*356);
                        }
                        header("Location: loggedinpage.php");
                    }
                } else {
                    $error = "That email/password combination could not be found.";
                }
            }
        }
    }

?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style>

        .container {
            text-align: center;
            width: 400px;
        }

    </style>
  </head>
  <body>

    <div class="container">
        <h1>Secret Diary</h1>

        <div id="error">
            <?php echo $error; ?>
        </div>
        <form method="post">
            <div class="form-group">
                <input type="email" class="form-control"name="email" placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"name="password" placeholder="Password">
            </div>
            <div class="form-group">
                Stay logged in:
                <input type="checkbox" name="stayLoggedIn" value=1 >
            </div>
            <div class="form-group">
                <input type="hidden" name="signUp" value="1">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success"name="submit" value="Sign Up!">
            </div>
        </form>

        <form method="post">
            
            <div class="form-group">
                <input type="email" class="form-control"name="email" placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"name="password" placeholder="Password">
            </div>
            <div class="checkbox">
                <lable>Stay logged in:</lable>
                <input type="checkbox" name="stayLoggedIn" value=1 >
            </div>
            <div class="form-group">
                <input type="hidden" name="signUp" value="0">
                <input type="submit" class="btn btn-success"name="submit" value="Log In">
            </div>
        </form>
    </div>
    

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>