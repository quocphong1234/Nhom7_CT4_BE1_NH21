<?php
require "config.php";
require "models/db.php";
require "models/manufacture.php";
$manu = new Manufacture;
if(isset($_POST['submit'])){
    $manu_name = $_POST['manu_name'];
    //them sp vao manufactures
    $manu->addManufacture($manu_name);
}
header('location:manufactures.php');
