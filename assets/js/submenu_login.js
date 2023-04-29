const loginItem = document.querySelector("[data-submenu]");
const submenu = loginItem.querySelector(".submenu");

loginItem.addEventListener("click", function (event) {
    if (submenu.style.display === "block") {
        submenu.style.display = "none";
    } else {
        submenu.style.display = "block";
    }
    event.stopPropagation();
});

document.addEventListener("click", function (event) {
    if (!loginItem.contains(event.target)) {
        submenu.style.display = "none";
    }
});
