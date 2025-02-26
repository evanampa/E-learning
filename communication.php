<?php
	session_start();
	$user=$_SESSION['users1'] ;
	$userl=$_SESSION['users2'] ;
	$user=$_SESSION['usert1'] ;
	$userl=$_SESSION['usert2'] ;
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>LearnPy-Επικοινωνία</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="communication.css">
</head>
<body>
<header>
	<h1>LearnPy</h1>
	<p>Επικοινωνία</p>
</header>
<section class="col-container">
	<nav class="col">
		<ul>
			<a href="indexs.php" id="link1">Αρχική σελίδα</a><br>
			<a href="announcements.php" id="link2" >Ανακοινώσεις</a><br>
			<a href="communication.php" id="link3" >Επικοινωνία</a><br>
			<a href="documentss.php" id="link4" >Έγγραφα μαθημάτων</a><br>
			<a href="homeworks.php" id="link5" >Εργασίες</a><br>
		</ul>
		<a href="signin.php" title="Αποσύνδεση" id="link6" ><?php echo $user,' ', $userl;?>
		<p style="font-size: 78%; margin:2%">Log out</p></a><br>
		
					
	</nav>
  
	<article class="col">
		<h2>Αποστολή e-mail μέσω web φόρμας:</h2>
		<div class="container">
		
			<label for="fname">Αποστολέας</label>
			<input type="text" id="fname" name="name" >
				<br>
			<label for="theme">Θέμα</label>
			<input type="theme" id="email" name="theme">
				<br>
			<textarea id="subject" name="subject" placeholder="Γραψτε το κειμενο σας εδω..." style="height:100px"></textarea>
			<input type="submit" value="Submit">
			<br>
		</div>
		<hr>
		<h2 style="padding-top:1%">Αποστολή e-mail με χρήση e-mail διεύθυνσης:</h2>
		<p>Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου</p>
		<a href="https://mail.google.com/mail" id="link7" >tutor@csd.auth.test.gr </a>
	</article>
	
</section>

</body>
</html>