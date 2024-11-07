<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/comon.css">
    <?php
    require_once("connection.php");
    ?>
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Add Movie</h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section class="m-e">
       <?php
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
       ?>
    </section>
</body>
</html>