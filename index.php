<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CimaLeek</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/index-styles.css">
</head>
<body>
<header >
     <div><h1>CimaLeek</h1></div>
    
     <a href="./signin.php" class="back"><h3>Login</h3></a>
     
     <h3><?php echo "<div style='width:20px;'>  </div>";?></h3>
     <a href="./register.php" class="back"><h3>Signup</h3></a>
     
     
    </header>
    <section class="con">
        
        <div class="hot">
         <?php
         require_once("connection.php");
         require_once("styles/styles.php");
        $sql="  SELECT MovieID, SUM(QTY) AS total_quantity_sold
                FROM saledetales
                GROUP BY MovieID
                ORDER BY total_quantity_sold DESC
                LIMIT 1";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $sale=$stmt->fetch(PDO::FETCH_ASSOC);
       
        $sql="SELECT * FROM movies WHERE id=:id";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam("id",$sale["MovieID"]);
        $stmt->execute();
        $movie=$stmt->fetch(PDO::FETCH_ASSOC);
       
           ?>
          <a href="./moviesEdit.php" class="hot-i"> <img  style="height: 100%;width: 100%;" src="<?php echo $movie["thumbnail"]?>" alt=""></a>
        </div>
        <div class="dis">

        </div>

    </section>
</body>
</html>