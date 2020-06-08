<?php
$sitename="Home";
include("functions.php");
//require_once("class_sql.php");
?>

<html>

    <head>
        <?php include("htmlhead.php"); ?>
    </head>

    <body class="bootstrap">

        <?php include("header.php"); ?>
        
        <div class="container-fluid p-5">
            <h1>Toastbrot.org Karten</h1>
            <h2>Hier kannst du deine Social Media Links Teilen</h2>
            <h2>Zurzeit kompatibel: Instagram, YouTube, Github</h2>
            <br>
            <h2><a class="text-primary" href="register.php">Registriere dich noch Heute</a> bei Toastbrot.org Karten</h2>
            <?php if($isloggedin){?>
            <h2>Aber Warte du bist ja schon angemeldet!</h2>
            <?php } ?>
        </div>

        <?php include("footer.php"); ?>

    </body>

</html>
