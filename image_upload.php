<?php 
 session_start();
 include 'connection.php';
 $username = $_SESSION["username"];

if(isset($_POST["upload"])){

	$target_dir= "gallery/";
	var_dump($target_dir);
	$image_upload=$_FILES['image_upload']['name'];
	var_dump($image_upload);
	var_dump($_FILES['image_upload']['tmp_name']);
	var_dump($target_dir.$_FILES['image_upload']['name']);
	if($image_upload!=""){
		if(move_uploaded_file($_FILES['image_upload']['tmp_name'],$target_dir.$_FILES['image_upload']['name']))
			$error = "<font color='red'>file uploaded </font></<br>";
		else
			$error = "<font color='red'>file not uploaded </font><br>";
	    }
	else{
		$error = "<font color='red'>file not uploaded </font><br>";
	}

	$sql = "INSERT INTO gallery (username,images) VALUES('$username','$image_upload')";

	if($conn->query($sql)){
 		$insert= "<br><font color='green'>New Record Inserted</font>";
 	}
 	else{
 		$insert = "Error:" .mysqli_connect_error($conn);
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
	<div class="wrapper">	
		<h1><a href="index.html">Contacts</a></h1>
		<a href="add_contact.php"><button name="add">Add +</button></a>
		<div class="user">
            <a href="index.html">Home</a> &nbsp;
            <a href="logout.php">logout</a>
        </div>
	</div>
	</header>
	<section>
		<div class="wrapper">

			<div class="newcontact">
				<center><h2>Upload Image</h2></center>
				<hr><br/>	
				<form action="image_upload.php" method="POST" enctype="multipart/form-data" id="addform">
					 <input type="file" name="image_upload" placeholder="photo"><br> <br>
					 <input type="submit" name="upload" value="upload" id="submit">
					  
				</form>
			</div>
		</div>
	</section>
</body>
</html>