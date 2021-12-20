
<?php
require "config.php";
require "models/db.php";
require "models/manufacture.php";
$manu = new Manufacture;
require "models/product.php";
$product = new Product;
$getAllProducts = $product->getAllProducts();
if(isset($_GET['id'])){
    $tam = 0;
    $_GET['id'] = (int)$_GET['id'];
    foreach($getAllProducts as $value){
        if($value['manu_id'] == $_GET['id']){
            $tam = $value['manu_id'];
        }
    }
    if ($tam == 0) {
        $manu->delManufacture($_GET['id']);
    }
}
header('location:manufactures.php');
?>       