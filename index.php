<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/style.css" />
    <link rel="icon" href="src/imgs/icon.png" />
    <script src="assets/scripts/script.js" defer></script>
    <title>TecFor</title>
  </head>
  <body>
    <header>
      <button onclick="navOpenClose()">
        <img id="hamburger" src="src/imgs/hamburgerDark.png" />
      </button>
      <img id="icon" src="src/imgs/icon.png" />
      <button onclick="infoUserOpenClose()">
        <img id="user" src="src/imgs/userDark.png" />
      </button>
    </header>
    <div id="pesquisaDiv">
      <input type="search" name="barraPesquisa" id="barraPesquisa" />
      <button id="procurar"><img src="src/imgs/busca.png" /></button>
    </div>

    <button id="z" onclick="infoUserOpenClose()"></button>
    <aside id="infoUser">
      <img src="src/imgs/userDark.png" />
      <h1>User</h1>
      <h5>id: 01</h5>
      <a href="pages/login.php"><button>Entrar</button></a>
    </aside>
    <button id="x" onclick="navOpenClose()"></button>
    <nav id="salas">
      <div>
        <button style="background-color: #6941ad">
          <img id="home" src="src/imgs/home.png" />
          <p>Página principal</p>
        </button>
        <a href="pages/sala1.php"
          ><button>
            <img src="src/imgs/chats.png" />
            <p>Sala 1</p>
          </button></a
        >
        <a href="pages/sala2.php"
          ><button>
            <img src="src/imgs/chats.png" />
            <p>Sala 2</p>
          </button></a
        >
        <a href="pages/sala3.php"
          ><button>
            <img src="src/imgs/chats.png" />
            <p>Sala 3</p>
          </button></a
        >
        <a href="pages/sala4.php"
          ><button>
            <img src="src/imgs/chats.png" />
            <p>Sala 4</p>
          </button></a
        >
        <a href="pages/sala5.php"
          ><button>
            <img src="src/imgs/chats.png" />
            <p>Sala 5</p>
          </button></a
        >
      </div>
      <div>
        <button onclick="configOpenClose()">
          <img src="src/imgs/config.png" />Configurações
        </button>
      </div>
    </nav>
    <button id="y" onclick="configOpenClose()"></button>
    <div id="telaConfig">
      <button onclick="tema()">
        <img id="sunMoon" src="src/imgs/sun.png" />Alterar tema
      </button>
    </div>
    <main class="container"></main>
  </body>
</html>
