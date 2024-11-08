<?php
session_start();
require_once("../connection.php");
if(isset($_POST["id"])&&isset($_POST["title"])&&isset($_POST["product_year"])&&is_numeric($_POST["product_year"])&&
isset($_POST["quantity"])&&is_numeric($_POST["quantity"])&&isset($_POST["unit_price"])&&is_numeric($_POST["unit_price"])){
    $id=$_POST["id"];
    $title=$_POST["title"];
    $product_year=$_POST["product_year"];
    $quantity=$_POST["quantity"];
    $unit_price=$_POST["unit_price"];
    $director_id=$_POST["director_id"];
    $category_type=$_POST["category_type"];
    
   if(isset($_FILES["thumbnail"])&& $_FILES["thumbnail"]["error"] == UPLOAD_ERR_OK){

    $thumbnail=$_FILES["thumbnail"];
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
    $sql="UPDATE movies
    set id=:id ,Title=:Title, product_year=:product_year,unit_price=:unit_price,quantity=:quantity,director_id=:director_id,thumbnail=:thumbnail
     WHERE id=:id ";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$id);
    $stmt->bindParam("Title",$title);
    $stmt->bindParam("product_year",$product_year);
    $stmt->bindParam("unit_price",$unit_price);
    $stmt->bindParam("quantity",$quantity);
    $stmt->bindParam("director_id",$director_id);
    $stmt->bindParam("thumbnail",$targeted_file);
    $stmt->bindParam("category_id",$category_type);
    $stmt->execute();
    header("location:../moviesEdit.php");
   }
   else{
    $sql="UPDATE movies
    set id=:id ,Title=:Title, product_year=:product_year,unit_price=:unit_price,quantity=:quantity,director_id=:director_id
     WHERE id=:id ";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam("id",$id);
    $stmt->bindParam("Title",$title);
    $stmt->bindParam("product_year",$product_year);
    $stmt->bindParam("unit_price",$unit_price);
    $stmt->bindParam("quantity",$quantity);
    $stmt->bindParam("director_id",$director_id);
    $stmt->bindParam("category_id",$category_type);
    $stmt->execute();
    header("location:../moviesEdit.php");
   }
    
}
