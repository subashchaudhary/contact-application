<?php 

$host = "localhost";
$user = "root";
$password = "";
$db = "contact_app";
$fullname ="";
$email ="";
$username="";
$password="";
$message ="";
$Err ="";

// connection to database
$conn = mysqli_connect($host,$user,$password,$db);
// if($conn)
// 	echo "sucess connection";
// else
// 	echo "failed";

if(isset($_POST["sign_up"])){
	$fullname = $_POST["fullname"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	if(!preg_match("/^[a-zA-Z]*$/", $fullname) || $fullname=="")
	{
		$Err = "<p>enter the appropriate name</p>";
	}
	elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) || $email=="")
	{
		$Err .= "<p>enter a valid email address</p>";
	}
	elseif($username == "")
	{
		$Err .= "<p>enter username</p>";

	}
	elseif($password == "")
	{
		$Err = "<p>choose a password</p>";
	}
	else
	{
		//To insert a new data
	$sql = "INSERT INTO users(fullname,username,email,password)
	        values('$fullname','$username','$email','$password')";
	 if($conn)
	 {
	 	$insert = mysqli_query($conn,$sql);
	 	if($insert)
	 	{
	 		$message = "<p>Sign_up successful</p>";
	 		header("dashborad.php");
	 	}

	 	else
	 		echo "Error:" . mysqli_connect_error($conn);
	 }
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
			 <a href="sign_in.php">Login</a>
			 </div>
		</div>
	</header>
	<div class="container">
		<section> <br/>
			<center><h2> Create Account</h2></center>
			<div class="newcontact">
			 <form action="sign_up.php" method="POST" id="addform">
			 	 <label id="fullname">Full Name</label>
			 	 <input type="text" name="fullname"><br/>
			     <label id="email">Email Address</label><br/>
			   	 <input type="text" name="email" id="email"><br/>
			     <label id="username">choose a username</label>
			     <input type="text" name="username"><br/>
			     <label id="password">Password</label>
			     <input type="password" name="password" id="password"\><br/><br/>
			     <input type="submit" name="sign_up" id="submit" value="Sign_up">
			 </form>
			 </div>
		<div id="complete" style="float: left;color: red;font-size: 20px;">
			<?php echo $message;
				  echo $Err;

	 ?>
</div>
 </div>
 </body>
 </html>