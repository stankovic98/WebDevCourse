<?php 
$weather ="";
$error = "";
if($_GET["city"]) {

    $_GET["city"] = str_replace(" ", "", $_GET["city"]);
    
    $file_headers = @get_headers("http://www.weather-forecast.com/locations/".$_GET["city"]."/forecasts/latest");
    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        $error = "You entered wrong city.";
    }

    $forecastPage = file_get_contents("http://www.weather-forecast.com/locations/".$_GET["city"]."/forecasts/latest");
    
   $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);

    $secondPageArray = explode('</span></span></span></p>', $pageArray[1]);
    $weather = $secondPageArray[0];
}

?>
<html>

<head>
    <title>Wheater forcast</title>
    <script src="jquery.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
        crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>


</head>

<body>

    <div class="container">

        <h1>Whats The Weather?</h1>
        <form>
            <div class="form-group">
                <label for="city">Enter the name of a city.</label>
                <input type="text" class="form-control" id="city"  name="city" <?php echo $_GET["city"]; ?> placeholder="Eg. London, Tokyo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="weather">

            <?php if($weather) {
                echo '<div class="alert alert-success" role="alert">
                    '.$weather.'
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    '.$error.'
                    </div>';
            }
            ?>

        </div>

    </div>


</body>

</html>