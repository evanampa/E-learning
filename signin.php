<?php
	session_start();
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$x='0';
		$select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

		$result = mysqli_query($con, $select);

		if(mysqli_num_rows($result) > 0){

			$row = mysqli_fetch_array($result);
			if($row['role'] == '1'){
				$_SESSION['usert1'] = $row['name'];
				$_SESSION['usert2'] = $row['lastname'];
				header('location:indext.php');
				$x='1';
			}elseif($row['role'] == '2'){
				$_SESSION['users1'] = $row['name'];
				$_SESSION['users2'] = $row['lastname'];			
				header('location:indexs.php');
				$x='1';
		   }
		}
		if($x=='0'){$error[] = 'Incorrect email or password!';};
	};
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Sign in</title>
    <link href="login.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="signin.css" />
</head>
<header>
	<h1>LearnPy</h1>
	<p>Sign In</p>
</header>
<body>
    <div class="login-wrapper">
        <form action="" class="form" method="post">
            <h2>Sign in</h2>
            <div class="input-group" >
                <input type="text" name="email" required>
                <label for="loginUser">User Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="pass" required>
                <label for="loginPassword">Password</label>
            </div>
			<a href="index.php"><button name="submit" style="color:white" class="button">Sign In</button></a><br>
            <?php
			if(isset($error)){
				foreach($error as $error){
						echo "<script>alert('$error');</script>";			
				};
			};
			?>
			<div class="signup_link">
                Not a member? <a href="signup.php" style="color: rgb(0, 51, 102);">Sign up</a><br>
				<a href="forgotpw.php" class="forgot-pw" style="color: rgb(0, 51, 102);">Forgot Password?</a>
			</div>
        </form>
       
    </div>
	<a href="index.php" style="align : right;" >Επιστρέψτε στην αρχική</a>
</body>
</html>