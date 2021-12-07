<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$type = new Protype;
if(isset($_GET['type_id'])){
$type->delProtype($_GET['type_id']);
}
header('location:protypes.php');