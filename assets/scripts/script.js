console.log("Olá, tudo certo");

function navOpenClose() {
  var navSalas = document.getElementById("salas");
  var bntY = document.getElementById("y");
  if (
    navSalas.style.transform === "translateX(-100%)" ||
    navSalas.style.transform === ""
  ) {
    navSalas.style.animation = "showNav 0.5s";
    navSalas.style.transform = "translateX(0px)";
    bntY.style.visibility = "visible";
  } else {
    navSalas.style.animation = "closeNav 0.5s";
    navSalas.style.transform = "translateX(-100%)";
    bntY.style.visibility = "hidden";
  }
}

function exibirSenha() {
  var visualizar = document.getElementById("passUser");
  var eye = document.getElementById("eye");
  if (visualizar.type === "password") {
    visualizar.type = "text";
    eye.src = "../public/imgs/closeEyeLight.png";
  } else {
    visualizar.type = "password";
    eye.src = "../public/imgs/openEyeLight.png";
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
    hamburger.src = "../public/imgs/hamburgerDark.png";
    user.src = "../public/imgs/userDark.png";
    sunMoon.src = "../public/imgs/sun.png";
    eye.src = "../public/imgs/openEyeDark.png";
    localStorage.setItem("theme", "dark");
  } else {
    body.classList.add("lightTheme");
    hamburger.src = "../public/imgs/hamburgerLight.png";
    user.src = "../public/imgs/userLight.png";
    sunMoon.src = "../public/imgs/moon.png";
    eye.src = "../public/imgs/openEyeLight.png";
    localStorage.setItem("theme", "light");
  }
}

function carregarTema() {
  const body = document.body;
  var hamburger = document.getElementById("hamburger");
  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");
  var eye = document.getElementById("eye");
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "light") {
    body.classList.add("lightTheme");
    hamburger.src = "../public/imgs/hamburgerLight.png";
    user.src = "../public/imgs/userLight.png";
    sunMoon.src = "../public/imgs/moon.png";
    eye.src = "../public/imgs/openEyeLight.png";
  } else {
    body.classList.remove("lightTheme");
    hamburger.src = "../public/imgs/hamburgerDark.png";
    user.src = "../public/imgs/userDark.png";
    sunMoon.src = "../public/imgs/sun.png";
    eye.src = "../public/imgs/openEyeDark.png";
  }
}
document.addEventListener("DOMContentLoaded", carregarTema);
