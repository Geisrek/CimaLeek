<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admins</title>
    <link rel="stylesheet" href="styles/comon.css">
    <?php
    session_start();
    ?>
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Add Movie</h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section class="main">
    <form action="actions/addMoviesAct.php" method="post" class="re-f"  enctype="multipart/form-data">
        <div class="re-i">
            <lab>Title</lab>
            <input type="text" name="title">
        </div>
        <div class="re-i">
            <lab>Product year</lab>
            <input type="text" name="Product_year">
        </div>
        <div class="re-i">
            <lab>Unit price</lab>
            <input type="text" name="Unit_price">
        </div>
        <div class="re-i">
            <lab>Quantity</lab>
            <input type="text" name="quantity">
        </div>
        <div class="re-i">
            <lab>Movie thumbnail</lab>
            <input type="file" name="thumbnail">
        </div>
        <div class="re-i">
            <div class="re-o">
                
                
                <div>
                <?php
                require_once("connection.php");
                $sql="SELECT * FROM director";
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
                $directors=$stmt->fetchAll(PDO::FETCH_ASSOC);
                if(! $directors){
                    echo " directors table not connected";
                }
                else{
                    ?>
                    <select name="directors" id=" directors">
                        <?php
                        foreach( $directors as  $director){
                           
                            ?>
                            <option value="<?php echo  $director["id"];?>"><?php echo  $director["name"];?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <?php
                }
                ?>
                </div>
                <div>
                <?php
                require_once("connection.php");
                $sql="SELECT * FROM category";
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
                $categories=$stmt->fetchAll(PDO::FETCH_ASSOC);
                if(! $categories){
                    echo " categories table not connected";
                }
                else{
                    ?>
                    <select name="categories" id=" categories">
                        <?php
                        foreach( $categories as  $category){
                           
                            ?>
                            <option value="<?php echo  $category["id"];?>"><?php echo  $category["category_type"];?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <?php
                }
                ?>
                </div>
            
        </div>
        <div class="re-i">
           <button type="submit">Submit</button>
        </div>
        <?php
        if(isset($_SESSION["movie_message"])){
        echo "<h5 style='color:#557799;'>". $_SESSION["movie_message"]."</h5>";
        unset($_SESSION["movie_message"]);
    }
        ?>
       </form>
    </section>
</body>
</html>