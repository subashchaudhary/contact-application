<?php 
include 'connection.php';
session_start();
$username = $_SESSION["username"];
$sql = "SELECT * FROM gallery where username = '$username'";
$result = $conn -> query($sql); 
$rows = $result -> fetch_assoc();
 
 
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
        <div class="container">   
            <h1><a href="index.html">cBOOK</a></h1>
            <a href="image_upload.php"><button name="add">upload</button></a>
             
            <div class="user">
                <?php echo "<a href='account-detail.php'>" .$rows["username"]."</a>"; ?> &nbsp;
              <a href="index.html">Home</a> &nbsp;
              <!-- <a href="profile.php">profile</a> &nbsp; -->
              <a href="contact_list.php">Contact_list</a> &nbsp;
              <a href="gallery.php">Gallery</a> &nbsp;
              <a href="sign_in.php">logout?</a>
             </div>
        </div>
    </header>
     <section>
     <div class="container">
        
        <br/>
        <center><h2>Gallery</h2></center>
        <hr>
            <?php 

                
                if($result->num_rows > 0){ 
                    while($rows = $result -> fetch_assoc()){ 
                    echo "<div class='contacts'>";
                        echo "<div class='img'>";
                            if($rows['images']==""){
                                echo "<div class='imgav'></div>";
                            }else{
                                echo "<img src='gallery/".$rows["images"]."' alt='' width:'200px' height:'285px'>";
                            }  
                        echo "</div>";
                        echo '<div class="img-btns">';
                        echo '<div id="view"><button><a href="view_image.php?id='.$rows['id'].'">View</a></button></div>';
                        echo '<button id="delete" style="width:100px"onclick="warning()"><a href="delete_image.php?id='.$rows['id'].'">Download</a></button>';
                    echo "</div></div>";
                    }
                }
                else{
                    echo "<br/><center><p style='color:red'>No images in your gallery</p></center>";
                }
            ?>
        </div>
        </div>
    </section>
</body>
</html>
	 
 