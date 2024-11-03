<?php

$server="localhost";
$db="northwind";
$name="root";
$password="";
try{
$pdo=new PDO("mysql:host=$server;dbname=$db",$name,$password);
}
catch(PDOExeption $err){
    echo $err->getMessage();
    die();
}