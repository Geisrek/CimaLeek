<?php
require_once("../connection.php");
if((isset($_POST["title"])&&isset($_POST["Product_year"])&&isset($_POST["Unit_price"])&&isset($_POST["quantity"])&&isset($_FILES["thumbnail"]))&&
(is_string(trim($_POST["title"])))&&
(is_numeric($_POST["Product_year"])&&is_numeric($_POST["quantity"]))){

    $title=$_POST["title"];
    $product_year=$_POST["Product_year"];
    $unit_price=$_POST["Unit_price"];
    $quantity=$_POST["quantity"];
    $director=$_POST["director"];
    $thumbnail=$_FILES["thumbnail"];
    $ext=pathinfo($image["name"],PATHINFO_EXTENSION);
   // echo "<br/>...".$ext.",".isset($_POST["title"]).",";
    if(!getimagesize($thumbnail["tmp_name"])){
        die("<br/>this size is not an image");
    }
    $targeted_file="uploads/IMG".bin2hex(random_bytes(10)).".".$ext;
    if($image["size"]>1000000){
        die("file too large");
    }
 

    if(move_uploaded_file($thumbnail["tmp_name"],"../".$targeted_file)){
        echo "ok->";
    }
    else{
        echo "error";
    }
    $sql=""
}