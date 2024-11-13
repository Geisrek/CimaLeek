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
    height:70vh;
    overflow:scroll;
}

.b-t>.r-t>th{
    display: flex;
    align-items: center;
    justify-content: space-around;

    border: 1px solid #333355;

}
.d-t{
    display: flex;
    align-items: center;
    justify-content: space-around;
    width: 2vw;
    height:2vh;
   margin: 5px;
   border: 1px solid #6464a7;
   color: #6464a7;
}
.d-d{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60vw;
    height:16vh;
   margin: 5px;
   
}
.drop{
    text-decoration:none;
    width: 100%;
    height:40%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ff6666;
   background-color: #ff6666;
   color: #ffffff;
   border-radius:0.7rem;
}
.drop:hover{
    border: 1px solid #ff6666;
   background-color: #aa9999;
   color: #ff6666;
}
.sale-form{
    position: absolute;
    bottom:10%;
    right:10%;
    position: absolute;
    right: 10%;
    width: 20vw;
}
.b-t::-webkit-scrollbar{
    display: none;
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
         print_r($_SESSION["sale_id"]);
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
        <td class="d-d"><a href="basket.php?index=<?php echo $index?>" class="drop">drop</a></td>
        
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