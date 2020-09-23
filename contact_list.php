<?php 
include 'connection.php';
 // $sql = "SELECT * from contacts where id = $id'";
session_start();
$username = $_SESSION["username"];
$id = $_SESSION["id"];
 
$sql = "SELECT * FROM contacts where accountname = '$username'";
// var_dump($username);
// var_dump($sql);
// var_dump($conn->query($sql));
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<title>welcome to dashboard</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
        <div class="container">   
            <h1><a href="index.html">cBOOK</a></h1>
            <a href="add_contact.php"><button name="add">Add +</button></a>
            <form action="show_contact.php" method="POST" id="search">
                <input type="text" name="name" placeholder="Enter Name">
                <input type="submit" value="Search" name="submit" id="submit">
            </form>
            <div class="user">
                <?php echo "<a href='account-detail.php'>" .$rows["accountname"]."</a>"; ?> &nbsp;
              <a href="index.html">Home</a> &nbsp;
<!--               <a href="profile.php">profile</a> &nbsp;
 -->              <a href="contact_list.php">Contact_list</a> &nbsp;
              <a href="gallery.php">Gallery</a> &nbsp;
              <a href="sign_in.php">logout?</a>
             </div>
        </div>
    </header>
    <br/>
        <center><h2>All Contacts</h2></center>
        <hr>
     <section>
            <?php 

                $result = mysqli_query($conn,$sql);
                $total = mysqli_num_rows($result);
                // echo "<h2>Total contacts($total)</h2>";
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
                        echo '<button><a href="edit_contact.php?id='.$row['id'].'">Edit</a></button>';
                        echo '<button id="delete" onclick="warning()"><a href="delete_contact.php?id='.$row['id'].'">Delete</a></button>';
                    echo "</div>";
                    }
                }
            ?>
        
    </section>
   </body>
</html>