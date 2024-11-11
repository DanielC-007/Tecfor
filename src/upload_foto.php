<?php
include("../connection/connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto_perfil'])) {
    $email = $_SESSION['email'];
    $query = $connect->query("SELECT id_aluno, foto_perfil FROM alunos WHERE email = '$email'");
    $aluno = $query->fetch_assoc();
    $id_aluno = $aluno['id_aluno'];
    $foto_perfil_atual = $aluno['foto_perfil']; // Pega a foto atual

    $arquivo = $_FILES['foto_perfil'];
    $size = $arquivo['size'];
    $tmp_name = $arquivo['tmp_name'];
    $name = $arquivo['name'];

    // Verifica o tamanho do arquivo (limite: 2MB)
    if ($size > 2097152) {
        die("Arquivo muito grande!!");
    }

    $pasta = "../src/fotos_perfil/";
    $novoNomeArquivo = uniqid() . "." . strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $path = $pasta . $novoNomeArquivo;

    // Verifica o tipo do arquivo
    $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (!in_array($extensao, ['jpg', 'jpeg', 'png'])) {
        die("Tipo de arquivo não permitido. Apenas JPG, JPEG e PNG são aceitos.");
    }

    // Deleta a foto antiga, se existir
    if (!empty($foto_perfil_atual) && file_exists($foto_perfil_atual)) {
        unlink($foto_perfil_atual);
    }

    // Move o arquivo para a pasta de destino
    if (move_uploaded_file($tmp_name, $path)) {
        // Atualiza o caminho da foto de perfil no banco de dados
        $stmt = $connect->prepare("UPDATE alunos SET foto_perfil = ? WHERE id_aluno = ?");
        $stmt->bind_param("si", $path, $id_aluno);
        $stmt->execute() or die($connect->error);

        // Redireciona para evitar reenvio do formulário
        header("Location: home.php");
        exit();
    } else {
        echo "<p>Falha ao enviar a foto de perfil.</p>";
    }
}


// Obtém as informações do usuário logado
$email = $_SESSION['email'];
$query = $connect->query("SELECT nome, foto_perfil FROM alunos WHERE email = '$email'");
$aluno = $query->fetch_assoc();
?>