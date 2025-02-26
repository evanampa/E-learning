<?php
	session_start();
	$user=$_SESSION['usert1'] ;
	$userl=$_SESSION['usert2'] ;
	$_SESSION['add']='documents';
	$_SESSION['edit']='documents';

	
		$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
		$result="SELECT * FROM document order by id DESC";
		$result = mysqli_query($con, $result);
		$solution = array();
		$check_num_rows=mysqli_num_rows($result);
		
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
		<a href='addform.php' id='link3'>[Προσθήκη νέου εγγράφου]</a>
		<?php
			
			$do = "SELECT * FROM document ORDER BY id DESC";
			mysqli_set_charset($con, "utf8");
			$query = mysqli_query($con, $do);
			$results = mysqli_fetch_assoc($query);
			do {
				  $_SESSION['id'] = $results['id'];
				  $title = $results['title'];
				  $description = $results['description'];
				  $position = $results['position'];
				  $id = $_SESSION['id'];
		
				echo "<h2 id='name'> " .$title. ": </h2><a href='editform.php?id=" .$id ." ' id='link3'>[Επεξεργασια]</a><a href='documentst.php?id=" .$id. "' style='margin-left:0%;' id='link3'>[Διαγραφή]</a>";
				echo "<p><b>Περιγραφή : </b>" .$description. "</p><br>";
				echo "<a href=' " .$position. " ' id='link3'>Download</a><br>";
				echo "<hr>";
			
		   } while ($results = mysqli_fetch_assoc($query))
		?>
		  	  
		  
</section>

<footer>
	<a href="#top" id="link2">To Top</a>
</footer

</body>
</html>