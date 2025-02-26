<?php
	session_start();
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
	$x=$_SESSION['edit'];
	$user=$_SESSION['usert1'] ;
	$userl=$_SESSION['usert2'] ;
	$id = $_GET['id'];
	echo $id;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="forms.css">
		<title>
			Sign up
		</title>
	<header>
		<h1>LearnPy</h1>
	</header>
	<body>
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
			<a href="signin.php" title="Αποσύνδεση" id="log" ><?php echo $user,' ', $userl.' ';?>
			<p style="font-size: 78%; margin:2%">Log out</p></a><br>
						
		</nav>
		<div class="container">
		<?php
		if($x=='homework'){
			$select = " SELECT * FROM homeworks WHERE id = ' $id'  ";

			$result = mysqli_query($con, $select);

			if(mysqli_num_rows($result) > 0){

				$row = mysqli_fetch_array($result);
				
				echo "<p>Επεξεργασία εργασίας</p>" ;
				echo "<form action='' method='post'>";
				echo "<label for='fname'>Στόχοι εργασίας</label><br>";
				echo "<textarea id='subject' name='goals'>".$row['goals']."</textarea><br>";
				echo "<label for='fname'>Όνομα αρχείου</label><br>";
				echo "<input type='text' id='fname' name='attach' value='".$row['attach']."' ><br>";
				echo "<label for='fname'>Παραδωτέα</label><br>";
				echo "<textarea id='subject' name='deliverable'>".$row['deliverable']."</textarea><br>";
				echo "<label for='fname'>Ημερομηνία παράδωσης(Έτος-Μήνας-Ημέρα)</label><br>";
				echo "<input type='text' id='fname' name='date' value='".$row['date']."'><br>";
				echo "<a href='' id='linkbtn'><button name='buttonlink' class='registerbtn'>ΑΛΛΑΓΗ</button></a>";				
				echo "</form>";
			}
			if(isset($_POST['buttonlink'])){

				$goals=$_POST['goals'];
				$attach=$_POST['attach'];
				$deliverable=$_POST['deliverable'];
				$date=$_POST['date'];

				
				$insert ="UPDATE homeworks SET goals='$goals',attach='$attach',deliverable='$deliverable',date='$date' WHERE id = '$id'  ";
				mysqli_query($con, $insert);
				header('location:homeworkt.php');

			};
		}
		else if($x=='documents'){
			$select = " SELECT * FROM document WHERE id = '$id'  ";

			$result = mysqli_query($con, $select);

			if(mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_array($result);
				echo "<p>Επεξεργασία εγγράφου</p>";
				echo "<form action='' method='post'>";
				echo "<label for='fname'>Τίτλος εγγράφου</label><br>";
				echo "<input type='text' id='fname' name='title' value='".$row['title']."'><br>";
				echo "<label for='fname'>Περιγραφή εγγράφου</label><br>";
				echo "<textarea id='subject' name='description'>".$row['description']."</textarea><br>";
				echo "<label for='fname'>Όνομα αρχείου</label><br>";
				echo "<input type='text' id='fname' name='position' value='".$row['position']."' ><br>";
				echo "<a href='' id='linkbtn' ><button  name='buttonlink' class='registerbtn'>ΑΛΛΑΓΗ</button></a>";
				echo "</form>";
			}
			if(isset($_POST['buttonlink'])){
				$title=$_POST['title'];
				$description=$_POST['description'];
				$position=$_POST['position'];
				
				$insert ="UPDATE document SET title='$title',description='$description',position='$position' WHERE id = '$id'  ";
				mysqli_query($con, $insert);
				header('location:documentst.php');
			};
		}
		else if($x=='announcement'){
			$select = " SELECT * FROM announcements WHERE id = '$id'  ";

			$result = mysqli_query($con, $select);

			if(mysqli_num_rows($result) > 0){

				$row = mysqli_fetch_array($result);
				echo "<p>Επεξεργασία ανακοίνωσης</p>";
				echo "<form action='' method='post'>";
				echo "<label for='fname'>Ημερομηνία(Έτος-Μήνας-Ημέρα)</label><br>";
				echo "<input type='text' id='fname' name='date' value='".$row['date']."'><br>";
				echo "<label for='fname'>Θέμα ανακοίνωσης</label><br>";
				echo "<textarea id='subject' name='theme'>".$row['theme']."</textarea><br>";
				echo "<label for='fname'>Κυρίως κείμενο ανακοίνωσης</label><br>";
				echo "<textarea id='subject' name='text'>".$row['text']."</textarea><br>";
				echo "<a href='' id='linkbtn'><button name='buttonlink' class='registerbtn'>ΑΛΛΑΓΗ</button></a>";
				echo "</form>";
			}
			if(isset($_POST['buttonlink'])){
				$date=$_POST['date'];
				$theme=$_POST['theme'];
				$text=$_POST['text'];
		
				
				$insert ="UPDATE  announcements SET date='$date',theme='$theme',text='$text' WHERE id = '$id' ";
				mysqli_query($con, $insert);
				header('location:announcementt.php');

			};
		};
		?>
		</div
		</section>
	</body>
</html>
  