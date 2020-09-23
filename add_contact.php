<?php 
include 'connection.php';
 session_start();
 $id = $_SESSION["id"];
 $accountname = $_SESSION["username"];
  
 if(!isset($_SESSION['username'])){
 	header("location:sign_in.php");
 }
 
$error="";
$name="";
$email="";
$address="";
$phone="";
$nation="";
$photo="";
$nameErr="";
$emailErr="";
$addErr="";
$phoneErr="";
$photoErr="";
if(isset($_POST["submit"])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$target_dir= "images/";
	$photo=$_FILES['photo']['name'];
	if($photo==""){
		if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$_FILES['photo']['name']))
			$error = "<font color='red'>file uploaded </font></<br>";
		else
			$error = "<font color='red'>file not uploaded </font><br>";
	} else  {
		$error = "<font color='red'>file not uploaded </font><br>";
	}
	$nameerror=!preg_match("/^[a-zA-Z ]*$/",$name) || ($name=="");
	$emailerror=!filter_var($email, FILTER_VALIDATE_EMAIL) || ($email=="");
	$phoneerror=!preg_match("/^[0-9]*$/",$phone)|| ($phone=="");
 	if($nameerror && $phoneerror && $emailerror){
		$nameErr= "<font color='red'>Enter the name filed </font><br>";
		$phoneErr="<font color='red'>Enter the phone number </font><br>";
		$emailErr= "<font color='red'>Invalid email format </font><br>";
	}
	elseif($nameerror && $phoneerror){
			$nameErr= "<font color='red'>Enter the name filed </font><br>";
			$phoneErr="<font color='red'>Enter the phone number </font><br>";	
	}
	elseif($nameerror && $emailerror){
			$nameErr= "<font color='red'>Enter the name filed </font><br>";
			$emailErr= "<font color='red'>Invalid email format </font><br>";
	}
	elseif($phoneerror && $emailerror){
			$phoneErr="<font color='red'>Enter the phone number </font><br>";
			$emailErr= "<font color='red'>Invalid email format </font><br>";
	}
	elseif($nameerror){
			$nameErr= "<font color='red'>Enter the name filed </font><br>";
	}
	elseif($phoneerror){
			$phoneErr="<font color='red'>Enter the phone number </font><br>";
	}
	elseif($emailerror){
			$emailErr= "<font color='red'>Invalid email format </font><br>";
	}
	else
	{
	    $sql = "INSERT INTO contacts (accountname,name,address,phone,email,photo) 
			values ('$accountname','$name','$address','$phone','$email','$photo')";
			var_dump($sql);
 		if($conn->query($sql)){
 			$insert= "<br><font color='green'>New Record Inserted</font>";
 		}
 		else{
 			$insert = "Error:" .mysqli_connect_error($conn);
 		}
	}
 	header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact application</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body> 
	<header>
	<div class="container">	
		<h1><a href="index.html">Contacts</a></h1>
		<a href="add_contact.php"><button name="add">Add +</button></a>
		<div class="user">
            <a href="index.html">Home</a> &nbsp;
            <a href="sign_in.php">logout</a>
        </div>
	</div>
	</header>
	<section>
		<div class="wrapper">

			<div class="newcontact">
				<center><h2>New Contact</h2></center>	
				<form action="add_contact.php" method="POST" enctype="multipart/form-data" id="addform">
					 <label for="name">Name:</label>&nbsp;
					 <?php echo $nameErr; ?>
					 <input type="text" name="name" placeholder="Name" id="name"  required><br>
					 <label for="email">Email:</label>
					 <?php echo $emailErr;	?>
					 <input type="text" name="email" placeholder="email" id="email" required><br>
					 <?php echo $phoneErr;?>
					 <input type="text" name="phone" id="phone" placeholder="phone" required><br>
					 <label for="address">Address:</label>
					 <input type="text" name="address" id="address" placeholder="Adderess"><br>
					 <input type="file" name="photo" placeholder="photo"><br> <br>
					 <input type="submit" name="submit" value="Save" id="submit">
					 <input type="reset" name="clear" value="Reset" id="reset">
				</form>
			</div>
		</div>
	</section>
</body>
</html>