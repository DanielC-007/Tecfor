console.log("Olá, tudo certo");

function navOpenClose() {
  var navSalas = document.getElementById("salas");
  var bntY = document.getElementById("y");
  if (
    navSalas.style.transform === "translateX(0px)" ||
    navSalas.style.transform === ""
  ) {
    navSalas.style.transform = "translateX(-100%)";
    bntY.style.visibility = "hidden";
  } else {
    navSalas.style.transform = "translateX(0px)";
    bntY.style.visibility = "visible";
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
  var hamburger = document.getElementById("hamburger");
  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");
  var home = document.getElementById("home");
  var chatImg = document.getElementsByClassName("chatImg");

  if (body.classList.contains("lightTheme")) {
    body.classList.remove("lightTheme");
    hamburger.src = "../public/imgs/hamburgerDark.png";
    user.src = "../public/imgs/userDark.png";
    sunMoon.src = "../public/imgs/sun.png";
    home.src = "../public/imgs/homeDark.png";
    chatImg.src = "../public/imgs/chatDark.png";
    localStorage.setItem("theme", "dark");
  } else {
    body.classList.add("lightTheme");
    hamburger.src = "../public/imgs/hamburgerLight.png";
    user.src = "../public/imgs/userLight.png";
    sunMoon.src = "../public/imgs/moon.png";
    home.src = "../public/imgs/homeLight.png";
    chatImg.src = "../public/imgs/chatLight.png";
    localStorage.setItem("theme", "light");
  }
}

function carregarTema() {
  const body = document.body;
  var hamburger = document.getElementById("hamburger");
  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");
  var home = document.getElementById("home");
  var chatImg = document.getElementsByClassName("chatImg");

  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "light") {
    body.classList.add("lightTheme");
    hamburger.src = "../public/imgs/hamburgerLight.png";
    user.src = "../public/imgs/userLight.png";
    sunMoon.src = "../public/imgs/moon.png";
    home.src = "../public/imgs/homeLight.png";
    chatImg.src = "../public/imgs/chatLight.png";
  } else {
    body.classList.remove("lightTheme");
    hamburger.src = "../public/imgs/hamburgerDark.png";
    user.src = "../public/imgs/userDark.png";
    sunMoon.src = "../public/imgs/sun.png";
    home.src = "../public/imgs/homeDark.png";
    chatImg.src = "../public/imgs/chatDark.png";
  }
}
document.addEventListener("DOMContentLoaded", carregarTema);