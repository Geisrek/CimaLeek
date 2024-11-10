<?php
session_start();
require_once("../connection.php");
if(isset($_POST["email"])&&isset($_POST["password"])){
    $sql="SELECT * FROM user WHERE email=:email";
    $stmt=$pdo->prepare($sql);
    
    $stmt->bindParam("email",$_POST["email"]);
    $stmt->execute();
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
    print_r($user);
    if(!$user){
        header("location:../register.php");
    }
    if(password_verify($_POST["password"],$user["password"])){
        
    if($user["type"]==1){
        $_SESSION["user_type"]=$user["type"];
        header("location:../dashboard.php");
    }
    elseif($user["type"]==2){
       
        $_SESSION["user_type"]=$user["type"];
        header("location:../moviesEdit.php");
        die("ok");
    }
}

else{
    header("location:../signin.php");
}
}