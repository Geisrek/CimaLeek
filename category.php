<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update <?php echo $_GET["category_type"]?></title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styes/categoriesEdit-style.css">
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <?php
     
     ?>
     <div class=""> <h3>Update <?php echo $_GET["category_type"]?></h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <setion class="main">
        <form action="actions/updateCategoriesAct.php" class="re-f" method="post">
        <div class="re-i">
            
            <input type="hidden" name="id" value=<?php echo $_GET["id"];?>>
        </div>
        <div class="re-i">
            <lab>Category type</lab>
            <input type="text" name="category_type" value=<?php echo $_GET["category_type"];?>>
        </div>
        <div class="re-i">
            <button type="submit">Submit</button>
        </div>
        </form>
    </setion>
</body>
</html>