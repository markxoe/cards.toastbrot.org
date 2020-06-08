<?php


include("functions.php");
if($login->verify()){
    $username = $login->getUsername();
    if($_POST["rowname"]){
        $sql->userEdit($username,$_POST["rowname"],$_POST["value"]);
        echo "success";
        header("location: /profile.php");
    }
}