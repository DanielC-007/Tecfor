console.log("Olá, tudo certo");

function navOpenClose() {
    var navSalas = document.getElementById("salas");
    if (navSalas.style.display === "none" || navSalas.style.display === "") {
        navSalas.style.display = "block";
    } else {
        navSalas.style.display = "none";
    }
}