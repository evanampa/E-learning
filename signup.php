<?php
	$name=$lastname=$email=$pass="";
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
	if(isset($_POST['submit'])){

		$name=$_POST['name'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$_SESSION["name"]=$name;
		if (empty($_POST['role1'])) {
			if (empty($_POST['role2'])){
				$errorrole='Choose a role';
			}
			else{
				$role='2';
			};
		} 
		else if (empty($_POST['role2'])) {
		  $role='1';
		};
		
		$select = " SELECT * FROM users WHERE email = '$email'";

		$result = mysqli_query($con, $select);
		
		if(empty($name) || empty($lastname) || empty($email) || empty($pass)){
			$error = 'Please fill all the boxes!';
		}
		else if(mysqli_num_rows($result) > 0){
			$errormail = 'This email already exist!';
		}
		else if(empty($errorrole)){
			$insert ="insert into users (name,lastname,email,password,role) values ('$name','$lastname','$email','$pass','$role')";
			mysqli_query($con, $insert);
			
			header('location:signin.php');

      };
  };
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="signup.css">
		<title>
			Sign up
		</title>
	<header>
		<h1>LearnPy</h1>
		<p>Sign up</p>
	</header>
	<body>
		<div class="container">
		  <form>
			  <h2>Sign up</h2>
			  <p>Please fill this form to create an acount </p>
		  </form>
			<br>
			<form action="" method="post">
					<label>Όνομα</label>
						<input type="text" name="name" placeholder="First Name" value="<?php echo $name;?>"/>
						<br>
					<label>Επώνυμο</label>
						<input type="text" name="lastname" placeholder="Last Name" value="<?php echo $lastname;?>"/>
						<br>
					<label>Email</label>
						<input type="text" name="email" placeholder="Email" value="<?php echo $email;?>"/>
						<br>
					<label>Password</label>
						<input type="text" name="password" placeholder="Password" value="<?php echo $pass;?>"/>
						<br>
					<input type="checkbox" id="role1" name="role1" onclick="document.getElementById('role2').checked = false"/><label for="role1">I am a Tutor</label>
					<input type="checkbox" id="role2" name="role2" onclick="document.getElementById('role1').checked = false"/><label for="role2">I am a Student</label>
					<br>
					<a href=""><button name="submit" class="registerbtn">Sign Up </button></a>
					<?php
					if(isset($error)){
						echo '<span style="color:red">'.$error .'</span>';
					}
					else if(isset($errorrole)){
						echo '<span style="color:red">' .$errorrole.'</span>';
					}
					else if(isset($errormail)){
						echo '<span style="color:red">' .$errormail.'</span>';
					}
					?>
			</form>
		</div
	</body>
</html>
