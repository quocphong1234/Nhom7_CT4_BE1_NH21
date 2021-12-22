<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$product = new Product;
$manu = new Manufacture;
$type = new Protype;
$ex = array('jpg','png','jpeg');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $desc = $_POST['des'];
    $feature = $_POST['feature'];
    $sale = $_POST['sale'];
    $id = $_POST['id'];
    $file_type = strtolower(pathinfo($image,PATHINFO_EXTENSION));
    if ($image != null) {
        if (in_array($file_type,$ex)) {
                $product->updateFile($name, $manu_id, $type_id, $price, $image, $desc, $feature, $sale, $id);
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);   
                header("location:edit-product.php?id=" . $_POST['id']);       
        } else {
           header("location:edit-product.php?check=false&id=" . $_POST['id']);
        }
    } else {
        $product->updateFileNoImage($name, $manu_id, $type_id, $price, $desc, $feature, $sale, $id);
        header("location:edit-product.php?id=" . $_POST['id']);
    }
}
?>