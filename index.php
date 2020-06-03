<html>

    <head>
        <?php include("htmlhead.php"); ?>
    </head>

    <body class="bootstrap">

        <nav class="navbar navbar-expand-md navbar-themed">
            <a class="navbar-brand" href="#">Karten</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="nav-link">
                            <a href="#" class="btn btn-outline-secondary">Login</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <a href="#" class="btn btn-outline-danger">Register</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid p-5">
            <h1>Toastbrot.org Karten</h1>
            <h2>NFC Karten oder short-link um Links für Social Media oder andere zu Teilen</h2>
        </div>
        <footer class="container-fluid p-2 text-center">
            <a>&copy; 2020 Mark Oude Elberink</a> |
            <a>Toastbrot.org Karten</a>
        </footer>
        <div class="container-fluid p-2 text-center">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="darkSwitch" />
                <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
            </div>
        </div>

    </body>

    <script>
    const darkSwitch = document.getElementById('darkSwitch');
    window.addEventListener('load', () => {
        if (darkSwitch) {
            initTheme();
            darkSwitch.addEventListener('change', () => {
                resetTheme();
            });
        }
    });

    function initTheme() {
        const darkThemeSelected =
            localStorage.getItem('darkSwitch') !== null &&
            localStorage.getItem('darkSwitch') === 'dark';
        darkSwitch.checked = darkThemeSelected;
        darkThemeSelected ? setTheme(1) : setTheme(0);
    }

    function setTheme(dark) {
        if (dark) {
            $("body").removeClass("bootstrap");
            $("body").addClass("bootstrap-dark");
        } else {
            $("body").addClass("bootstrap");
            $("body").removeClass("bootstrap-dark");
        }
    }

    function resetTheme() {
        if (darkSwitch.checked) {
            setTheme(1);
            localStorage.setItem('darkSwitch', 'dark');
        } else {
            setTheme(0);
            localStorage.removeItem('darkSwitch');
        }
    }
    </script>

</html>
