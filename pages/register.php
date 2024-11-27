<?php
include_once('../connection/connect.php');

if(isset($_POST['submit'])){
    if(
        isset($_POST['nome']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        !empty($_POST['nome']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password'])
    ){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['password'];

        // Validação do comprimento da senha
        if (strlen($senha) < 8) {
            echo "<script>alert('A senha deve ter no mínimo 8 caracteres');</script>";
        } else {
            // Hash da senha
            $hash = password_hash($senha, PASSWORD_BCRYPT);

            // Verificar se o e-mail já existe
            $query = "SELECT * FROM alunos WHERE email = '$email'";
            $consulta = $connect->query($query);

            if($consulta->num_rows > 0){
                echo "<script>alert('Email já está em uso');</script>";
            } else {
                // Inserir novo registro
                $query = "INSERT INTO alunos (nome, email, senha_hash) VALUES ('$nome', '$email', '$hash')";
                $connect->query($query);

                header("Location: login.php");
                exit();
            }
        }
    } else {
        echo "<script>alert('Preencha os dados corretamente');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/register.css">
    <link rel="icon" href="../src/imgs/icon.png">
    <title>Cadastro</title>
</head>
<body>
    <a href="../index.php" class="back">Voltar</a>
    <main class="container">
        <form method="POST">
            <h2>Cadastro</h2>
            <img src="../src/imgs/raposa.png">
            <input type="text" id="nome" name="nome" placeholder="Nome" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Senha" minlength="8" required>
            <div class="dldiv">
                <a href="login.php">Já possui conta?</a>
                <input type="submit" name="submit" value="Cadastrar">
            </div>
        </form>
    </main>
</body>
</html>
