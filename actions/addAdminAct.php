<?php
require_once("../connection.php");
print_r($_POST["countries"]);
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
        echo "ok->".$_POST["countries"];
    }
    else{
        echo "error";
    }
    
$sql="SELECT * countries";
$stmt=$pdo->prepare($sql);
$coun=$stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($coun);

$sql="INSERT into user(`username`,`F_name`,`L_name`,`country`,`gender`,`address`,`email`,`password`,`image`,`type`) 
values(:username,:F_name,:L_name,:gender,:country,:address,:email,:password,:image,:type)";
$stmt=$pdo->prepare($sql);
$stmt->bindParam("username",$username);
$stmt->bindParam("F_name",$F_name);
$stmt->bindParam("L_name",$L_name);
$stmt->bindParam("address",$address);
$stmt->bindParam("country",$country);
$stmt->bindParam("gender",$gender);
$stmt->bindParam("email",$email);
$stmt->bindParam("password",$hashed_password);
$stmt->bindParam("image",$targeted_file,PDO::PARAM_LOB);
$stmt->bindParam("type",$type);
$stmt->execute();
header("location:../addAdmins.php");


}
else{
    print_r($_POST);
    echo "<br/>".    (isset($_POST["username"])&&isset($_POST["address"])&&isset($_POST["F_name"])&&isset($_POST["L_name"])&&isset($_POST["genders"])&&isset($_POST["countries"])&&isset($_POST["email"])&&isset($_POST["password"])&&isset($_FILES["image"]));
    echo "<br/>".(!empty(trim($_POST["username"]))&&!empty(trim($_POST["F_name"]))&&!empty(trim($_POST["L_name"]))&&!empty(trim($_POST["email"]))&&!empty(trim($_POST["password"]))&&!empty($_FILES["image"]));
    
}