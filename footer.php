<div class="fixed-bottom">
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
</div>
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
