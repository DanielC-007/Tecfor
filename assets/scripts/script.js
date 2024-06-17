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
    divConfig.style.visibility = "visible";
    bntY.style.visibility = "visible";
  } else {
    divConfig.style.animation = "upY 0.5s";
    divConfig.style.transform = "translateY(-200%)";
    bntY.style.visibility = "hidden";
    setTimeout(function delay() {
      divConfig.style.visibility = "hidden";
    }, 1000);
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
  if (
    aside.style.transform === "translateY(-200%)" ||
    aside.style.transform === ""
  ) {
    aside.style.animation = "downY 0.5s";
    aside.style.transform = "translateY(0px)";
    aside.style.visibility = "visible";
    bntz.style.visibility = "visible";
  } else {
    aside.style.animation = "upY 0.5s";
    aside.style.transform = "translateY(-200%)";
    bntz.style.visibility = "hidden";
    setTimeout(function delay() {
      aside.style.visibility = "hidden";
    }, 1000);
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

  if (body.classList.contains("lightTheme")) {
    body.classList.remove("lightTheme");
    hamburger.src = "../src/imgs/hamburgerDark.png";
    user.src = "../src/imgs/userDark.png";
    sunMoon.src = "../src/imgs/sun.png";
    localStorage.setItem("localTema", "dark");
  } else {
    body.classList.add("lightTheme");
    hamburger.src = "../src/imgs/hamburgerLight.png";
    user.src = "../src/imgs/userLight.png";
    sunMoon.src = "../src/imgs/moon.png";
    localStorage.setItem("localTema", "light");
  }
  console.log(localStorage.getItem("localTema"));
}

function carregarTema() {
  const body = document.body;
  var hamburger = document.getElementById("hamburger");
  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");
  if (localStorage.getItem('localTema') === 'light') {
    body.classList.add("lightTheme");
    hamburger.src = "../src/imgs/hamburgerLight.png";
    user.src = "../src/imgs/userLight.png";
    sunMoon.src = "../src/imgs/moon.png";
  } else {
    body.classList.remove("lightTheme");
    hamburger.src = "../src/imgs/hamburgerDark.png";
    user.src = "../src/imgs/userDark.png";
    sunMoon.src = "../src/imgs/sun.png";
  }
}

carregarTema();