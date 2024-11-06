<?php
session_start();
require_once("../connection.php");
if(isset($_POST["category"])&& !empty(trim($_POST["category"]))){
    $category=$_POST["category"];

    $sql="insert category(`category_type`) values(:category_type)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("category_type",$category);
    $stmt->execute();
    header("location:../addCategories.php");
 $_SESSION["add_cat"]="category added successfully";
}