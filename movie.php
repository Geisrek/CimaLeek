<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link rel="stylesheet" href="styles/movie-style.css">
    <link rel="stylesheet" href="styles/comon.css">
</head>
<body>
    <?php
    session_start();
    require_once("connection.php");
    $sql="SELECT * FROM `movies` WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$_GET["id"]);
    $stmt->execute();
    $movie=$stmt->fetch(PDO::FETCH_ASSOC);

    $sql="SELECT * FROM `director` WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$movie["director_id"]);
    $stmt->execute();
    $director=$stmt->fetch(PDO::FETCH_ASSOC);

    $sql="SELECT * FROM `category` WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$movie["category_id"]);
    $stmt->execute();
    $category=$stmt->fetch(PDO::FETCH_ASSOC);
    
    ?>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""><?php echo $movie["Title"]." ";?>movie<h3></h3></div>
     <?php if($_SESSION["user_type"]==1){?>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
     <?php }
     elseif($_SESSION["user_type"]==2){?>
     <a href="./profile.php" class="back"><h3>Profile </h3></a>
     <h3><?php echo "<div style='width:10px;'>  </div>";?></h3>
     <a href="./moviesEdit.php" class="back"><h3>Movies</h3></a>
     <?php }?>
    </header>
    <section class="movie-con">
    <section class="movie-th">
     <img src="<?php echo $movie["thumbnail"]?>" alt="" srcset="">
    </section>
    <section class="movie-inf">
      <h5 class="inf-i"><?php echo $movie["Title"];?></h5>
      <h5 class="inf-i"><?php echo $movie["product_year"];?></h5>
      <h5 class="inf-i"><?php echo $movie["unit_price"];?></h5>
      <h5 class="inf-i"><?php echo $movie["quantity"];?></h5>
      <h5 class="inf-i"><?php echo $director["name"];?></h5>
      <h5 class="inf-i"><?php echo $category["category_type"];?></h5>
      <div class="inf-i button-con">
      <?php 
      if($_SESSION["user_type"]==1){
      ?>
      <a href="./actions/deleteMoviesAct.php?id=<?php echo $_GET["id"];?>" class=" delete">delete</a><a href="updateMovies.php?id=<?php echo $_GET["id"];?>&Title=<?php echo $movie["Title"];?>&product_year=<?php echo $movie["product_year"];?>&quantity=<?php echo $movie["quantity"];?>&director_id=<?php echo $movie["director_id"];?>&unit_price=<?php echo $movie["unit_price"];?>&thumbnail=<?php echo $movie["thumbnail"];?>&category_type=<?php echo $movie["category_id"];?>" class=" update">update</a>
      <?php
      }
      elseif($_SESSION["user_type"]==2){
        ?>
        <a href="./actions/addToCartAct.php?id=<?php echo $_GET["id"];?>" class=" add-cart">add to cart</a>
        <?php
      }
      ?>
      </div>
    </section>
    </section>
</body>
</html>