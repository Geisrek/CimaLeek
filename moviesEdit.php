<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/updateMovies-style.css">
    <?php
    require_once("connection.php");
    session_start();
    ?>
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Add Movie</h3></div>
     <?php if($_SESSION["user_type"]==1){?>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
     <?php }
     elseif($_SESSION["user_type"]==2){?>
     <a href="./profile.php" class="back"><h3>Profile</h3></a>
     <?php }
     else{
        ?>
     <a href="./profile.php" class="back"><h3>Login</h3></a>
        <?php
     }
     ?>
     
    </header>
    <section class="main">
   <div class="uf-t">
    <h4>Display method</h4>
    <br/>
    <h5>By director</h5>
    <div class="directors">
    <?php
    $sql="SELECT * FROM director";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $directors=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($directors as $director){
        ?>
        <a href="./moviesEdit.php?director_id=<?php echo $director["id"];?>"><h6><?php echo $director["name"];?></h6></a>
        <?php
    }
    ?>
    </div>
    <h5>By categories</h5>
    <div class="categories">
    <?php
    $sql="SELECT * FROM category";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $categories=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($categories as $category){
        ?>
        <a href="./moviesEdit.php?category_id=<?php echo $category["id"];?>"><h6><?php echo $category["category_type"];?></h6></a>
        <?php
    }
    ?>
    </div>
    <div class="categories">
        <a href="moviesEdit.php"><h4>All</h4></a>
    </div>
   </div>
    <div class="um-e">
       <?php
       if(isset($_GET["director_id"])){
        $sql="SELECT id,Title,thumbnail FROM movies WHERE director_id=:director_id";
       $stmt=$pdo->prepare($sql);
       $stmt->bindParam("director_id",$_GET["director_id"]);
       $stmt->execute();
       $movies=$stmt->fetchAll(PDO::FETCH_ASSOC);
       if(!$movies){
        echo "No movies to display";
       }
       else{
        foreach($movies as $movie){
            ?>
             <a href="movie.php?id=<?php echo $movie["id"];?>" class="card">
            <img src="<?php echo $movie["thumbnail"];?>" alt="">
            <h5><?php echo $movie["Title"];?></h5>
        </a>
            <?php
        }
       }
       }
       elseif(isset($_GET["category_id"])){
        $sql="SELECT id,Title,thumbnail FROM movies WHERE category_id=:category_id";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam("category_id",$_GET["category_id"]);
        $stmt->execute();
        $movies=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$movies){
         echo "No movies to display";
        }
        else{
         foreach($movies as $movie){
             ?>
              <a href="movie.php?id=<?php echo $movie["id"];?>" class="card">
             <img src="<?php echo $movie["thumbnail"];?>" alt="">
             <h5><?php echo $movie["Title"];?></h5>
         </a>
             <?php
         }
        }
       }
    else{
       $sql="SELECT id,Title,thumbnail FROM movies";
       $stmt=$pdo->prepare($sql);
       $stmt->execute();
       $movies=$stmt->fetchAll(PDO::FETCH_ASSOC);
       if(!$movies){
        echo "No movies to display";
       }
       
       else{
        foreach($movies as $movie){
            ?>
             <a href="movie.php?id=<?php echo $movie["id"];?>" class="card">
            <img src="<?php echo $movie["thumbnail"];?>" alt="">
            <h5><?php echo $movie["Title"];?></h5>
        </a>
            <?php
        }
       }
    }
       ?>
    </div>
    </section>
</body>
</html>