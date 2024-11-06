<?php
require_once("../connection.php");
if(isset($_POST["actor_name"])&&isset($_POST["genders"])&& !empty(trim($_POST["actor_name"]))){
    $actor_name=$_POST["actor_name"];
    $gender=$_POST["genders"];
    $sql="INSERT INTO actors(`name`,`gender_id`) values(:name,:gender_id)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("name",$actor_name);
    $stmt->bindParam("gender_id",$gender);
    $stmt->execute();
  
    header("location:../addActors.php");

}