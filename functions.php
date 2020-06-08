<?php

$errorlist = array(
    "1" => "Interner Fehler",
    "2" => "Fehlende Felder",
    "3" => "Benutzername / Passwort Falsch",
    "4" => "Benutzer existiert nicht",
    "5" => "User existiert bereits"
);
$linksymbolslist = array(
    "youtube" => "fab fa-youtube",
    "github" => "fab fa-github",
    "instagram" => "fab fa-instagram"
);
$linkNames = array(
    array(
        "name" => "YouTube",
        "rowname" => "link-youtube",
        "iconclass" => "fab fa-youtube",
        "urlprefix" => "",
        "displayprefix" => "",
        "displayvariablename" => "fullname",
        "editname" => "Kanal-link (mit https)"
    ),
    array(
        "name" => "Instagram",
        "rowname" => "link-instagram",
        "iconclass" => "fab fa-instagram",
        "urlprefix" => "https://instagram.com/",
        "displayprefix" => "@",
        "displayvariablename" => "value",
        "editname" => "Benutzername"
    ),
    array(
        "name" => "Github",
        "rowname" => "link-github",
        "iconclass" => "fab fa-github",
        "urlprefix" => "https://github.com/",
        "displayprefix" => "@",
        "displayvariablename" => "value",
        "editname" => "Benutzername"
    ),
    array(
        "name" => "Twitter",
        "rowname" => "link-twitter",
        "iconclass" => "fab fa-twitter",
        "urlprefix" => "https://twitter.com/",
        "displayprefix" => "@",
        "displayvariablename" => "value",
        "editname" => "Benutzername"
    )
);
include("class_sql.php");
include("class_login.php");

$login = new loginclass($sql);
$login->deleteOld();
$isloggedin = $login->verify();
