<?php 

 include 'includes/connection.php';

 session_start();


 $error_array = array();
 if(isset($_POST['login_button'])){

 	$nick_name = $_POST['name'];
 	$password = md5($_POST['password']);

 	$query = mysqli_query($conn, "SELECT * FROM `users` WHERE nick_name ='$nick_name' AND password='$password'");
 	$user = mysqli_fetch_array($query);
 	$userId = $user['id'];

 	if(mysqli_num_rows($query) > 0 ){
 		$_SESSION['nick_name'] = $nick_name;
 		$_SESSION['id'] = $userId;

 		header("Location: notes.php");
 	}

 	else{
 		array_push($error_array, "Nick-name or password incorrect");
 	}
 }




 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Ams Notes App</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1">
 	<link rel="stylesheet" href="style.css">
 </head>
 <body>
 <nav>
 	<div>
 	<h2 class="big-hero-text"><span>Ams</span> Notes App</h2>
 	</div>
 </nav>

 <h2 class="h2-header">Login to Continue</h2>


 <?php 

if(isset($_GET['alert'])){
if($_GET['alert'] == 'done'){
	echo "<p id='alert'>You're all done you can go ahead and login</p>";
	echo "<script>

	setTimeout(function(){ 
		document.getElementById('alert').style.visibility = 'hidden';
	}, 9000);
	
	</script>";
}
}
	 ?>

 		
 		<?php if(in_array("Nick-name or password incorrect", $error_array)){
 			 echo "<h4>Nick-name or password incorrect</h4>";
 		}
 		 ?>
 	
 		<div class="form header">
 		<form action="login.php" method="POST">
 		<h2 class="label">Nick-Name</h2>
 		<input type="text" name="name" required>
 		<br><br>
 			<h2 class="label">Password</h2>
 		<input class="hard-head" type="password" name="password" required>
 		<br>
 		<input id="button" type="submit" name="login_button" value="Get in">
 		</form>

 		<a class="link" href="register.php">Dont have an already? click here</a>
 	</div>
 		
 



 </body>
 </html>