<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/basket-styles.css">
    <style>
        .b-t{
    display: flex;
    align-items: center;
    justify-content: center;
}
.b-t>tr>th{
    display: flex;
    align-items: center;
    justify-content: space-around;

    border: 1px solid #333355;

}
.b-t>tr>td{
    display: flex;
    align-items: center;
    justify-content: space-around;
    
   margin: 5px;
   border: 1px solid #6464a7;
   color: #6464a7;
}

    </style>
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <?php 
     require_once("connection.php");
     session_start();
     if(!isset($_SESSION["user_type"])){
        die("You are not allow to enter this section");
     }
     $sql="SELECT F_name FROM user WHERE id=:id";
     $stmt=$pdo->prepare($sql);
     $stmt->bindParam("id",$_SESSION["user_id"]);
     $stmt->execute();
     $user=$stmt->fetch(PDO::FETCH_ASSOC);
     
     $sql="SELECT * FROM sales WHERE salesId=:salesId ";
     $stmt=$pdo->prepare($sql);
     $stmt->bindParam("salesId",$_SESSION["sale_id"]);
     $stmt->execute();
     $sale=$stmt->fetch(PDO::FETCH_ASSOC);
       ?>
     <a href="./profile.php" class="back"><h3>Profile</h3></a>
    
    </header>
    <?php
    if(isset($_GET["index"])&&is_numeric($_GET["index"])){
        unset($_SESSION["Sale_details"][$_GET["index"]]);
        $_SESSION["Sale_details"] = array_values($_SESSION["Sale_details"]);
    }
    ?>
    <section class="main">
        <?php
        
        ?>
        <table class="b-t">
         <tr class="r-t">
            <th class="d-t">First name</th>
            <th class="d-t">Movie</th>
            <th class="d-t">MovieID</th>
            <th class="d-t">Quantity</th>
            <th class="d-t">date</th>
         </tr>
         <?php
         $index=0;
         foreach($_SESSION["Sale_details"] as $sale_detales){
        ?>
        <tr class="r-t">
        <td class="d-t"><?php echo $user["F_name"];?></td>
        <td class="d-t" ><?php echo $sale_detales["Title"];?></td>
        <td class="d-t"><?php echo $sale_detales["movie_id"];?></td>
        <td class="d-t"><?php echo $sale_detales["Qty"];?></td>
        <td class="d-t"><?php echo $sale["saleDate"];?></td>
        <td class="d-t"><a href="basket.php?index=<?php echo $index?>" class="drop">drop</a></td>
        
    </tr>
        <?php
        $index++;
         }
         ?>
        </table>
        <form action="./actions/saleAct.php" method="post" class="sale-form">
          <button type="submit">sale</button>
        </form>
    </section>
</body>
</html>