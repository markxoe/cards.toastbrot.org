<?php
// password_hash("",PASSWORD_BCRYPT);
include("functions.php");
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$password = password_hash($password, PASSWORD_BCRYPT);
if ($firstname && $lastname && $username && $_POST["password"]) {
    if (!$sql->userExist($username)) {
        $r = $sql->userAdd($username, $firstname, $lastname, $password);
        if ($r != 1) {
            header("location: /register.php?error=1");
        } else {
            $login->login($sql->userGet($username));
            header("location: /");
        }
    } else {
        header("location: /register.php?error=10");
    }
} else {
    header("location: /register.php?error=2");
}
