<?php 

session_start();

include 'includes/connection.php';



 $errors_array = array();

if(isset($_POST['submit'])){

	$nick_name = $_POST['name'];
	$password = md5($_POST['password']);

	$query = mysqli_query($conn, "SELECT * FROM `users` WHERE nick_name ='$nick_name'");
	$user = mysqli_fetch_array($query);
	$userId = $user['id'];

	if(mysqli_num_rows($query) > 0 ){

		array_push($errors_array, "Nickname Already Taken");
	}

	else{

		$addUser = mysqli_query($conn, "INSERT INTO users VALUES('', '$nick_name', '$password', CURRENT_TIMESTAMP)");
		header("Location: login.php?alert=done");

	}

	
}

 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1">
 	<title>Ams Notes App</title>
 	<link rel="stylesheet" href="style.css">
 </head>
 <body>
 <nav>
 	<div>
 	<h2 class="big-hero-text"><span>Your</span> Notes App</h2>
 	</div>
 </nav>

 <h2 class="h2-header">Get started quickly</h2>
 		
 		<?php if(in_array("Nickname Already Taken", $errors_array)){
 			 echo "<h4>Nickname Already Taken</h4>";
 		}
 		 ?>
 	
 		<div class="form header">
 		<form action="register.php" method="POST">
 		<h2 class="label">Nick-Name</h2>
 		<input type="text" name="name" required>
 		<br><br>
 			<h2 class="label">Password</h2>
 		<input class="hard-head" type="password" name="password" required>
 		<br>
 		<input id="button" type="submit" name="submit" value="Let's do it">
 		</form>

 		<a class="link" href="login.php">Have an account already? click here</a>
 	</div>
 		
 



 </body>
 </html>