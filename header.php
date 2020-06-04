<nav class="navbar navbar-expand-md navbar-themed">
    <a class="navbar-brand" href="#">Karten</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
        </ul>
        <?php if(! $isloggedin){?>
        <ul class="navbar-nav ml-auto">
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
        </ul>
        <?php }else{ ?>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <div class="nav-link">
                    <a href="/logout.php" class="btn btn-outline-success">Logout</a>
                </div>
            </li>
        </ul>
        <?php }?>
    </div>
</nav>
