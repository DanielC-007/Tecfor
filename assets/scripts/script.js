console.log("Olá, tudo certo");

function navOpenClose() {
    var navSalas = document.getElementById("salas");
    var divclose = document.querySelector(".closeNav");
    navSalas.classList.toggle("closed");
    divclose.classList.toggle("closed");
    if (navSalas.style.display === "none" || navSalas.style.display === "") {
        navSalas.style.transform = "tranlateX(-100%)";
        setTimeout(()=>{
            navSalas.style.display = "none";
        }, 500);
    } else {
        navSalas.style.display = "block";
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

