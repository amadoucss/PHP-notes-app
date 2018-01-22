



<?php 
include 'includes/connection.php';

session_start();

if(!isset($_SESSION['nick_name'])){
	header("Location: login.php");
}


$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM notes WHERE id ='$id'");
$notes = mysqli_fetch_array($query);

if(isset($_POST['edit_button'])){
	$id = $_GET['id'];
	$names = $_POST['update_name'];
	$note =  $_POST['note'];
	mysqli_query($conn, "UPDATE notes SET name='$names', note='$note' WHERE id='$id'");
	header("Location: notes.php?alert=updated");
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1">
 	<meta charset="UTF-8">
 	<title><?php echo $_SESSION['nick_name'];?> Notes</title>
 	<link rel="stylesheet" href="style.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
 <nav>
 	<div>
 	<h2 class="big-hero-text"><?php echo ucfirst($_SESSION['nick_name']). " ";?>Notes App </h2> 
 	</div>
 </nav>
 <h1>Edit Note <a href="notes.php"><i class="fa fa-undo" aria-hidden="true"></i></a></h1>
 	
 	<div class="form1 form">
 			<form action='<?php echo "edit.php?id=".$notes['id']; ?>' method="POST">
 		<h2 class="name">Name</h2>
 		<input type="text" name="update_name" value='<?php echo $notes['name']; ?>' required>
 		<br><br>
 			<h2 class="name">Note</h2>
 		<textarea name="note" required><?php echo $notes['note'];?></textarea>
 		<br>
 		<input class="edit" type="submit" name="edit_button" value="Update">
 		</form>
 	</div>
 </body>
 </html>