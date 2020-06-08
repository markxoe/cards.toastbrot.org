<?php
include("functions.php");
$sitename="Login";
if($login->verify()){
    header("location: /");
    die();
}
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
                                    <h1>Login</h1>
                                    <a>Melde dich an!</a><br>
                                    <a>Du hast noch keinen Account?</a><br>
                                    <a href="/register.php">Dann regestriere dich doch</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="card mb-1">
                                <div class="card-body">
                                    <form class="m-0 p-0" method="post" action="login.callback.php">
                                        <div class="form-group">
                                            <input type="text" name="username" placeholder="Username"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Passwort"
                                                class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php //include("footer.php"); ?>

    </body>

</html>
