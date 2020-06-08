<?php
$sitename = "Karte von ".$_GET["u"];
include("functions.php");

$username = $_GET["u"];
$userexisting = $sql->userExist($username);
$user = null;
if ($userexisting) {
    $user = $sql->userGet($username);
}
$fullname = $user["firstname"]." ".$user["lastname"];
?>


<html>

<head>
    <?php include("htmlhead.php"); ?>
</head>

<body>
    <?php include("header.php"); ?>

    <?php if (!$userexisting) { ?>
        <div class="container-fluid p-5">
            <h1>Sorry, dieser User existiert nicht!</h1>
        </div>
    <?php } else { ?>
        <div class="container-fluid p-5">
            <h1><?php echo $user["firstname"]; ?></h1>
            <h3><?php echo $user["lastname"]; ?></h3>
            <table class="table pt-2 table-borderless w-auto">
                <?php foreach ($linkNames as $link) {
                    $value = $user[$link["rowname"]];
                    if ($value != "" && $value != null) { ?>
                        <tr>
                            <td>
                                <h1><i class="<?php echo $link["iconclass"]; ?>"></i></h1>
                            </td>
                            <td class="align-middle">
                                <h5>
                                    <a class="text-primary" href="<?php echo $link["urlprefix"] . $value ?>">
                                        <!--<?php echo $link["displayprefix"] . $value; ?>-->
                                        <?php echo $link["displayprefix"] . $GLOBALS[$link["displayvariablename"]]?>
                                    </a>
                                </h5>
                            </td>
                        </tr>
                <?php }
                } ?>
            </table>
            <h5>Benutzername: <?php echo $username; ?></h5>
        </div>
    <?php } ?>
    <?php include("footer.php"); ?>
</body>

</html>


<!--
    <div class="container-fluid p-5">
        <h1>Mark</h1>
        <h3>Oude Elberink</h3>
        <table class="table pt-2 table-borderless w-auto">
            <tr>
                <td>
                    <h1><i class="fab fa-instagram"></i></h1>
                </td>
                <td class="align-middle">
                    <h5><a class="text-primary" href="https://instagram.com/markxoe">@markxoe</a></h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h1><i class="fab fa-github"></i></h1>
                </td>
                <td class="align-middle">
                    <h5><a class="text-primary" href="https://github.com/markxoe">@markxoe</a></h5>
                </td>
            </tr>
        </table>
        <h5>Benutzername: markxoe</h5>
        </div>
-->