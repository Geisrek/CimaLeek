<?php
require_once("../connection.php");
if(
    (isset($_POST["username"])&&isset($_POST["address"])&&isset($_POST["F_name"])&&isset($_POST["L_name"])&&isset($_POST["genders"])&&isset($_POST["countries"])&&isset($_POST["email"])&&isset($_POST["password"])&&isset($_FILES["image"]))&&
(!empty(trim($_POST["username"]))&&!empty(trim($_POST["F_name"]))&&!empty(trim($_POST["L_name"]))&&!empty(trim($_POST["email"]))&&!empty(trim($_POST["password"]))&&!empty($_FILES["image"]))
){
$username=$_POST["username"];
$F_name=$_POST["F_name"];
$L_name=$_POST["L_name"];
$country=$_POST["countries"];
$gender=$_POST["genders"];
$address=$_POST["address"];
$email=$_POST["email"];
$password=$_POST["password"];
$image=$_FILES["image"];
$hashed_password=password_hash($password,PASSWORD_BCRYPT);
$type=2;
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
    


$sql="INSERT into user(`username`,`F_name`,`L_name`,`country`,`gender`,`address`,`email`,`password`,`image`,`type`) 
values(:username,:F_name,:L_name,:gender,:country,:address,:email,:password,:image,:type)";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("username",$username);
$stmt->bindParam("F_name",$F_name);
$stmt->bindParam("L_name",$L_name);
$stmt->bindParam("address",$address);
$stmt->bindParam("country",$country);
$stmt->bindParam("gender",$gender,);
$stmt->bindParam("email",$email);
$stmt->bindParam("password",$hashed_password);
$stmt->bindParam("image",$targeted_file,PDO::PARAM_LOB);
$stmt->bindParam("type",$type);
$stmt->execute();
if($type==1){
    $_SESSION["user_type"]=$user["type"];
    $_SESSION["user_id"]=$user["id"];
    header("location:../dashboard.php");
}
elseif($type==2){
   
    $_SESSION["user_type"]=$user["type"];
    $_SESSION["user_id"]=$user["id"];
    header("location:../moviesEdit.php");
    die("ok");
}
}
else{
    print_r($_POST);
    echo "<br/>".    (isset($_POST["username"])&&isset($_POST["address"])&&isset($_POST["F_name"])&&isset($_POST["L_name"])&&isset($_POST["genders"])&&isset($_POST["countries"])&&isset($_POST["email"])&&isset($_POST["password"])&&isset($_FILES["image"]));
    echo "<br/>".(!empty(trim($_POST["username"]))&&!empty(trim($_POST["F_name"]))&&!empty(trim($_POST["L_name"]))&&!empty(trim($_POST["email"]))&&!empty(trim($_POST["password"]))&&!empty($_FILES["image"]));
    
}