<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
//Xu ly them:
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $image = $_FILES['image']['name'];
   
  
   
    $product->EditProduct( $name, $manu_id, $type_id, $price, $image, $desc);
    //Upload hinh:
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    var_dump($imageFileType);
    if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) {
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    }else{
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    
}
header('location:products.php');
?>