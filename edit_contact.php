 <?php
 include 'connection.php'; 
 session_start();
 if(!isset($_SESSION['name'])){
 	header("location:login.php");
 } 
$host="localhost";
$user="root";
$password="";
$dbname="contact_app";
$error="";
$nameErr="";
$emailErr="";
$addErr="";
$phoneErr="";
$photoErr="";
$insert="";

if(isset($_GET['id'])){
 		$id=$_GET['id'];
  		$sql = "SELECT name,address,phone,email,photo from contacts where id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
}
if(isset($_POST["update"])){
	$name=trim($_POST['name']);
	$email=trim($_POST['email']);
	$address=trim($_POST['address']);
	$phone=trim($_POST['phone']);
	$ID = $_GET['id'];
	$target_dir= "images/";
	$photo=$_FILES['photo']['name'];
	if(empty($photo)){
		$photo=$_POST['oldphoto'];
		if($photo=="")
		$photo=$_FILES['photo']['name'];	
	}
	else {
		move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$_FILES['photo']['name']);
	}
	$nameerror=!preg_match("/^[a-zA-Z ]*$/",$name) || ($name=="");
	$emailerror=!filter_var($email, FILTER_VALIDATE_EMAIL) || ($email=="");
	$phoneerror=!preg_match("/^[0-9]*$/",$phone)|| ($phone=="");
	$conn = mysqli_connect($host,$user,$password,$dbname); 

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
	else{
		$sql = "UPDATE contacts SET name ='$name', email='$email',phone=$phone,address='$address',photo='$photo' WHERE id=$ID";
		$result = mysqli_query($conn,$sql);
		
 		if($result){
 			$insert= "<br><font color='green'>Contact Updated !</font>";
 		}
 		else{
 			$insert = "Error:" .mysqli_connect_error($conn);
 		}
	}
	
	 header("location:admin.php");
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
	<div class="wrapper">	
		<h1><a href="index.html">Contacts</a></h1>
		<a href="add_contact.php"><button name="add">Add +</button></a>
		<div class="user">
			<a href="index.html">Home</a> &nbsp;
			<a href="login.php">login</a>
		</div>
	</header>
	<section>
		<div class="wrapper">	
			<div class="newcontact">
				<center><h2>Edit Contact</h2></center>	
				<form action="edit_contact.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" id="addform">
					 <label for="name">Name:</label>
					 <?php 	echo $nameErr; ?>
					 <input type="text" name="name" value=" <?php echo $row['name']; ?>" id="name" required><br>
					 <label for="email">Email:</label>
					 <?php echo $emailErr; ?>
					 <input type="text" name="email" value=" <?php echo $row['email']; ?>" id="email" required><br>
					 <label for="phone">Phone:</label>
					 <?php echo $phoneErr; ?>
					 <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required><br>
					 <label for="address">Address:</label>
					 <input type="text" name="address" id="address" value =" <?php echo $row['address']; ?>"><br>
					 <input type="file" name="photo"><br> <br>
					 <input type="submit" name="update" value="Save" id="submit">
					 <input type="hidden" name="oldphoto" value="<?php echo $row['photo']; ?>">
					 <input type="reset" name="clear" value="Reset" id="reset">
				</form>
			</div>
		</div>
	</section>
</body>
</html>