<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/comon.css">
    <title>Document</title>
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Add Movie</h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section class="main">
    <?php
    $sql="SELECT * FROM `user` join user_type ON user_type.id=user.type WHERE user_type.type=:type;";
    ?>
    </section>
</body>
</html>