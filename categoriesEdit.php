<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Categories</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/categoriesEdit-styles.css">
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Update Categories</h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section class="main">
    <?php
    require_once("connection.php");
    $sql="SELECT * FROM category";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $categories=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($categories as $category){
        ?>
        <a href="category.php?id=<?php echo $category["id"];?>&category_type=<?php echo $category["category_type"];?>" class="cat-l"><?php echo $category["category_type"];?></a>
        <?php
    }
    ?>
    </section>
 
</body>
</html>