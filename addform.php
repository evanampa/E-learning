<?php
	session_start();
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
	
	$x=$_SESSION['add'];
	$user=$_SESSION['usert1'] ;
	$userl=$_SESSION['usert2'] ;
	
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
			<a href="signin.php" title="Αποσύνδεση" id="log" ><?php echo $user,' ', $userl;?>
			<p style="font-size: 78%; margin:2%">Log out</p></a><br>
						
		</nav>
		<div class="container">
		<?php
		if($x=='homework'){
			echo "<p>Προσθήκη εργασίας</p>";
			echo "<form action='' method='post'>";
			echo "<label for='fname'>Στόχοι εργασίας</label><br>";
			echo "<textarea id='subject' name='subject' placeholder='Γραψτε τους στοχους εδω...'></textarea><br>";
			echo "<label for='fname'>Όνομα αρχείου</label><br>";
			echo "<input type='text' id='fname' name='name' ><br>";
			echo "<label for='fname'>Παραδωτέα</label><br>";
			echo "<textarea id='subject' name='subject' placeholder='Γραψτε το κειμενο σας εδω...'></textarea><br>";
			echo "<label for='fname'>Ημερομηνία παράδωσης(Έτος-Μήνας-Ημέρα)</label><br>";
			echo "<input type='text' id='fname' name='name'><br>";
			echo "<a href='' ><button name='buttonlink' class='registerbtn'>ΠΡΟΣΘΗΚΗ</button></a>";			
			echo "</form>";
			
			if(isset($_POST['buttonlink'])){

				$goals=$_POST['goals'];
				$attach=$_POST['attach'];
				$deliverable=$_POST['deliverable'];
				$date=$_POST['date'];

				
				$insert ="insert into  homeworks (goals,attach,deliverable,date) values ('$goals',$attach','$deliverable','$date')";				
				mysqli_query($con, $insert);
				
				echo "<script>
				var datetime =  currentdate.getFullYear() + "-" + (currentdate.getMonth()+1)  + "-" +currentdate.getDate();"
				$datetime="<script>document.writeln(datetime);</script>";
				$theme='Εργασία'
				$text='Η ημερομηνία παράδωσης είναι '+$date;
				$insert ="insert into announcements (date,theme,text) values ('$datetime','$theme','$text') ";
				mysqli_query($con, $insert);
				
				header('location:homeworkt.php');

			};
		}
		else if($x=='documents'){
			echo "<p>Προσθήκη εγγράφου</p>";
			echo "<form action='' method='post'>";
			echo "<label for='fname'>Τίτλος εγγράφου</label><br>";
			echo "<input type='text' id='fname' name='name' ><br>";
			echo "<label for='fname'>Περιγραφή εγγράφου</label><br>";
			echo "<textarea id='subject' name='subject' placeholder='Γραψτε το κειμενο σας εδω...'></textarea><br>";
			echo "<label for='fname'>Όνομα αρχείου</label><br>";
			echo "<input type='text' id='fname' name='name' ><br>";
			echo "<a href='' ><button name='buttonlink' class='registerbtn'>ΠΡΟΣΘΗΚΗ</button></a>";			
			echo "</form>";
			
			if(isset($_POST['buttonlink'])){
				$title=$_POST['title'];
				$description=$_POST['description'];
				$position=$_POST['position'];
				
				$insert ="insert into document (title,description,position) values ('$title',$description','$position')";
				mysqli_query($con, $insert);
				header('location:documentst.php');
			};
		}
		else if($x=='announcement'){
			
				echo "<p>Προσθήκη ανακοίνωσης</p>";
				echo "<form action='' method='post'>";
				echo "<label for='fname'>Ημερομηνία(Έτος-Μήνας-Ημέρα)</label><br>";
				echo "<input type='text' id='fname' name='date'><br>";
				echo "<label for='fname'>Θέμα ανακοίνωσης</label><br>";
				echo "<textarea id='subject' name='theme'></textarea><br>";
				echo "<label for='fname'>Κυρίως κείμενο ανακοίνωσης</label><br>";
				echo "<textarea id='subject' name='text'></textarea><br>";
				echo "<a href='' id='linkbtn'><button name='buttonlink' class='registerbtn'>ΠΡΟΣΘΗΚΗ</button></a>";
				echo "</form>";
			}
			if(isset($_POST['buttonlink'])){
				$date=$_POST['date'];
				$theme=$_POST['theme'];
				$text=$_POST['text'];
		
				
				$insert ="insert into announcements (date,theme,text) values ('$date','$theme','$text') ";
				mysqli_query($con, $insert);
				header('location:announcementt.php');

			};
		?>
		</div
		</section>
	</body>
</html>