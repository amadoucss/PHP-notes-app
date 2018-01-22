 <?php 
session_start();
session_destroy();

include 'includes/connection.php';


 ?> 


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1">
 	<title>Your Notes App</title>
 	<link rel="stylesheet" href="style.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
<section class="bg">
 <nav>
 	<div>
 	<h2 class="big-hero-text"><span>Your</span> Notes App</h2>
 	<a class="icon" href="login.php"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i></a>
 	</div>
 </nav>
 
 	
 	<div class="container">
 		<h1>Never Forget an Idea Again</h1>
 		<h2>Save your notes online</h2>
 		<a href="register.php">Get Started</a>
 	</div>
 	</section>


 </body>
 </html>