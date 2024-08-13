<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "conexaoTecfor";
$connect = mysqli_connect($servidor, $usuario, $senha, $banco);

if(mysqli_connect_errno()){
    die("Conexão falhou" . mysqli_connect_errno());
}

// $nome = $_POST['nameUser'];
// $email = $_POST['emailUser'];
// $senha = $_POST['passUser'];

// $sql = "INSERT INTO entrada (codigo_usuario, nome_usuario, senha_usuario, email_usuario) VALUES ('$nome', '$email', '$senha')";

// if (mysqli_query($conn, $sql)) {
//     echo "Dados inseridos com sucesso";
// } else {
//     echo "Erro ao inserir dados: " . mysqli_error($conn);
// }

// mysqli_close($conn);

?>