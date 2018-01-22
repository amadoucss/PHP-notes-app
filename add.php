<?php 
 include 'includes/connection.php';

 session_start();

 if(!isset($_SESSION['nick_name'])){
 	header("Location: login.php");
 }


 $alert = array();

 if(isset($_POST['submit'])){
 	$name = $_POST['name'];
 	$note = $_POST['note'];
 	$id = $_SESSION['id'];
 	$insert_query = mysqli_query($conn, "INSERT INTO notes VALUES('', '$id', '$name','$note', CURRENT_TIMESTAMP)");
 	header("Location: notes.php?alert=added");
 }

 ?>

 <!DOCTYPE html>
 <html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1">
 <head>
 	<meta charset="UTF-8">
 	<title>your  Notes App</title>
 	<link rel="stylesheet" href="style.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
 <nav>
 	<div>
 	<h2 class="big-hero-text"><?php echo ucfirst($_SESSION['nick_name']). " ";?>Notes App</h2>
 	</div>
 </nav>
 <h1 class="h1">Add Notes <a href="notes.php"><i class="fa fa-undo" aria-hidden="true"></i></a></h1>
 	
 	<div id="form" class="form form1 ">
 		<form action="add.php" method="POST">
 		<h2 class="name">Name</h2>
 		<input class="input" type="text" name="name" required>
 		<br><br>
 			<h2 class="name">Note</h2>
 		<textarea class="texarea" name="note" required></textarea>
 		<br>
 		<input class="input" id="button" type="submit" name="submit" value="Add note">
 		</form>
 	</div>
 </body>
 </html>