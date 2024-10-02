<?php
session_start();
include_once('../connection/connect.php');

$email = "";
if(isset($_GET['email'])){
    $email = $_GET['email'];
}

if(isset($_POST['submit'])){
    if(
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password'])
    ){
        $email = $_POST['email'];
        $senha = $_POST['password'];
        
        $query = "SELECT * FROM alunos where email = '$email'";
        $consulta = $connect->query($query);

        if($consulta->num_rows > 0){
            $aluno = $consulta->fetch_assoc();
            
            $hash = $aluno['senha_hash'];
            if(password_verify($senha, $hash)){
                // echo "<h4 style='color:red;width:275px;margin-left:calc(50vw - 275px / 2);position:fixed;';>Login feito para o usuário</h4>" . $aluno['nome'];
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                header('Location: home.php');
            } else{
                echo "<h4 style='color:red;width:275px;margin-left:calc(50vw - 275px / 2);position:fixed;';>Senha inválida</h4>";
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                // header('location: login.php');
            }
        } else {
            echo "<h4 style='color:red;width:275px;margin-left:calc(50vw - 275px / 2);position:fixed;';>Email não cadastrado</h4>";
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            // header('location: login.php');
        }
    } else {
        echo "<h4 style='color:red;width:275px;margin-left:calc(50vw - 275px / 2);position:fixed;';>Insira os dados corretamente</h4>";
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        // header('location: login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../src/imgs/icon.png">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <!-- <script src="../assets/scripts/script.js" defer></script> -->
    <title>Login</title>
</head>

<body>
    <a href="../index.php" class="back">Voltar</a>
    <main class="container">
        <div class="box1">
            <h1>Faça login <br> E entre para nossa comunidade</h1>
            <img src="../src/imgs/icon.png">
            <div class="vozesdacabeca"></div>
        </div>
        <div class="box2">
            <form method="post">
                <h2>Login</h2>
                <img src="../src/imgs/raposa.png">
                <div class="div1">
                    <input type="email" placeholder="Email" name="email" id="email">
                    <input type="password" placeholder="Senha" name="password" id="password">
                </div>
                <div class="div2">
                    <a href="register.php" id="cad">Cadastre-se</a>
                    <input type="submit" value="Entrar" name="submit">
                </div>
            </form>
        </div>
    </main>
</body>
</html>
