<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
$type = new Protype;
$product = new Product;
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $image = $_FILES['image']['name'];
    //them sp vao product
    $product->addProduct($name,$manu_id,$type_id,$price,$image,$desc);
    //up hinh
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
if(isset($_POST['submit'])){
    $type_id = $_POST['type_id'];
    $type_name = $_POST['type_name'];
    //them sp vao protype
    $type->addProtype($type_id,$type_name);
}
header('location:products.php','location:protypes.php');
