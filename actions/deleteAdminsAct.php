<?php
session_start();
require_once("../connection.php");
if(isset($_GET["id"])&&is_numeric($_GET["id"])){
$id=$_GET["id"];
$sql="DELETE FROM user WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("id",$id);
$stmt->execute();
header("location:../adminsEdit.php");
}
else{
    $_SESSION["delete_error"]="Something went no id given wrong!";
    header("location:../dashboard.php");
}
