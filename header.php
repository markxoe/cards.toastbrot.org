<nav class="navbar navbar-expand-md navbar-themed">
    <a class="navbar-brand" href="#">Karten</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php if($sitename=="Home")echo "active";?>" href="/">Home</a>
            </li>
            <?php if($isloggedin){?>
            <li class="nav-item">
                <a class="nav-link <?php if($sitename=="Profil")echo "active";?>" href="/profile.php">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($sitename=="Karte von ".$login->getUsername())echo "active";?>" href="/u/<?php echo $login->getUsername(); ?>">Deine Karte</a>
            </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <div class="nav-link">
                    <form class="form-inline m-0 p-0" action="/goto.php">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="list" list="users" name="u" class="form-control" placeholder="Suche">
                        </div>
                    </form>
                </div>
            </li>
            <?php if(! $isloggedin){?>
            <li class="nav-item">
                <div class="nav-link">
                    <a href="/login.php" class="btn btn-outline-secondary">Login</a>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-link">
                    <a href="/register.php" class="btn btn-outline-danger">Registrieren</a>
                </div>
            </li>
            <?php }else{ ?>
            <li class="nav-item">
                <div class="nav-link">
                    <a href="/logout.php" class="btn btn-outline-success">Logout</a>
                </div>
            </li>
            <?php }?>
        </ul>
    </div>
</nav>
<datalist id="users">
    <?php foreach($sql->userList() as $_c){?>
        <option><?php echo $_c["username"];?></option>
    <?php } ?>
</datalist>