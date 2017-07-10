<?php
	$file = file_get_contents("highscore.txt");
	$highscore = explode(",", $file);
	$first = explode("|", $highscore[0]);
	$second = explode("|", $highscore[1]);
	$third = explode("|", $highscore[2]);


	

?>
<html>

<head>

	<title>Game</title>
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

	<div id="pocetna">
		<div class="jumbotron">
			<h1 class="display-3">The Game</h1>
			<p class="lead">Enter your name and start!</p>
			<hr class="my-4">

			<form class="form-inline d-flex justify-content-center">
				<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="name" placeholder="Name">
			</form>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="#" role="button" onclick="main()">Start</a>
			</p>
			<div class="container col-md-5 center-block" id="lista">
				<ul class="list-group  ">
					<li class="list-group-item justify-content-between" id="num1">
						<?php echo $first[0]; ?>
						<span class="badge badge-default badge-pill" id="num1-bodovi"><?php echo $first[1]; ?></span>
					</li>
					<li class="list-group-item justify-content-between" id="num2">
						<?php echo $second[0]; ?>
						<span class="badge badge-default badge-pill" id="num2-bodovi"><?php echo $second[1]; ?></span>
					</li>
					<li class="list-group-item justify-content-between" id="num3">
						<?php echo $third[0]; ?>
						<span class="badge badge-default badge-pill" id="num3-bodovi"><?php echo $third[1]; ?></span>
					</li>
				</ul>
			</div>
		</div>
		<div class="modal fade" id="mymodal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Alert!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<p>Plese enter your name.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="cancle">Cancle</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="igra">
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">


			<button type="button" class="btn btn-primary nav-item" id="playerName">Name</button>

			<div class="progress nav-item">
				<div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
			</div>

			<button type="button" class="btn btn-primary nav-item">Bodovi: <span id="bodovi"></span></button>


		</nav>


		<div id="room" class="w-75 h-75">


		</div>
	</div>


	<div id="kraj">

		<div class="modal fade" id="modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Game Over!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<p>Your score: </p>
						<button type="button" class="btn btn-success" id="score"></button>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="restart">Restart</button>
					</div>
				</div>
			</div>
		</div>



	</div>




</body>

</html>