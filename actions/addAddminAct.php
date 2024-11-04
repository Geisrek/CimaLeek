<?php
require_once("../connection.php");
if(
    (isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["password"])&&isset($_FILES["image"]))&&
(!empty(trim($_POST["name"]))&&!empty(trim($_POST["email"]))&&!empty(trim($_POST["password"]))&&!empty($_FILES["image"]))&&
(!is_numeric($_POST["name"])&&!is_numeric($_POST["email"])&&!is_numeric($_POST["password"]))){
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$image=$_FILES["image"];
$type=1;
$ext=pathinfo($image["name"],PATHINFO_EXTENSION);
   // echo "<br/>...".$ext.",".isset($_POST["title"]).",";
    if(!getimagesize($image["tmp_name"])){
        die("<br/>this size is not an image");
    }
    $targeted_file="uploads/IMG".bin2hex(random_bytes(10)).".".$ext;
    if($image["size"]>1000000){
        die("file too large");
    }
 

    if(move_uploaded_file($image["tmp_name"],"../".$targeted_file)){
        echo "ok";
    }
    else{
        echo "error";
    }
    


$sql="INSERT into user(`name`,`email`,`password`,`image`,`type`) 
values(:name,:email,:password,:image,:type)";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("name",$name,);
$stmt->bindParam("email",$email);
$stmt->bindParam("password",$password);
$stmt->bindParam("image",$targeted_file,PDO::PARAM_LOB);
$stmt->bindParam("type",$type);
$stmt->execute();
header("location:../addAdmins.php");


}