<?php
include_once('../connection/connect.php');

// Atualiza

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
            echo "Email já está em uso";
        } else {
            $query = "INSERT INTO alunos (nome, email, senha_hash) VALUES ('$nome', '$email', '$hash')";
            $connect->query($query);

            header("Location: login.php?email=" . $email);
        }
    } else {
        echo "Preencha os dados corretamente";
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
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <div class="container">
            <label for="">Nome:</label>
            <input type="text" id="nome" name="nome">
        </div>
        <div class="container">
            <label for="">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="container">
            <label for="">Senha:</label>
            <input type="password" id="password" name="password">
        </div>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>