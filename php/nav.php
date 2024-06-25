<button id="x" onclick="navOpenClose()"></button>
<nav id="salas">
    <div>
        <a href="index.php"><button>
                <img src="../src/imgs/home.png" />
                <p>Página principal</p>
            </button></a>
        <a href="sala1.php"><button>
                <img src="../src/imgs/chats.png" />
                <p>Sala 1</p>
            </button></a>
        <a href="sala2.php"><button>
                <img src="../src/imgs/chats.png" />
                <p>Sala 2</p>
            </button></a>
        <a href="sala3.php"><button>
                <img src="../src/imgs/chats.png" />
                <p>Sala 3</p>
            </button></a>
        <a href="sala4.php"><button>
                <img src="../src/imgs/chats.png" />
                <p>Sala 4</p>
            </button></a>
        <a href="sala5.php">
            <button>
                <img src="../src/imgs/chats.png" />
                <p>Sala 5</p>
            </button>
        </a>
    </div>
    <div>
        <button onclick="configOpenClose()">
            <img src="../src/imgs/config.png" />Configurações
        </button>
    </div>
</nav>

<button id="y" onclick="configOpenClose()"></button>
<div id="telaConfig">
    <button onclick="tema()">
        <img id="sunMoon" src="../src/imgs/sun.png" />Alterar tema
    </button>
</div>