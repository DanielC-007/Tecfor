<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" href="../src/imgs/icon.png">
    <script src="../assets/scripts/script.js" defer></script>
    <title>Login</title>
</head>

<body>
    <main class="containerLogin">
        <!-- <button onclick="tema()">tema teste</button> -->
        <form action="../index.php" method="post">
            <h1>Login</h1>
            <input type="text" placeholder="Nome" name="nameUser" id="nameUser">
            <input type="email" placeholder="Email institucional" name="emailUser" id="emailUser">
            <div>
                <input type="password" placeholder="Senha" name="passUser" id="passUser">
                <img src="../src/imgs/openEyeDark.png" id="eye" onclick="exibirSenha()">
            </div>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>

</html>