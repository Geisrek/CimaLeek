<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CimaLeek</title>
    <link rel="stylesheet" href="styles/comon.css">

    <style>
        .con{
    min-height: 80vh;
    background-color: #333344;
    display: flex;
    width: 100%;
}
.hot{
    border: 3px solid #272744;
    width: 20vw;
    height: 70vh;
}
.hot-i>img{
   height: 70vh;
   width: 20vw;
  
   
}
.dis{
    width:80vw;
    height:70vh;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    gap:10px;
    color:#999999;
    font-family: Georgia, 'Times New Roman', Times, serif;
   
}
    </style>
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
          <a href="./moviesEdit.php" class="hot-i"> <img   src="<?php echo $movie["thumbnail"]?>" alt=""></a>
        </div>
        <div class="dis">
        <h1>Welcome to CimaLeek </h1>
        <p>Your best option to explore your nex movies</p>
        </div>

    </section>
</body>
</html>