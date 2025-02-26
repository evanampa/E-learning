<?php
	session_start();
	$user=$_SESSION['usert1'] ;
	$userl=$_SESSION['usert2'] ;
	
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
	
	if(isset($_GET['id'])){
		if ($_GET['id']>0) {
			$do = "DELETE FROM announcements WHERE id=".$_GET['id'];
			$query = mysqli_query($con,$do);
			header("Location: announcementτ.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<style>
</style>
<head>
	<meta charset="UTF-8">
	<title>LearnPy-Αρχική</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="documents.css">
</head>
<body>
<header>
	<h1>LearnPy</h1>
	<p>Αρχική σελίδα</p>
</header>

	<section class="col-container">
	<nav class="col">
		<ul>
			<a href="indext.php" id="link">Αρχική σελίδα</a><br>
			<a href="announcementt.php" id="link" >Ανακοινώσεις</a><br>
			<a href="communicationt.php" id="link" >Επικοινωνία</a><br>
			<a href="documentst.php" id="link" >Έγγραφα μαθημάτων</a><br>
			<a href="homeworkt.php" id="link" >Εργασίες</a><br>
			<a href="catalog.php" id="link" >Κατάλογος μαθητών</a><br>
		</ul>
		<a href="signin.php" title="Αποσύνδεση" id="log" ><?php echo $user,' ', $userl;?>
		<p style="font-size: 78%; margin:2%">Log out</p></a><br>
		
					
	</nav>
  
  <article class="col">
    <?php
			
			$do = "SELECT * FROM users WHERE role=2";
			mysqli_set_charset($con, "utf8");
			$query = mysqli_query($con, $do);
			$results = mysqli_fetch_assoc($query);
			do {
				  $_SESSION['id'] = $results['id'];
				  $name = $results['name'];
				  $lastname = $results['lastname'];
				  $email = $results['email'];
				  $password = $results['password'];
				  $id = $_SESSION['id'];
		
				echo "<h2 id='name'> " .$name. " ".$lastname." : </h2><a href='catalog.php?id=" .$id. "' style='margin-left:0%;' id='link3'>[Διαγραφή]</a>";
				echo "<p><b>Email : </b>" .$email. "</p><br>";
				echo "<p><b>Password : </b>" .$password. "</p><br>";
				echo "<hr>";
			
		   } while ($results = mysqli_fetch_assoc($query))
		?>
  </article>

</section>


</body>
</html>