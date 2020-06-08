<?php

include("functions.php");
echo $_GET["id"];
$id = $_GET["id"];
if($sql->cardExist($id)){
    $card = $sql->cardGet($id);
}else{

}



?>
<html>

    <head>
        <?php include("htmlhead.php"); ?>
    </head>

    <body>
        <?php include("header.php"); ?>

        <?php if(! $card){?>
        <div class="container-fluid p-5">
            <h1>Sorry, diese Karte Existiert nicht!</h1>
        </div>
        <?php }else{ ?>

        <div class="container-fluid p-5">
            <h5>Karte von</h5>
            <h1>Mark Oude Elberink</h1>
            <h4>@markxoe</h4>
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
            <h5>Karten ID: <?php echo $id; ?></h5>
        </div>

        <?php } ?>
        <?php include("footer.php"); ?>
    </body>

</html>
