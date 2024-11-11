<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/profile-style.css">
</head>
<body>
    <?php
    
    require_once("connection.php");
    session_start();
    if(!isset($_SESSION["user_id"])){
        
        die("bad request");
        }
    $sql="SELECT * FROM user WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$_SESSION["user_id"]);
    $stmt->execute();
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
    ?>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <?php 
     if(!isset($_SESSION["user_type"])){
        die("You are not allow to enter this section");
     }
     if($_SESSION["user_type"]==1){?>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
     <?php }
     elseif($_SESSION["user_type"]==2){?>
     <a href="./moviesEdit.php" class="back"><h3>Movies</h3></a>
     <h3><?php echo "<div style='width:10px;'>  </div>";?></h3>
     <a href="./basket.php" class="back"><h3>Basket</h3></a>
     <?php }?>
    </header>
    <section class="con">
     <div class="user-infos">
        <div class="p-i">
            <img src="<?php echo $user["image"];?>" alt="">
        </div>
        <div class="p-d"><?php echo $user["username"];?></div>
        <div class="p-d"><div class=""><?php echo $user["F_name"]?></div>
        <div class=""><?php echo $user["L_name"]?></div></div>
        <div class="p-d"><?php echo $user["email"]?></div>
        <div class="p-d"><?php 
        $sql="SELECT * FROM `genders` WHERE id=:id";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam("id",$user["gender"]);
        $stmt->execute();
        $gender=$stmt->fetch(PDO::FETCH_ASSOC);
        echo $gender["gender_type"];
        ?></div>
        <div class="update"><a href="updateAdmins.php?id=<?php echo $user["id"];?>"class="update-b">Update</a></div>
     </div>
    </section>
</body>
</html>