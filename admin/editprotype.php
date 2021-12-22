<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$product = new Product;
$manu = new Manufacture;
$type = new Protype;
if (isset($_POST['submit'])) {
    $type_id = $_POST['type_id'];
    $type_name = $_POST['type_name'];
    $type->updateFilepro($type_id, $type_name); 
}
header("location:protypes.php"); 