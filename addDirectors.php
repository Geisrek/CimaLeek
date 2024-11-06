<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Actors</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/addActors-styles.css">
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Add Directors</h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section class="main">
    <form action="actions/addDirectorsAct.php" method="post" class="re-f"  enctype="multipart/form-data">
        <div class="re-i">
            <lab>Actor name</lab>
            <input type="text" name="director_name">
        </div>
        <div class="re-i">
            <div class="re-o">
                
                <div>
                <?php
                require_once("connection.php");
                $sql="SELECT * FROM genders";
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
                $genders=$stmt->fetchAll(PDO::FETCH_ASSOC);
                if(!$genders){
                    echo "countries table not vonnected";
                }
                else{
                    ?>
                    <select name="genders" id="genders">
                        <?php
                        foreach($genders as $gender){
                           
                            ?>
                            <option value="<?php echo $gender["id"];?>"><?php echo $gender["gender_type"];?></option>
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
           <button type="submit">Sign up</button>
        </div>
       </form>
    </section>
</body>
</html>