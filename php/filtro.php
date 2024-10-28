<?php
session_start();
include_once('../connection/connect.php');

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit();
}

$logadoEmail = $_SESSION['email'];

// Recuperar o nome do usuário do banco de dados
$sql = "SELECT nome FROM alunos WHERE email = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $logadoEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $logadoNome = $row['nome'];
} else {
    $logadoNome = 'Usuário não encontrado';
}

$stmt->close();
$connect->close();
?>