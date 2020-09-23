<?php 

 include 'connection.php';
$msg="";
$username="";
$password="";

if(isset($_POST["sign_in"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
    
 	$sql = "SELECT id,username,password FROM users WHERE username='$username'  AND password='$password'";
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();
 	session_start();
	if($rows > 0){
		$_SESSION["username"]= $username;
		$_SESSION["id"] = $rows["id"];
		header("location:dashboard.php");

	}
	elseif(empty($row)){
		$msg = "<font color='red'>Incorrect username and password</font>";
	}
	else{
		header("location:sign_in.php");
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>welcome to login page</title>
</head>
<body>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> login page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">	
			<h1><a href="index.html">eBOOK</a></h1>
			 <div class="user">
			 	<a href="index.html">Home</a> &nbsp; &nbsp; 
			 	<a href="admin_login.php">Admin login</a>
			 </div>
		</div>
	</header>
	<div class="container">
		<section>
		<h1 class="cpanel">login to your Account</h1>
			<div class="newcontact">
				<form action="sign_in.php" method="POST" id="addform">
					<label for="name" >Username:</label><br>
					<input type="text" name="username" id ="username" required/><br>
					<label for="password">Password:</label><br>
					<input type="password" name="password" required id="password"><br><br>
					<input type="submit" value="Login" name="sign_in" id="submit">	 
				</form>
			</div> <br/>
			<center><?php echo $msg; ?></center>
	    </section>
	</div>
</body>
</html>