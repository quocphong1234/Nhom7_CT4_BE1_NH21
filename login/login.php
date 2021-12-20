<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
$user = new User;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($user->checkLogin($username, $password)) {
        $_SESSION['user'] = $username;
        header('location:../admin');

    }else {
        header('location:index.php');
    }
}
