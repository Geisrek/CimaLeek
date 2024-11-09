<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/comon.css">

    <link rel="stylesheet" href="styles/adminsupdate-styles.css">
    <title>Admins Edit</title>
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Admins Edit</h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section class="main">
    <?php
    require_once("connection.php");
    $sql="SELECT * FROM `user` join user_type ON user_type.type_id=user.type WHERE user_type.type='Admin'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $admins=$stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table class="ad-d">
        <tr>
            <th>
                username
            </th>
            <th>
                First name
            </th>
            <th>
               Last name
            </th>
            <th>
                email
            </th>
            <th>
                image
            </th>
            
        </tr>
        <?php
      
        foreach($admins as $admin){
            
            ?>
            <tr styles="">
                <td><?php echo $admin["username"];?></td>
                <td><?php echo $admin["F_name"];?></td>
                <td><?php echo $admin["L_name"];?></td>
                <td><?php echo $admin["email"];?></td>
                <td><img src="<?php echo $admin["image"];?>" style="width:100px; height=100px" alt="<?php echo $admin["username"];?> profile"></td>
                <td><a href="./actions/deleteAdminsAct.php?id=<?php echo $admin["id"];?>" class="delete">Delete</a></td>
                <td><a href="./updateAdmins.php?id=<?php echo $admin["id"];?>" class="update">Update</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
    ?>
    </section>
</body>
</html>