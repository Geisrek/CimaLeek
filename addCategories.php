<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admins</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/addAdmin-styles.css">
    <?php
   session_start();
    ?>
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Add Admins</h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section class="main">
    <form action="actions/addCategoriesAct.php" method="post" class="re-f"  enctype="multipart/form-data">
        <div class="re-i">
            <lab>Category name</lab>
            <input type="text" name="category">
        </div>
       
        <div class="re-i">
           <button type="submit">Sign up</button>
        </div>
        <?php
    if(isset($_SESSION["add_cat"])){
        ?>
        <h5 style="color:#557799;"><?php echo $_SESSION["add_cat"];?></h5>
        <?php
        unset($_SESSION["add_cat"]);
    }
    ?>
       </form>
      
    </section>
   
</body>
</html>