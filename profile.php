<?php
$sitename = "Profil";
include("functions.php");
if (!$login->verify()) {
    header("location: /login.php");
}
$user = $sql->userGet($login->getUsername());
?>
<html>

<head>
    <?php include("htmlhead.php"); ?>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="container-fluid p-5">
        <h1>Dein Profil</h1>
        <table class="table w-auto">
            <tr>
                <td>Benutzername</td>
                <td><?php echo $user["username"]; ?></td>
            </tr>
            <tr>
                <td>Vorname</td>
                <td><?php echo $user["firstname"]; ?></td>
            </tr>
            <tr>
                <td>Nachname</td>
                <td><?php echo $user["lastname"]; ?></td>
            </tr>
        </table>
        <table class="table w-auto">
            <?php foreach ($linkNames as $link) { ?>
                <tr>
                    <td><?php echo $link["name"]; ?></td>
                    <td>
                        <form class="m-0 p-0" method="post" action="profile.callback.php">
                            <div class="input-group">
                                <?php if ($link["displayprefix"]) { ?>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <?php echo $link["displayprefix"]; ?>
                                        </span>
                                    </div>
                                <?php } ?>
                                <input name="rowname" value="<?php echo $link["rowname"]; ?>" hidden>
                                <input type="text" name="value" class="form-control" value="<?php echo $user[$link["rowname"]]; ?>" placeholder="<?php echo $link["editname"]; ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i></button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="/u/<?php echo $user["username"];?>" class="btn btn-primary">Profil Anschauen</a>

    </div>
    <?php include("footer.php"); ?>
</body>

</html>