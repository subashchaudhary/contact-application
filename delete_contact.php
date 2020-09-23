<?php 
session_start();
 if(!isset($_SESSION['name'])){
 	header("location:login.php");
 }
$host="localhost";
$user="root";
$password="";
$dbname="contact_app";

if(isset($_GET["id"])){
	$id = $_GET["id"];
	$conn = mysqli_connect($host,$user,$password,$dbname);
	$sql = " DELETE from contacts where id='$id'";
	
	if (mysqli_query($conn, $sql)) {
	    echo "<center><font color='green'><font size=5px;'>Contact deleted successfully !</center>";
	} else {
    	echo "<font color='red'>Error deleting record: " . mysqli_error($conn);
	}
}

 ?>
   