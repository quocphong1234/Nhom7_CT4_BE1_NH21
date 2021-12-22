<?php
include "method.php";
if (isset($_POST['submit'])) {
    $manu_id = $_POST['manu_id'];
    $manu_name = $_POST['manu_name'];
    $manu->updateFile($manu_id, $manu_name);
    
}
header("location:manufactures.php");