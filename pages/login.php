<?php
// include_once('../connection/connect.php');

// $email = "";
// if(isset($_GET['email'])){
//     $email = $_GET['email'];
// }

// if(isset($_POST['submit'])){
//     if(
//         isset($_POST['email']) &&
//         isset($_POST['password']) &&
//         !empty($_POST['email']) &&
//         !empty($_POST['password'])
//     ){
//         $email = $_POST['email'];
//         $senha = $_POST['password'];
        
//         $query = "SELECT * FROM alunos where email = '$email'";
//         $consulta = $connect->query($query);

//         if($consulta->num_rows > 0){
//             $aluno = $consulta->fetch_assoc();
            
//             $hash = $aluno['senha_hash'];
//             if(password_verify($senha, $hash)){
//                 echo "Login feito para o usuário " . $aluno['nome'];
//             } else{
//                 echo "Senha inválida";
//             }
//         } else {
//             echo "Email não cadastrado";
//         }
//     } else {
//         echo "Insira os dados corretamente";
//     }
// }

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
    <main class="container">
        <div class="box1">
            <h1>Faça login <br> E entre para nossa comunidade</h1>
            <img src="../src/imgs/icon.png">
            <div class="vozesdacabeca"></div>
        </div>
        <div class="box2">
            <form method="post" action="testeLogin.php">
                <h2>Login</h2>
                <img src="../src/imgs/raposa.png">
                <div class="div1">
                    <input type="email" placeholder="Email" name="email" id="email">
                    <input type="password" placeholder="Senha" name="password" id="password">
                </div>
                <div class="div2">
                    <button>
                        <a href="register.php">Cadastre-se</a>
                    </button>
                    <input type="submit" value="Entrar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>
