<?php
require_once("../connection.php");
if(isset($_POST["email"])&&isset($_POST["password"])){
    echo "ok";
    $sql="SELECT * FROM user WHERE email=:email AND password=:password";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("email",$_POST["email"]);
    $stmt->bindParam("password",$_POST["password"]);
    $stmt->execute();
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
    print_r($user);
    if($user){
    if($user["type"]==1){
        header("location:../dashboard.php");
    }
    else{
        echo " client";
    }
}
else{
    header("location:../signin.php");
}
}