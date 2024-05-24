console.log("Olá, tudo certo");

function navOpenClose() {
  var navSalas = document.getElementById("salas");
  var container = document.getElementById("container");
  if (
    navSalas.style.visibility === "hidden" ||
    navSalas.style.visibility === ""
  ) {
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

function tema() {
  const body = document.body;
  var home = document.getElementById("home");
  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");

  if (body.classList.contains("lightTheme")) {
    body.classList.remove("lightTheme");
    home.src = "../public/imgs/homeDark.png";
    user.src = "../public/imgs/userDark.png";
    sunMoon.src = "../public/imgs/sun.png";
    localStorage.setItem("theme", "dark");
  } else {
    body.classList.add("lightTheme");
    home.src = "../public/imgs/homeLight.png";
    user.src = "../public/imgs/userLight.png";
    sunMoon.src = "../public/imgs/moon.png";
    localStorage.setItem("theme", "light");
  }
}

function carregarTema() {
  const body = document.body;
  var home = document.getElementById("home");
  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");

  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "light") {
    body.classList.add("lightTheme");
    home.src = "../public/imgs/homeLight.png";
    user.src = "../public/imgs/userLight.png";
    sunMoon.src = "../public/imgs/moon.png";
  } else {
    body.classList.remove("lightTheme");
    home.src = "../public/imgs/homeDark.png";
    user.src = "../public/imgs/userDark.png";
    sunMoon.src = "../public/imgs/sun.png";
  }
}
document.addEventListener("DOMContentLoaded", carregarTema);