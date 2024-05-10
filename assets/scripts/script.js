console.log("Olá, tudo certo");

function navOpenClose() {
    var navSalas = document.getElementById("salas");
    if (navSalas.style.display === "none" || navSalas.style.display === "") {
        navSalas.style.display = "block";
    } else {
        navSalas.style.display = "none";
    }
}

function confirmarConta() {
    var nome = document.getElementById("nameUser");
    var email = document.getElementById("emailUser");
    var pass = document.getElementById("passUser");
    if (nome && email && pass == false) {
        alert("Preencha todos os campos!");
    }
}

function exibirSenha() {
    var visualizar = document.getElementById("passUser");
    if (visualizar.type === "password") {
        visualizar.type = "text";
    }
    else {
        visualizar.type = "password";
    }
}
