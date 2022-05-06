function confirmDelete(id, marka, model) {
    var del = confirm(
        "Czy jestes pewny, że chcesz usunąć samochód " +
            marka +
            " " +
            model +
            "?"
    );
    if (del) {
        document.getElementsByClassName("confirm")[id].value = "true";
    } else {
        document.getElementsByClassName("confirm")[id].value = "false";
    }
}
