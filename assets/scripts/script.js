console.log("Olá, tudo certo");

function navOpenClose() {
  var navSalas = document.getElementById("salas");
  var bntX = document.getElementById("x");
  const body = document.body;
  if (
    navSalas.style.transform === "translateX(-100%)" ||
    navSalas.style.transform === ""
  ) {
    body.style.overflowY = "hidden";
    navSalas.style.animation = "showNav 0.5s";
    navSalas.style.transform = "translateX(0px)";
    bntX.style.visibility = "visible";
  } else {
    body.style.overflowY = "visible";
    navSalas.style.animation = "closeNav 0.5s";
    navSalas.style.transform = "translateX(-100%)";
    bntX.style.visibility = "hidden";
  }
}

function infoUserOpenClose() {
  var aside = document.getElementById("infoUser");
  var bntz = document.getElementById("z");
  const body = document.body;
  if (
    aside.style.transform === "translateY(-200%)" ||
    aside.style.transform === ""
  ) {
        body.style.overflowY = "hidden";
    aside.style.animation = "downY 0.5s";
    aside.style.transform = "translateY(0px)";
    aside.style.visibility = "visible";
    bntz.style.visibility = "visible";
  } else {
        body.style.overflowY = "visible";
    aside.style.animation = "upY 0.5s";
    aside.style.transform = "translateY(-200%)";
    bntz.style.visibility = "hidden";
    setTimeout(function delay() {
      aside.style.visibility = "hidden";
    }, 500);
  }
}

function exibirSenha() {
  console.log("Função de exibir a senha");
  if(document.getElementById("password")){
    var visualizar = document.getElementById("password");
    var eye = document.getElementById("eye");
    if (visualizar.type === "password") {
      visualizar.type = "text";
      eye.src = "../src/imgs/closeEyeDark.png";
    } else {
      visualizar.type = "password";
      eye.src = "../src/imgs/openEyeDark.png";
    }
  } else{
    console.log("Elemento com id 'visualizar' não encontrado");
  }
}

function tema() {
  const body = document.body;

  if(document.getElementById("hamburger")){
    var hamburger = document.getElementById("hamburger");
  }

  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");

  if (body.classList.contains("lightTheme")) {
    body.classList.remove("lightTheme");

    if(document.getElementById("hamburger")){
      hamburger.src = "../src/imgs/hamburgerDark.png";
    }

    user.src = "../src/imgs/userDark.png";
    sunMoon.src = "../src/imgs/sun.png";
    localStorage.setItem("localTema", "dark");
  } else {
    body.classList.add("lightTheme");
    
    if(document.getElementById("hamburger")){
      hamburger.src = "../src/imgs/hamburgerLight.png";
    }
    
    user.src = "../src/imgs/userLight.png";
    sunMoon.src = "../src/imgs/moon.png";
    localStorage.setItem("localTema", "light");
  }
  console.log(localStorage.getItem("localTema"));
}

function carregarTema() {
  const body = document.body;

  if(document.getElementById("hamburger")){
    var hamburger = document.getElementById("hamburger");
  }
  
  var user = document.getElementById("user");
  var sunMoon = document.getElementById("sunMoon");
  if (localStorage.getItem("localTema") === "light") {
    body.classList.add("lightTheme");
    if(document.getElementById("hamburger")){
      hamburger.src = "../src/imgs/hamburgerLight.png";
    }
    user.src = "../src/imgs/userLight.png";
    sunMoon.src = "../src/imgs/moon.png";
  } else {
    body.classList.remove("lightTheme");
    if(document.getElementById("hamburger")){
      hamburger.src = "../src/imgs/hamburgerDark.png";
    }
    user.src = "../src/imgs/userDark.png";
    sunMoon.src = "../src/imgs/sun.png";
  }
}

carregarTema();