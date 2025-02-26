<?php
	session_start();
	$user=$_SESSION['users1'] ;
	$userl=$_SESSION['users2'] ;
	
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
		$result="SELECT * FROM homeworks ";
		$result = mysqli_query($con, $result);
		$solution = array();
		$check_num_rows=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>LearnPy-Εργασίες</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="documents.css">
</head>
<body>
<header>
	<h1>LearnPy</h1>
	<p>Εργασίες</p>
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
				echo "<h2>Εργασία " .$j. ":</h2>";
				echo "<p><b>Στόχοι : </b>" .$row['goals']. "</p></b>";
				echo "<p><b>Εκφώνηση:</b>Κατεβάστε την εκφώνηση <a href='".$row['attach']. " ' style='margin-left:0%;' id='link3'>εδώ</a></p><br>";
				echo "<p><b>Παραδωτέα : </b>" .$row['deliverable']. "</p></b>";				
				echo "<p><b>Ημερομηνία παράδωσης:</b> " .$row['date']. " </p><br>";
				echo "<hr>";
				$j++;
		  }
	?>
	</article>
</section>

<footer>
	<a href="#top" id="link2">To Top</a>
</footer

</body>
</html>