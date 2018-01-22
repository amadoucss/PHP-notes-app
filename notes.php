<?php 
 include 'includes/connection.php';
 session_start();

 if(!isset($_SESSION['nick_name'])){
 	header("Location: login.php");
 }

 $id = $_SESSION['id'];

 $query = mysqli_query($conn, "SELECT * FROM notes where user_id='$id'");


	

	
 
 		?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1">
 	<title>Notes</title>
 	<link rel="stylesheet" href="style.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
 <nav>
 	<div>
 	<h2 class="big-hero-text"><?php echo ucfirst($_SESSION['nick_name']). " ";?>Notes App </h2>
 	<a class="icon" href="index.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
 	</div>
 </nav>
<?php 

if(isset($_GET['alert'])){
if($_GET['alert'] == 'deleted'){
	echo "<h4 id='alert'>Note Deleted</h4>";
	echo "<script>

	setTimeout(function(){ 
		document.getElementById('alert').style.visibility = 'hidden';
	}, 3000);
	
	</script>";
}

if($_GET['alert'] == 'added'){
	echo "<p id='alert'>Note Added</>";
	echo "<script>

	setTimeout(function(){ 
		document.getElementById('alert').style.visibility = 'hidden';
	}, 3000);
	
	</script>";
}

if($_GET['alert'] == 'updated'){
	echo "<p id='alert'>Note updated</>";
	echo "<script>

	setTimeout(function(){ 
		document.getElementById('alert').style.visibility = 'hidden';
	}, 3000);
	
	</script>";
}

if($_GET['alert'] == 'welcome'){
	echo "<p id='alert'>Welcome Bro Begin by Adding Notes </>";
	echo "<script>

	setTimeout(function(){ 
		document.getElementById('alert').style.visibility = 'hidden';
	}, 8000);
	
	</script>";
}
}

 ?>
 <h1>Your Notes <a href="add.php"><i class="fa fa-plus" aria-hidden="true"></i></a></h1>
 	
 	
 	<?php  if(mysqli_num_rows($query) > 0){
		  while ($row = mysqli_fetch_array($query)) {

  		echo "<div class='notes'>
 	<a href='note.php?id=".
 		$row['id']."'>
 	<div class='note'>".
 		$row['name'].

 	"</div>
 	</a>";
  }

	}
else{
	echo "<h2>You have no notes</h2>";
}
?> 
	
 	
 	
 	
 </body>
 </html>