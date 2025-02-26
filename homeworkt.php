<?php
	session_start();
	$user=$_SESSION['usert1'] ;
	$userl=$_SESSION['usert2'] ;
	$_SESSION['add']='homework';
	$_SESSION['edit']='homework';
	
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
		$result="SELECT * FROM homeworks ";
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
			echo "<a href='addform.php' id='link3'>[Προσθήκη νέας εργασίας]</a>";
			
			$do = "SELECT * FROM homeworks ORDER BY id DESC";
			mysqli_set_charset($con, "utf8");
			$query = mysqli_query($con, $do);
			$results = mysqli_fetch_assoc($query);
			$j=0;
			do {
				  $j++;
				  $_SESSION['id'] = $results['id'];
				  $date = $results['date'];
				  $goals = $results['goals'];
				  $attach = $results['attach'];
				  $deliverable = $results['deliverable'];
				  $id = $_SESSION['id'];
		
				echo "<h2>Εργασία " .$j. ":</h2><a href='editform.php" .$id ." ' id='link3'>[Επεξεργασια]</a><a href='homeworktt.php?id=" .$id. "' style='margin-left:0%;' id='link3'>[Διαγραφή]</a>";
				echo "<p><b>Στόχοι : </b>" .$goals. "</p></b>";				
				echo "<p><b>Εκφώνηση:</b>Κατεβάστε την εκφώνηση <a href='".$attach. " ' style='margin-left:0%;' id='link3'>εδώ</a></p><br>";
				echo "<p><b>Παραδωτέα : </b>" .$deliverable. "</p></b>";
				echo "<p><b>Ημερομηνία παράδωσης:</b> " .$date. " </p><br>";				
				echo "<hr>";
			
		   } while ($results = mysqli_fetch_assoc($query))
	?>
	
	</article>
</section>

<footer>
	<a href="#top" id="link2">To Top</a>
</footer

</body>
</html>