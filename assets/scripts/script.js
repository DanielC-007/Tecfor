console.log("Olá, tudo certo");

function navOpenClose() {
  var navSalas = document.getElementById("salas");
  var container = document.getElementById("container");
  if (navSalas.style.visibility === "hidden" || navSalas.style.visibility === ""){
    navSalas.style.visibility = "hidden";
    container.style.width = "100vw";
  } else {
    navSalas.style.visibility = "visible";
    container.style.width = "calc(100vw - 300px)";
  }
}

function exibirSenha() {
  var visualizar = document.getElementById("passUser");
  if (visualizar.type === "password") {
    visualizar.type = "text";
  } else {
    visualizar.type = "password";
  }
}
