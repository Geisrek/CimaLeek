<?php
session_start();
require_once("../connection.php");
if(isset($_POST["id"])&&isset($_POST["username"])&&isset($_POST["F_name"])&&
isset($_POST["L_name"])&&isset($_POST["email"])){
    $id=$_POST["id"];
    $username=$_POST["username"];
    $F_name=$_POST["F_name"];
    $L_name=$_POST["L_name"];
    $email=$_POST["email"];
    $gender=$_POST["gender_type"];
    $address=$_POST["address"];
    
   if(isset($_FILES["image"])&& $_FILES["image"]["error"] == UPLOAD_ERR_OK){

    $image=$_FILES["image"];
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
        echo "ok->";
    }
    else{
        echo "error";
    }
    $sql="UPDATE user
    set id=:id ,username=:username, F_name=:F_name,L_name=:L_name,email=:email,gender=:gender,image=:image
     WHERE id=:id ";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$id);
    $stmt->bindParam("username",$username);
    $stmt->bindParam("F_name",$F_name);
    $stmt->bindParam("L_name",$L_name);
    $stmt->bindParam("email",$email);
    $stmt->bindParam("gender",$gender);
    $stmt->bindParam("image",$image);
   
    $stmt->execute();
    if($_SESSION["user_type"]==1){
        header("location:../adminsEdit.php");
    }
    elseif($_SESSION["user_type"]==2){
        header("location:../profile.php");
    }
   }
   else{
    $sql="UPDATE user
    set id=:id ,username=:username, F_name=:F_name,L_name=:L_name,email=:email,gender=:gender
     WHERE id=:id ";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$id);
    $stmt->bindParam("username",$username);
    $stmt->bindParam("F_name",$F_name);
    $stmt->bindParam("L_name",$L_name);
    $stmt->bindParam("email",$email);
    $stmt->bindParam("gender",$gender);
    $stmt->execute();
    if($_SESSION["user_type"]==1){
    header("location:../adminsEdit.php");
}
elseif($_SESSION["user_type"]==2){
    header("location:../profile.php");
}
   }
    
}
