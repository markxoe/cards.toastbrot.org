<?php
// password_hash("",PASSWORD_BCRYPT);
include("functions.php");
$username = $_POST["username"];
$password = $_POST["password"];
$user = $sql->userGet($username);
if($user){
    if(password_verify($password,$user["password"])){
        $login->login($user["id"]);
        header("location: /");
    }else{
        header("location: /login.php?error=3");
    }
}else{
    header("location: /login.php?error=4");
}