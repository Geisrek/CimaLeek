<?php

require_once("../connection.php");
session_start();
$New_quantities=[];
$sql="SELECT id,quantity FROM movies WHERE id=:id";
$stmt=$pdo->prepare($sql);
foreach($_SESSION["Sale_details"] as $detail){
 $stmt->bindParam("id",$detail["movie_id"]);
 $stmt->execute();
 $movie=$stmt->fetch(PDO::FETCH_ASSOC);
 $quy=$movie["quantity"]-($movie["quantity"]-$detail["Qty"]);
 $New_quantities[]=["movie_id"=>$detail["movie_id"],"quantity"=>$quy];
 sleep(0.25);
}

$sql = "UPDATE movies set quantity=:quantity WHERE id=:id ";
$stmt=$pdo->prepare($sql);
foreach($New_quantities as $nq){
 $stmt->bindParam("id",$nq["movie_id"]);
 $stmt->bindParam("quantity",$nq["quantity"]);
 $stmt->execute();
}
$sql = "UPDATE sales set opened=0 WHERE salesId=:salesId ";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("salesId",$_SESSION["sale_id"]);
$stmt->execute();

$sql="INSERT into saledetales(`SaleId`,`MovieId`,`QTY`) values(:SaleId,:MovieId,:QTY)";
$stmt=$pdo->prepare($sql);

foreach($New_quantities as $qy){
$stmt->bindParam("SaleId",$_SESSION["sale_id"]);
$stmt->bindParam("MovieId",$qy["movie_id"]);
$stmt->bindParam("QTY",$qy["quantity"]);
$stmt->execute();
}
unset($_SESSION["Sale_details"]);
unset($_SESSION["sale_id"]);
header("location:../profile.php");