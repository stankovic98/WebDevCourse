<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
        crossorigin="anonymous">
    <link rel="stylesheet" href="http://antonio.stankovic.com.stackstaging.com/contents/12-twitter/style.css">
</head>

<body>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">

        <ul class="nav">
            <a class="navbar-brand" href="http://antonio.stankovic.com.stackstaging.com/contents/12-twitter/">Twitter</a>
            <li class="nav-item">
                <a class="nav-link active" href="?page=timeline">Your timeline</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=yourtweets">Your tweets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=publicprofiles">Public Profiles</a>
            </li>
        </ul>
        <div id="loginForma" class="form-inline"><?php if($_SESSION["id"]) { ?>
                  <a class="btn btn-success" href="?function=logout">Logout</a>
        <?php } else { ?>
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"> Login/Sign Up</button>
          <?php } ?>
        </div>
    </nav>