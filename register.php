<?php
include("functions.php");
?>
<html>

    <head>
        <?php include("htmlhead.php"); ?>
    </head>

    <body class="bootstrap">

        <div class="container-fluid">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-auto">
                    <div class="row justify-content-center align-items-center">
                        <?php if($_GET["error"]){?>
                        <div class="col-12 col-md-6 ">
                            <div class="alert-danger alert">
                                <strong><?php echo $errorlist[$_GET["error"]]; ?></strong>
                            </div>
                        </div>
                        <div class="m-0 p-0 w-100"></div>
                        <?php } ?>
                        <div class="col-12 col-md-auto">
                            <div class="card mb-1">
                                <div class="card-body">
                                    <h1>Registrierung</h1>
                                    <a>Registriere dich!</a><br>
                                    <a>Du hast schon einen Account?</a><br>
                                    <a href="/login.php">Dann melde dich doch an</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="card mb-1">
                                <div class="card-body">
                                    <form class="m-0 p-0" method="post" action="register.callback.php">
                                        <div class="form-group">
                                            <input type="text" name="firstname" placeholder="Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lastname" placeholder="Nachname (optional)"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" placeholder="Username"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Passwort"
                                                class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Registrieren</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-auto">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <a>Registriere dich</a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <input type="text" name="firstname" placeholder="Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lastname" placeholder="Nachname (optional)" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" placeholder="Username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Passwort" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Registrieren</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            </div>
        </div>

        <?php include("footer.php"); ?>

    </body>

</html>
