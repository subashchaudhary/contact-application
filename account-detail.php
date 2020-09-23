<?php 
	session_start();

	include 'connection.php';

	$username = $_SESSION["username"];
    $id = $_SESSION["id"];
 
   $sql = "SELECT * FROM  users where username = '$username'";
   $result = $conn->query($sql);
   $rows = $result->fetch_assoc();
 	echo "your delatails <br/>";
  echo "Name = ".$rows['fullname'];




 ?>