 <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title></title>
  	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<header>
		<div class="container">	
			<h1><a href="index.html">Contacts</a></h1>
			<a href="add_contact.php"><button name="add">Add +</button></a>
			<form action="show_contact.php" method="POST" id="search">
				<input type="text" name="name" placeholder="Enter Name">
				<input type="submit" value="Search" name="submit" id="submit">
			</form>
		<div class="user">
			<a href="index.html">Home</a>
		    <a href="logout.php">logout</a>
    	</div>
		</div>
	</header>
 </body>
 </html> 

<?php 
 include 'connection.php';

if(isset($_POST["submit"])){
	$name=$_POST['name'];
 	if($name){
 		$sql = "SELECT id,name,address,phone,email,photo from contacts where name='$name'";
 		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); 
		if($row){
			echo "<div class='newcontact' style='border:none; box-shadow:none;'>";
			echo "Search result for &nbsp".$name;
	    	echo "<div class='contacts'>";
				echo "<div class='img'>";
					echo "<img src='images/".$row["photo"]."' alt='' width:'200px' height:'285px'>";  
				echo "</div>";
				echo "<br><p> Name:&nbsp;" .$row["name"]."</p>";
				echo "<br><p> Address:&nbsp;" .$row["address"]."</p>";
				echo "<br><p> phone:&nbsp;" .$row["phone"]."</p>";
				echo "<br><p> Email:&nbsp;" .$row['email']."</p>";
			echo "</div>";
			echo "</div>";
		}
		elseif(empty($row)){ 
			echo "<center><font color='red'><font size='10px'>Result not found !</center>";
		}
	}
	if(empty($name)):
		echo "<center><font size='10px'>Enter the name<center>";
	endif;
}

 ?>
