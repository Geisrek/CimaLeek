<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>

    <header>
      <h1>CimaLeek</h1>
    </header>
    <section class="re-b">
       <form action="actions/registerAct.php" method="post" class="re-f"  enctype="multipart/form-data">
        <div class="re-i">
            <lab>User name</lab>
            <input type="text" name="username">
        </div>
        <div class="re-i">
            <lab>First name</lab>
            <input type="text" name="F_name">
        </div>
        <div class="re-i">
            <lab>Last name</lab>
            <input type="text" name="L_name">
        </div>
        <div class="re-i">
            <lab>Email</lab>
            <input type="text" name="email">
        </div>
        <div class="re-i">
            <lab>Address</lab>
            <input type="text" name="address">
        </div>
        <div class="re-i">
            <lab>Password</lab>
            <input type="text" name="password">
        </div>
        <div class="re-i">
            <lab>Profile image</lab>
            <input type="file" name="image">
        </div>
        <div class="re-i">
            <div class="re-o">
                <div>
                <?php
                require_once("connection.php");
                $sql="SELECT * FROM countries";
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
                $countries=$stmt->fetchAll(PDO::FETCH_ASSOC);
                if(!$countries){
                    echo "countries table not vonnected";
                }
                else{
                    ?>
                    <select name="countries" id="countries">
                        <?php
                        foreach($countries as $country){
                           
                            ?>
                            <option value="<?php echo $country["id"];?>"><?php echo $country["country_name"];?></option>
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