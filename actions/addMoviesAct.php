<?php
require_once("../connection.php");
session_start();
if((isset($_POST["title"])&&isset($_POST["Product_year"])&&isset($_POST["Unit_price"])&&isset($_POST["quantity"])&&isset($_FILES["thumbnail"]))&&
(is_string(trim($_POST["title"])))&&
(is_numeric($_POST["Product_year"])&&is_numeric($_POST["quantity"]))){

    $title=$_POST["title"];
    $product_year=$_POST["Product_year"];
    $unit_price=$_POST["Unit_price"];
    $quantity=$_POST["quantity"];
    $director=$_POST["directors"];
    $thumbnail=$_FILES["thumbnail"];
    $category=$_POST["categories"];
    print_r($_POST);
    $ext=pathinfo($thumbnail["name"],PATHINFO_EXTENSION);
   // echo "<br/>...".$ext.",".isset($_POST["title"]).",";
    if(!getimagesize($thumbnail["tmp_name"])){
        die("<br/>this size is not an image");
    }
    $targeted_file="uploads/IMG".bin2hex(random_bytes(10)).".".$ext;
    if($thumbnail["size"]>1000000){
        die("file too large");
    }
 

    if(move_uploaded_file($thumbnail["tmp_name"],"../".$targeted_file)){
        echo "ok->";
    }
    else{
        echo "error";
    }
    $sql="insert into movies(`Title`,`product_year`,`unit_price`,`quantity`,`director_id`,`thumbnail`,`category_id`)  
    values(:Title,:product_year,:unit_price,:quantity,:director_id,:thumbnail,:category_id)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("Title",$title);
    $stmt->bindParam("product_year",$product_year);
    $stmt->bindParam("unit_price",$unit_price);
    $stmt->bindParam("quantity",$quantity);
    $stmt->bindParam("director_id",$director);
    $stmt->bindParam("thumbnail",$targeted_file);
    $stmt->bindParam("category_id",$category);
    $stmt->execute();
    
    $_SESSION["movie_message"]="Movie added successfully";
    header("location:../addMovies.php");
}