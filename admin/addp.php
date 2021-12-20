<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$type = new Protype;
if(isset($_POST['submit'])){
    $type_name = $_POST['type_name'];
    //them sp vao protype
    $type->addProtype($type_name);
}
header('location:protypes.php');
