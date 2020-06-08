//const alwaysCheck = true;
var darkSwitch = null;

if (localStorage.getItem("visited") != "yes") {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        setTheme(1);
        localStorage.setItem('darkSwitch', 'dark');
    }
    localStorage.setItem("visited", "yes");
}

window.addEventListener('load', () => {
    darkSwitch = document.getElementById('darkSwitch');
    /*if (darkSwitch || alwaysCheck) {
        initTheme();
        if (darkSwitch) {
            darkSwitch.addEventListener('change', () => {
                resetTheme();
            });
        }
    }*/
    initTheme();
    if (darkSwitch) darkSwitch.addEventListener('change', () => { resetTheme(); });
});

function initTheme() {
    const darkThemeSelected =
        localStorage.getItem('darkSwitch') !== null &&
        localStorage.getItem('darkSwitch') === 'dark';
    if (darkSwitch) darkSwitch.checked = darkThemeSelected;
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