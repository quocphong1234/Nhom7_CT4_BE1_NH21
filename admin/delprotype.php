<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$type = new Protype;
require "models/product.php";
$product = new Product;
$getAllProducts = $product->getAllProducts();
if(isset($_GET['id'])){
    $tam = 0;
    $_GET['id'] = (int)$_GET['id'];
    foreach($getAllProducts as $value){
        if($value['type_id'] == $_GET['id']){
            $tam = $value['type_id'];
        }
    }
    if ($tam == 0) {
        $type->delProtype($_GET['id']);
    }
}
header('location:protypes.php');
?>       