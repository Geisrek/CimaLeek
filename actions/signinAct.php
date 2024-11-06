<?php
require_once("../connection.php");
if(isset($_POST["email"])&&isset($_POST["password"])){
    echo "ok";
    $sql="SELECT * FROM user WHERE email=:email";
    $stmt=$pdo->prepare($sql);
    
    $stmt->bindParam("password",$_POST["password"]);
    $stmt->execute();
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
    print_r($user);
    if($user){
    if(password_verify($_POST["password"],$user["password"])){
    if($user["type"]==1){
        header("location:../dashboard.php");
    }
    else{
        echo " client";
    }}
}
else{
    header("location:../signin.php");
}
}