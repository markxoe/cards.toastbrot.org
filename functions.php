<?php

$errorlist = array("1"=>"Interner Fehler","2"=>"Fehlende Felder","3"=>"Benutzername / Passwort Falsch","4"=>"Benutzer existiert nicht","10"=>"User existiert bereits");

include("class_sql.php");
include("class_login.php");

$login = new loginclass($sql);
$login->deleteOld();
$isloggedin = $login->verify();