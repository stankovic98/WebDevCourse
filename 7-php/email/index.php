<?php
	$error = "";
	$success ="";
	if($_POST) {
		
		if(!$_POST["email"]) {
			$error .= "An email address is required.<br>";
		}
		if(!$_POST["content"]) {
			$error .= "An content address is required.<br>";
		}
		if(!$_POST["subject"]) {
			$error .= "An subject address is required.<br>";
		}

		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		  $error .= "email address is invalid.";
		}
		if($error != "") {
			$error = "<div class='alert alert-danger' role='alert'><strong>Oh snap!</strong> There were error messages:</p>". $error."</div>";
		}else {
			$sendTo = "antoniostankovic@gmail.com";
			$subject = $_POST["subject"];
			$content = $_POST["content"];
			$headers = "From: ". $_POST["email"];
			
			mail($sendTo, $subject, $content, $headers);
			
			$success = '<div class="alert alert-success" role="alert"><strong>Well done!</strong> You successfully read this important alert message.
					</div>';
		}
		
	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <body>
  
	<div id="error"><? echo $error.$success ?></div>
    <div class="container">
		
		<h1>Get in touch!</h1>
		<div class="container">
		<form id="form" method="post">
		  <div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Enter email">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Subject</label>
			<input  id="subject" type="text" name="subject" class="form-control" >
		  </div>
		  <div class="form-group">
			<label for="exampleTextarea">What would you like to ask us?</label>
			<textarea class="form-control" name="content" id="content" rows="3"></textarea>
		  </div>
		   <button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>
	</div>

   
	
	<script type="text/javascript">
		var error = "";
		$("#form").submit(function(e) {
			e.preventDefault();
			
			if( $("#email").val() == "") {
				error += "<p>Email field is requerd.</p>";

			}
			if( $("#subject").val() == "") {
				error += "<p>Subject field is requerd.</p>";

			}
			if( $("#content").val() == "") {
				error += "<p>Content field is requerd.</p>";

			}
			if(error != "") {
				
				$("#error").html("<div class='alert alert-danger' role='alert'><strong>Oh snap!</strong> There were error messages:</p>" + error+"</div>");
				
			} else {
				console.log("heer");
				$("#form").unbind("submit").submit();
			}
		});
		
	</script>
  </body>
</html>