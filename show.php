 <?php 
$host="localhost";
$user="root";
$password="";
$dbname="contact_app";

$conn = mysqli_connect($host,$user,$password,$dbname);
$sql = "SELECT sn,name,address,phone,email,photo from contacts";
 
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
			<form action="show_contact.php" method="POST" id="search">
				<input type="text" name="name" placeholder="Enter Name">
				<input type="submit" value="Search" name="submit" id="submit">
			</form>
			<div class="user">
			<a href="index.html">Home</a> &nbsp;
			 <a href="logout.php">logout</a>
			 </div>
		</div>
	</header>
	<section>
		<div class="wrapper">
			<?php 

				$result = mysqli_query($conn,$sql);
				$total = mysqli_num_rows($result);
 				if(mysqli_num_rows($result) > 0){ 
					while($row = mysqli_fetch_assoc($result)){ 
					echo "<div class='contacts'>";
						echo "<div class='img'>";
							if($row['photo']==""){
								echo "<div class='imgav'></div>";
							}else{
								echo "<img src='images/".$row["photo"]."' alt='' width:'200px' height:'285px'>";
							}  
						echo "</div>";
					    echo "<br><p> Name:&nbsp;" .$row["name"]."</p>";
					    echo "<br><p> Address:&nbsp;" .$row["address"]."</p>";
				        echo "<br><p> phone:&nbsp;" .$row["phone"]."</p>";
				        echo "<br><p> Email:&nbsp;" .$row['email']."</p>";
				        echo "<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				       /* echo '<button><a href="edit_contact.php?id='.$row['sn'].'">Edit</a></button>';
				        echo '<button id="delete" onclick="warning()"><a href="delete_contact.php?id='.$row['sn'].'">Delete</a></button>';*/
			    	echo "</div>";
	    			}
		        }
		    ?>
		</div>
	</section>
	<script>	
		//window.onload(){
			//alert("hellow.......");
		//}
		 function warning(){
		 	alert("Are you sure want to delete?");
		 }
	</script>
</body>
</html>