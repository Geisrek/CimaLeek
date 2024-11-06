<?php
require_once("../connection.php");
if(isset($_POST["director_name"])&&isset($_POST["genders"])&& !empty(trim($_POST["director_name"]))){
    $director_name=$_POST["director_name"];
    $gender=$_POST["genders"];
    $sql="INSERT INTO director(`name`,`gender_id`) values(:name,:gender_id)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("name",$director_name);
    $stmt->bindParam("gender_id",$gender);
    $stmt->execute();
  
    header("location:../addDirectors.php");

}