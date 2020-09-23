<?php 
$host='localhost';
$user='root';
$pass='';
$dbname='contact_app';
$username="";
$pass="";
$msg="";

$conn= new mysqli($host,$user,$pass,$dbname);

if(isset($_POST['login'])){
	$username=$_POST["username"];
	$pass=$_POST["password"];
	$sql="SELECT id,username,password FROM admin where username='$username' AND password='$pass'";
	$result= $conn->query($sql);
	$rows = $result->num_rows;
	 
	session_start();
	if($rows > 0){
		$_SESSION["name"]= $username;
		header("location:admin.php");
	}
	elseif(empty($row)){
		$msg = "<font color='red'>Incorrect username and password</font>";
	}
	else{
		header("location:login.php");
	}
}

 ?>
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
			<h1><a href="index.html">cBOOK</a></h1>
			<!-- <a href="add_contact.php"><button name="add">Add +</button></a>
			<form action="show_contact.php" method="POST" id="search">
				<input type="text" name="name" placeholder="Enter Name">
				<input type="submit" value="Search" name="submit" id="submit">
			</form> -->
			 <div class="user">
			 <a href="index.html">Home</a> &nbsp; &nbsp; 
			 <a href="sign_in.php">Sign in</a>&nbsp; &nbsp; 
			 <a href="sign_up.php">Sign up?</a>

			 </div>
		</div>
	</header>
	<section>
	<h1 class="cpanel">Welcome to cPanel</h1>
	<div class="newcontact">
		<form action="admin_login.php" method="POST" id="addform">
			<label for="name" >Username:</label><br>
			<input type="text" name="username" required/><br>
			<label for="password">Password:</label><br>
			<input type="password" name="password" required id="password"><br><br>
			<input type="submit" value="Login" name="login" id="submit">
			<?php echo $msg; ?> 
		</form>
		</div>
	</section>
</body>
</html>