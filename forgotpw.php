<?php
	session_start();
	$con = mysqli_connect("webpagesdb.it.auth.gr","evanampa","ea18069590","evanampa_");	
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$cpass=$_POST['cpass'];
		$error[]="";
		if($pass!=$cpass){$error[] = 'Password and Re-Password are not matching!';};

		$select = " SELECT * FROM users WHERE email = '$email'  ";

		$result = mysqli_query($con, $select);
		$row = mysqli_fetch_array($result);
		$id=$row['id'];
		$sql = "UPDATE users SET password='$cpass' WHERE id='$id' ";
		if ($con->query($sql) === TRUE) {
			echo "<script>alert('Password has changed successfully!'');</script>";
			header('location:signin.php');
		}
	
	};
?>
<!DOCTYPE html>
<html>
<style>
* {
    box-sizing: border-box;
}

body{
    font-family: sans-serif;
}
header {
  	background-color: rgb(0, 51, 102);
  	padding: 1px;
  	text-align: center;
  	font-size: 35px;
}
header p{
	color:white;
	font-size: 20px;

}
h1{
	color: white;
    font-family: "Monaco" , Monospace;
	font-weight: bold;
	text-shadow: 3px 3px 4px yellow;
	text-align : center;
	margin: 2%;
}
.login-wrapper{
   margin: 5% 38% 0% 38%;
}

.form{
    position: relative;
    width: 100%;
    max-width: 380px;
    padding: 9% 5% 10% 5%;
    background: rgb(153, 153, 153);
    border-radius: 10px;
    color: white;
    box-shadow: 0 15px 25px rgba(0,0,0,0.5);
}
.form::before{
    content:'';
    top: 0;
    left: 0;
    width: 500%;
    height: 100%;
    background: rgba(255,255,255,0.08);
    transform: skewX(-26deg);
    transform-origin: bottom left;
    border-radius: 10px;

}
.form h2{
    text-align: center;
    letter-spacing: 1px;
    margin-bottom: 2rem;
    color:rgb(0, 51, 102);

}

.form .input-group{
    position: relative;
}
.form .input-group input{
    width:100%;
    padding: 10px 0;
    font-size: 1rem;
    letter-spacing: 1px;
    margin-bottom: 30px;
    border:none;
    border-bottom: 1px solid white;
    outline: none;
    background-color:transparent;
    color:inherit;
    
}
.form .input-group label{
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 1rem;
    pointer-events: none;
    transition: .3s ease-out;

}

.form .input-group input:focus + label,
.form .input-group input:valid + label{
    transform: translateY(-18px);
    color:rgb(0, 51, 102);
    font-size: .8rem;

.forgot-pw{
    color:inherit;
}
.button {
	  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
	  background-color: rgb(0, 51, 102);
	  border: none;
	  color: white;
	  padding: 5% 15%;
	  display: inline-block;
	  font-size: 16px;
	  margin: 4% 25%;
	  cursor: pointer;
	  border-radius: 18px;
}

</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Forgot Password</title>
    <link href="login.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="signin.css" />
</head>
<header>
	<h1>LearnPy</h1>
	<p>Forgot Password</p>
</header>
<body>
    <div class="login-wrapper">
        <form action="" class="form" method="post">
            <h2>Change your password</h2>
            <div class="input-group" >
                <input type="text" name="email" required>
                <label for="loginUser">User Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="pass" required>
                <label for="loginPassword">Password</label>
            </div>
			<div class="input-group">
                <input type="password" name="cpass" required>
                <label for="loginPassword">Re-Password</label>
            </div>
			<a href="index.php"><button name="submit" style="color:white" class="button">Change</button></a><br>
            <?php
			if(isset($error)){
				foreach($error as $error){
						echo "<script>alert('$error');</script>";			
				};
			};
			?>
        </form>
    </div>
	<a href="index.php" style="align : right;" >Επιστρέψτε στην αρχική</a>
</body>
</html>