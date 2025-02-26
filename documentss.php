<?php
	session_start();
	$user=$_SESSION['users1'] ;
	$userl=$_SESSION['users2'] ;
	
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
		$result="SELECT * FROM document order by id DESC";
		$result = mysqli_query($con, $result);
		$solution = array();
		$check_num_rows=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>LearnPy-Έγγραφα</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="documents.css">
</head>
<body>
<header>
	<h1>LearnPy</h1>
	<p>Έγγραφα</p>
</header>
<section class="col-container">
	<nav class="col">
		<ul>
			<a href="indexs.php" >Αρχική σελίδα</a><br>
			<a href="announcements.php" >Ανακοινώσεις</a><br>
			<a href="communications.php" >Επικοινωνία</a><br>
			<a href="documentss.php" >Έγγραφα μαθημάτων</a><br>
			<a href="homeworks.php" >Εργασίες</a><br>
		</ul>
		<a href="signin.php" title="Αποσύνδεση" id="link1" ><?php echo $user,' ', $userl;?>
		<p style="font-size: 78%; margin:2%">Log out</p></a><br>
		
					
	</nav>
  
	<article class="col">
	<?php
		$j=1;
		while ($row = mysqli_fetch_assoc($result))
		  {
				echo "<h2>" .$row['title']. ": </h2><br>";
				echo "<p><b>Περιγραφή : </b>" .$row['description']. " </p><br>";
				echo "<a href='" .$row['position']. " ' id='link3'>Download</a><br>";
				echo "<hr>";
		  }
	?>
</section>

<footer>
	<a href="#top" id="link2">To Top</a>
</footer

</body>
</html>