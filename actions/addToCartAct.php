<?php
require_once("../connection.php");
session_start();
if(isset($_POST["user_id"])&&isset($_POST["movie_id"])&&isset($_POST["Qty"])
&&is_numeric($_POST["user_id"])&&is_numeric($_POST["movie_id"])&&is_numeric($_POST["Qty"])){
if(!isset($_SESSION["sale_id"])){
$timestampe=date("Y-m-d H:i:s");
$opened=1;
echo $_POST["user_id"]."</br>";
$sql="INSERT into sales(`clientId`,`saleDate`,`opened`) values(:clientId,:saleDate,:opened)";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("clientId",$_POST["user_id"]);
$stmt->bindParam("saleDate",$timestampe);
$stmt->bindParam("opened",$opened);
$stmt->execute();
$sql="SELECT salesId FROM sales WHERE clientId=:clientId AND opened=1";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("clientId",$_POST["user_id"]);
$stmt->execute();
$sale=$stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION["sale_id"]=$sale;
}

echo "done";
$_SESSION["Sale_details"][]=["user_id"=>$_POST["user_id"],"movie_id"=>$_POST["movie_id"],"Qty"=>$_POST["Qty"]];
header("location:../movie.php?id=".$_POST["movie_id"]."");



}