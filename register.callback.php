<?php
// password_hash("",PASSWORD_BCRYPT);
include("class_sql.php");
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$password = password_hash($password,PASSWORD_BCRYPT);
if($firstname && $lastname && $username && $_POST["password"]){
    $r = $sql->userAdd($username,$firstname,$lastname,$password);
    if($r!=1){
        header("location: /register.php?error=1");
    }else{
        header("location: /");
    }
}else{
    header("location: /register.php?error=2");
}