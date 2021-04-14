let edit_button = document.querySelector(".edit-but");
let change_ava_form = document.querySelector(".edit-avatar-window");
let submit_ava_but = document.querySelector(".submit-photo")


edit_button.onclick = function() {
    change_ava_form.classList.remove("none");
}

submit_ava_but.onclick = function () {
    change_ava_form.classList.add("none");
}