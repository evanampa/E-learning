<?php
	session_start();
	$user=$_SESSION['usert1'] ;
	$userl=$_SESSION['usert2'] ;
	$_SESSION['add']='announcement';
	$_SESSION['edit']='announcement';

	
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
<head>
	<meta charset="UTF-8">
	<title>LearnPy-Ανακοινώσεις</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="documents.css">
</head>
<body>
<header>
	<h1>LearnPy</h1>
	<p>Ανακοινώσεις</p>
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
			echo "<a href='addform.php' id='link3'>[Προσθήκη νέας ανακοίνωσης]</a>";
			
			$do = "SELECT * FROM announcements ORDER BY id DESC";
			mysqli_set_charset($con, "utf8");
			$query = mysqli_query($con, $do);
			$results = mysqli_fetch_assoc($query);
			$j=0;
			do {
				  $j++;
				  $_SESSION['id'] = $results['id'];
				  $date = $results['date'];
				  $theme = $results['theme'];
				  $text = $results['text'];
				  $id = $_SESSION['id'];
		
				echo "<h2>Ανακοίνωση " .$j. ":  </h2><a href='editform.php?id=" .$id ." ' id='link3'>[Επεξεργασια]</a><a href='announcementt.php?id=" .$id. "' style='margin-left:0%;' id='link3'>[Διαγραφή]</a>";
				echo "<p><b>Ημερομηνία : </b>" .$date. "</p>";
				echo "<p><b>Θέμα : </b>" .$theme. " </p>";
				echo "<p> " .$text. " </p><br>";
				echo "<hr>";
			
		   } while ($results = mysqli_fetch_assoc($query))
	?>
	</article>
</section>

<footer>
	<a href="#top" id="link2">To Top</a>
</footer>
</body>
</html>