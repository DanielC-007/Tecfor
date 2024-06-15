console.log("Olá, tudo certo");

function configOpenClose() {
  var divConfig = document.getElementById("telaConfig");
  var bntY = document.getElementById("y");
  if (
    divConfig.style.transform === "translateY(-200%)" ||
    divConfig.style.transform === ""
  ) {
    divConfig.style.animation = "downY 0.5s";
    divConfig.style.transform = "translateY(0px)";
    bntY.style.visibility = "visible";
  } else {
    divConfig.style.animation = "upY 0.5s";
    divConfig.style.transform = "translateY(-200%)";
    bntY.style.visibility = "hidden";
    // navOpenClose();
  }
}

function navOpenClose() {
  var navSalas = document.getElementById("salas");
  var bntX = document.getElementById("x");
  if (
    navSalas.style.transform === "translateX(-100%)" ||
    navSalas.style.transform === ""
  ) {
    navSalas.style.animation = "showNav 0.5s";
    navSalas.style.transform = "translateX(0px)";
    bntX.style.visibility = "visible";
  } else {
    navSalas.style.animation = "closeNav 0.5s";
    navSalas.style.transform = "translateX(-100%)";
    bntX.style.visibility = "hidden";
  }
}

function infoUserOpenClose() {
  var aside = document.getElementById("infoUser");
  var bntz = document.getElementById("z");
  if (aside.style.transform === "translateY(-200%)" || aside.style.transform === "") {
    aside.style.animation = "downY 0.5s";
    aside.style.transform = "translateY(0px)";
    bntz.style.visibility = "visible";
  } else {
    aside.style.animation = "upY 0.5s";
    aside.style.transform = "translateY(-200%)";
    bntz.style.visibility = "hidden";

  }
}

function exibirSenha() {
  var visualizar = document.getElementById("passUser");
  var eye = document.getElementById("eye");
  if (visualizar.type === "password") {
    visualizar.type = "text";
    eye.src = "../src/imgs/closeEyeDark.png";
  } else {
    visualizar.type = "password";
    eye.src = "../src/imgs/openEyeDark.png";
  }
}

function tema() {
  const body = document.body;
  var hamburger = document.getElementById("hamburger");
  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");
  var eye = document.getElementById("eye");

  if (body.classList.contains("lightTheme")) {
    body.classList.remove("lightTheme");
    hamburger.src = "../src/imgs/hamburgerDark.png";
    user.src = "../src/imgs/userDark.png";
    sunMoon.src = "../src/imgs/sun.png";
    eye.src = "../src/imgs/openEyeDark.png";
    // localStorage.setItem("theme", "dark");
  } else {
    body.classList.add("lightTheme");
    hamburger.src = "../src/imgs/hamburgerLight.png";
    user.src = "../src/imgs/userLight.png";
    sunMoon.src = "../src/imgs/moon.png";
    eye.src = "../src/imgs/openEyeLight.png";
    // localStorage.setItem("theme", "light");
  }
}

// function carregarTema() {
//   const body = document.body;
//   var hamburger = document.getElementById("hamburger");
//   var user = document.getElementById("user");
//   var sunMoon = document.getElementById("sunMoon");
//   var eye = document.getElementById("eye");
//   const savedTheme = localStorage.getItem("theme");
//   if (savedTheme === "light") {
//     body.classList.add("lightTheme");
//     hamburger.src = "../src/imgs/hamburgerLight.png";
//     user.src = "../src/imgs/userLight.png";
//     sunMoon.src = "../src/imgs/moon.png";
//     eye.src = "../src/imgs/openEyeLight.png";
//   } else {
//     body.classList.remove("lightTheme");
//     hamburger.src = "../src/imgs/hamburgerDark.png";
//     user.src = "../src/imgs/userDark.png";
//     sunMoon.src = "../src/imgs/sun.png";
//     eye.src = "../src/imgs/openEyeDark.png";
//   }
// }
// document.addEventListener("DOMContentLoaded", carregarTema);
