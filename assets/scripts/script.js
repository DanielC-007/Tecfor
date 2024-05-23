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

function tema() {
  const body = document.body;
  if (body.classList.contains("lightTheme")) {
    body.classList.remove("lightTheme");
    updateImages('dark');
  } else {
    body.classList.add("lightTheme");
    updateImages('light');
  }
}

function updateImages(theme) {
  const imageElements = [
    {
      id: "userImage",
      dark: "public/imgs/userDark.png",
      light: "public/imgs/userLight.png",
    },
    {
      id: "homeImage",
      dark: "public/imgs/homeDark.png",
      light: "public/imgs/homeLight.png",
    },
    {
      id: "sunImage",
      dark: "public/imgs/sun.png",
      light: "public/imgs/moon.png",
    },
  ];

  imageElements.forEach((image) => {
    const imgElement = document.getElementById(image.id);
    if (imgElement) {
      imgElement.src = theme === "dark" ? image.dark : image.light;
    }
  });
}