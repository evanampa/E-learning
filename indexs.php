<?php
	session_start();
	$user=$_SESSION['users1'] ;
	$userl=$_SESSION['users2'] ;
	
?>

<!DOCTYPE html>
<html>
<style>
</style>
<head>
	<meta charset="UTF-8">
	<title>LearnPy-Αρχική</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<header>
	<h1>LearnPy</h1>
	<p>Αρχική σελίδα</p>
</header>

	<section class="col-container">
	<nav class="col">
		<ul>
			<a href="indexs.php" id="link1">Αρχική σελίδα</a><br>
			<a href="announcements.php" id="link2" >Ανακοινώσεις</a><br>
			<a href="communications.php" id="link3" >Επικοινωνία</a><br>
			<a href="documentss.php" id="link4" >Έγγραφα μαθημάτων</a><br>
			<a href="homeworks.php" id="link5" >Εργασίες</a><br>
		</ul>
		<a href="signin.php" title="Αποσύνδεση" id="link6" ><?php echo $user,' ', $userl;?>
		<p style="font-size: 78%; margin:2%">Log out</p></a><br>
		
					
	</nav>
  
  <article class="col">
    <h2><?php echo $user ;?>,welcome to Learn Python</h2>
	<h3 style="text-align:center;">Ιn the easiest and fastest way</h3>
	<p>Καλώς ήρθατε στα online courses της Python. Η Python είναι μια δημοφιλής γλώσσα προγραμματισμού, η οποία κυκλοφόρησε το 1991.Λειτουργεί σε διαφορετικές πλατφόρμες (Windows, Mac, Linux, Raspberry Pi, κ.λπ.). Έχει μια απλή σύνταξη παρόμοια με την αγγλική γλώσσα, σύνταξη που επιτρέπει στους προγραμματιστές να γράφουν προγράμματα με λιγότερες γραμμές από κάποιες άλλες γλώσσες προγραμματισμού. Με τη Python ο κώδικας μπορεί να εκτελεστεί αμέσως μόλις γραφτεί.</p>
    <p>Βασικός στόχος των courses είναι η απόκτηση δεξιοτήτων ανάπτυξης και συντήρησης υψηλής ποιότητας λογισμικού μεγάλου μεγέθους. Για να επιτευχθεί αυτός ο στόχος θα χρειαστεί η μάθηση της μεθοδολογίας του προγραμματισμού βάσει αντικειμένων, καθώς και η μάθηση καλών πρακτικών ανάπτυξης και συντήρησης λογισμικού</p>
    <p>Στα αριστερά της οθόνης βλέπετε τις βασικές ιστοσελίδες που θα χρειαστείτε καθ' όλη την διάρκεια των courses. Στη σελίδα Ανακοινώσεις θα μπορείτε να ενημερώνεστε συνεχως και στην Επικοινωνία θα μπορείτε να βρίσκεστε σε επαφή με τους διδάσκοντες. Μέσω της σελιδας Έγγραφα μαθημάτων θα μπορείτε να κατεβάσετε τα αρχεία που χρειάζεστε, ενώ στην σελίδα Εργασίες θα μπορείτε να παρακολουθείτε τις εργασίες που τρέχουν ακόμα</p>
	<img src="logo.png">
  </article>

</section>


</body>
</html>