<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admins</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/adminsupdate-form-style.css">
  
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Update Movie</h3></div>
     <?php 
     session_start();
     require_once("connection.php");
if(!isset($_SESSION["user_type"])){
    die("You are not allow to enter this section");
 }
if(!isset($_GET["id"])||!is_numeric($_GET["id"])){

    die("<h1>Something went wrong</h1>");
}?>
    
     <a href="./profile.php" class="back"><h3>Profile</h3></a>
    
    </header>
    <section class="main">
    <?php

$sql="SELECT * FROM user WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("id",$_GET["id"]);
$stmt->execute();
$user=$stmt->fetch(PDO::FETCH_ASSOC);
?>
    <form action="actions/updateAdminsAct.php" method="post" class="re-f"  enctype="multipart/form-data">
    <div class="re-i">
            
            <input type="hidden" name="id" value=<?php echo $user["id"];?>>
        </div>
        <div class="re-i">
            <lab>Username</lab>
            <input type="text" name="username" value=<?php echo $user["username"];?>>
        </div>
        <div class="re-i">
            <lab>First name</lab>
            <input type="text" name="F_name" value=<?php echo $user["F_name"];?>>
        </div>
        <div class="re-i">
            <lab>Last Name</lab>
            <input type="text" name="L_name" value=<?php echo $user["L_name"];?>>
        </div>
        <div class="re-i">
            <lab>Email</lab>
            <input type="text" name="email" value=<?php echo $user["email"];?>>
        </div>
        <div class="re-i ">
        <div class="d-r">
        <div>
                <?php
                require_once("connection.php");
                $sql="SELECT * FROM genders";
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
                $genders=$stmt->fetchAll(PDO::FETCH_ASSOC);
                if(! $genders){
                    echo " genders  not found";
                }
                else{
                    ?>
                    <select name="gender_type" id=" categories">
                        <?php
                        foreach( $genders as  $gender){
                           
                            ?>
                            <option value="<?php echo  $gender["id"];?>"<?php echo ($gender["id"]==$user["gender"])? "selected":""; ?>><?php echo  $gender["gender_type"];?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <?php
                }
                ?>
                </div>
                
                <div class="re-i">
                <img src="https://i.ytimg.com/vi/-aaueYorn08/maxresdefault.jpg?sqp=-oaymwEmCIAKENAF8quKqQMa8AEB-AH-BYAC4AOKAgwIABABGHIgPCg8MA8=&rs=AOn4CLCQnC7Xoyz941XhfstuLfyeio2PPA" style="width:100px;height:100px;" alt="">
                <label for="">Are you Mrs or Mr??</label>

                </div>
                
                
      
        </div>
            
        <div class="re-i">
            <lab>Image</lab>
            <input type="file" name="image" >
        </div>
      
        <div class="re-i">
           <button type="submit">Submit</button>
        </div>
        <?php
        if(isset($_SESSION["movie_message"])){
        echo "<h5 style='color:#557799;'>". $_SESSION["movie_message"]."</h5>";
        unset($_SESSION["movie_message"]);
    }
        ?>
       </form>
    </section>
</body>
</html>