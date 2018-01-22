<?php 
include 'includes/connection.php';

session_start();

if(!isset($_SESSION['nick_name'])){
	header("Location: login.php");
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM notes WHERE id ='$id'");

$notes = mysqli_fetch_array($query);


 ?>


  <!DOCTYPE html>
 <html lang="en">
 <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1">
 	<meta charset="UTF-8">
 	<title>Notes</title>
 	<link rel="stylesheet" href="style.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
 <nav>
 	<div>
 	<h2 class="big-hero-text"><?php echo ucfirst($_SESSION['nick_name']). " ";?>Notes App </h2> 
 	</div>
 </nav>

 <h1><a href="notes.php"><i class="fa fa-undo" aria-hidden="true"></i></a></h1>
 	
 	<div class="single_note">
 	<h1> <?php echo $notes['name']; ?></h1>
 	<h3> <?php echo $notes['note']; ?></h3>
 	<p> <?php echo $notes['date_created']; ?></p>
 	</div>

	<?php  if(isset($_POST['delete_button'])){
	$id = $_GET['id'];
 $query = mysqli_query($conn, "DELETE FROM notes WHERE id ='$id'");

 header("Location: notes.php?alert=deleted");
	

}
?> 

	<div class="forms">
	<div class="delete-form">
	 <form action='<?php echo "note.php?id=".$notes['id']; ?>' method="POST">
		<input class="delete" type="submit" name="delete_button" value="Delete">
	</form>
	</div>



	

	<div class="edit-form">
		<a class="edit" href="<?php echo "edit.php?id=".$notes['id']; ?>">Edit</a>
	</div>
	</div>
 </body>
 </html>