/* ================= Script Here ================= */
/* ================= Script Here ================= */
document.addEventListener("DOMContentLoaded", () => {
    const locationActive = (window.location.pathname).split("/");
    for (let x in locationActive) {
        if (document.getElementById(`${locationActive[x]}`)) {
            document.getElementById(`${
                locationActive[x].toLowerCase()
            }`).classList.add("active-admin-aside")
            const svgPaths = document.querySelectorAll('.active-admin-aside path');
            svgPaths.forEach(path => {
                path.setAttribute('fill', 'white');
            });
        }
    }

})

document.getElementsByClassName("message__icon")[0].addEventListener("click", () => {
    document.getElementById("toast").style.display = "none"
})