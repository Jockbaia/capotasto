function inputFocus() {
    if (document.getElementById('header-search').style.display === "none") {
        document.getElementById('input-search').focus();
    } else {
        document.getElementById('input-search').blur();
    }
}