<?php
require_once("../connection.php");
if(isset($_POST["id"])&&isset($_POST["category_type"])){
$sql="UPDATE category set id=:id , category_type=:category_type WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("id",$_POST["id"]);
$stmt->bindParam("category_type",$_POST["category_type"]);
$stmt->execute();
header("location:../categoriesEdit.php");
}