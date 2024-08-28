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

        
        $hash = password_hash($senha, PASSWORD_BCRYPT);
        
        $query = "SELECT * FROM alunos where email = '$email'";
        $consulta = $connect->query($query);

        if($consulta->num_rows > 0){
            echo "<h4 style='color:red;width:175px;margin-left:calc(50vw - 175px / 2);'>Email já está em uso</h4>";
        } else {
            $query = "INSERT INTO alunos (nome, email, senha_hash) VALUES ('$nome', '$email', '$hash')";
            $connect->query($query);

            header("Location: login.php");
        }
    } else {
        echo "<h4 style='color:red;width:275px;margin-left:calc(50vw - 275px / 2);'>Preencha os dados corretamente</h4>";
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
    <main class="container">
        <form method="POST">
            <h2>Registro</h2>
            <img src="../src/imgs/raposa.png">
            <input type="text" id="nome" name="nome" placeholder="Nome">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Senha">
            <p></p>
            <input type="submit" name="submit" value="Enviar">
        </form>
    </main>
</body>
</html>