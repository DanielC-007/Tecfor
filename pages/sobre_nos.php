<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/index.css">
    <script src="../assets/scripts/index.js"></script>
    <link rel="icon" href="../src/imgs/icon.png">
    <title>Sobre nós</title>
</head>
<body>
<header>
        <div>
            <img src="../src/imgs/icon.png">
            <h4>Tecfor</h4>
        </div>
        <div>
            <ul>
                <a href="../index.php">
                    <li>Home</li>
                </a><a href="">
                    <li style="color: #916dd5;">Sobre nós</li>
                </a><a href="contato.php">
                    <li>Contato</li>
                </a>
            </ul>
            <a href="pages/login.php"><button>Entrar</button></a>
        </div>
    </header>
    <main class="container">
        <div class="maincon">
            <h4>Sobre a Tecfor</h4>
            <div class="divdl">
                <div class="box1">
                    <button class="setabnt" id="setabnt1" onclick="passarInfo()">
                        <img class="setaimg" src="../src/imgs/setae.png">
                    </button>
                </div>
                <div class="box2" id="box1">
                    <h2>TecFor: Conectando o futuro da ETEC Rio Grande da Serra</h2>
                    <p>Somos uma rede social criada para conectar os alunos, promover a troca de experiências, fortalecer o aprendizado e criar um espaço para compartilhar momentos especiais dentro e fora da sala de aula.</p>
                </div>
                <div class="box2" id="box2">
                    <h2>Com a Tecfor, você poderá:</h2>
                    <ul>
                        <li>Compartilhar suas experiências e ideias com outros alunos.</li>
                        <li>Participar de grupos de estudo e projetos.</li>
                        <li>Ficar por dentro das novidades da ETEC.</li>
                        <li>Criar um portfólio online com seus trabalhos e projetos.</li>
                        <li>E muito mais!</li>
                    </ul>
                </div>
                <div class="box3">
                    <button class="setabnt" id="setabnt2" onclick="passarInfo()">
                        <img class="setaimg" src="../src/imgs/setad.png">
                    </button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>