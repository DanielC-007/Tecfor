console.log("Olá, tudo certo");

function navOpenClose() {
  var navSalas = document.getElementById("salas");
  var bntClose = document.getElementById("closeNav");
  if (
    navSalas.style.transform === "translateX(0px)" ||
    navSalas.style.transform === ""
  ) {
    navSalas.style.transform = "translateX(-100%)";
    navSalas.style.position = "absolute";
    bntClose.style.transform = "translateX(0px)";
  } else {
    navSalas.style.transform = "translateX(0px)";
    navSalas.style.position = "none";
    bntClose.style.transform = "translateX(330px)";
    bntClose.style.position = "none";
  }
}

// function confirmarConta() {
//   var nome = document.getElementById("nameUser");
//   var email = document.getElementById("emailUser");
//   var pass = document.getElementById("passUser");
//   if (nome && email && pass == false) {
//     alert("Preencha todos os campos!");
//   }
// }

function exibirSenha() {
  var visualizar = document.getElementById("passUser");
  if (visualizar.type === "password") {
    visualizar.type = "text";
  } else {
    visualizar.type = "password";
  }
}
