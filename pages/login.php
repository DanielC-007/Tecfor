<?php
include_once('../connection/connect.php');

$email = "";
if(isset($_GET['email'])){
    $email = $_GET['email'];
}

// cd TecFor

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
                echo "Login feito para o usuário " . $aluno['nome'];
            } else{
                echo "Senha inválida";
            }
        } else {
            echo "Email não cadastrado";
        }
    } else {
        echo "Insira os dados corretamente";
    }
}

// está nessa página mesmo?

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/register.css">
    <link rel="icon" href="../src/imgs/icon.png">
    <script src="../assets/scripts/script.js" defer></script>
    <title>Login</title>
</head>

<body>
    <main class="containerLogin">
        <!-- <button onclick="tema()">tema teste</button> -->
        <form method="post">
            <h1>Login</h1>
            <input type="email" value="<?php echo $email; ?>" placeholder="Email institucional" name="email" id="email">
            <div>
                <input type="password" placeholder="Senha" name="password" id="password">
                <img src="../src/imgs/openEyeDark.png" id="eye" onclick="exibirSenha()">
            </div>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>
