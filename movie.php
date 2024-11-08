<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link rel="stylesheet" href="./styles/movie-styles.css">
    <link rel="stylesheet" href="styles/comon.css">
</head>
<body>
    <?php
    require_once("connection.php");
    $sql="SELECT * FROM `movies` WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$_GET["id"]);
    $stmt->execute();
    $movie=$stmt->fetch(PDO::FETCH_ASSOC);
    
    ?>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""><?php echo $movie["Title"]." ";?>movie<h3></h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section>
    <section class="movie-th">

    </section>
    <section class="movie-inf">
        
    </section>
    </section>
</body>
</html>