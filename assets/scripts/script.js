console.log("Olá, tudo certo");

function navOpenClose() {
  var navSalas = document.getElementById("salas");
  var subContainer = document.getElementById("subContainer");
  if (
    navSalas.style.transform === "translateX(0px)" ||
    navSalas.style.transform === ""
  ) {
    navSalas.style.transform = "translateX(-100%)";
    subContainer.style.width = "100vw";
  } else {
    navSalas.style.transform = "translateX(0px)";
    subContainer.style.width = "calc(100vw - 300px)";
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
