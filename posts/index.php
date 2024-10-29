<?php
include_once("../php/filtro.php");
include("../connection/connect.php");

if (isset($_GET['deletar'])) {
    $id = intval($_GET['deletar']);
    $sql_query = $connect->query("SELECT * FROM arquivos WHERE id = '$id'") or die($connect->error);
    $arquivo = $sql_query->fetch_assoc();

    if ($arquivo && isset($arquivo['path']) && file_exists($arquivo['path'])) {
        if (unlink($arquivo['path'])) {
            $deu_certo = $connect->query("DELETE FROM arquivos WHERE id = '$id'") or die($connect->error);
            if ($deu_certo) {
                echo "<p>Arquivo excluído com sucesso</p>";
            }
        } else {
            echo "<p>Falha ao excluir o arquivo</p>";
        }
    } else {
        echo "<p>Arquivo não encontrado</p>";
    }
}

function enviarArquivo($error, $size, $name, $tmp_name, $comentario, $ip_selecionado) {
    include("../connection/connect.php");

    // Obter o ID do usuário logado
    session_start();
    $email = $_SESSION['email'];
    $query = $connect->query("SELECT id_aluno FROM alunos WHERE email = '$email'");
    $aluno = $query->fetch_assoc();
    $id_aluno = $aluno['id_aluno'];

    if ($size > 2097152) {
        die("Arquivo muito grande!!");
    }

    $pasta = "arquivos/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
        die("Tipo de arquivo não aceito");
    }

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);
    if ($deu_certo) {
        $stmt = $connect->prepare("INSERT INTO arquivos (nome, path, comentario, ip_selecionado, data_uploaded, id_aluno) VALUES (?, ?, ?, ?, NOW(), ?)");
        $stmt->bind_param("ssssi", $nomeDoArquivo, $path, $comentario, $ip_selecionado, $id_aluno);
        $stmt->execute() or die($connect->error);
        return true;
    } else {
        return false;
    }
}


if (isset($_FILES['arquivo'])) {
    $arquivos = $_FILES['arquivo'];
    $comentario = $_POST['comentario'];
    $ip_selecionado = $_POST['ip_selecionado'];
    $tudo_certo = true;
    foreach ($arquivos['name'] as $index => $name) {
        $deu_certo = enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $name, $arquivos['tmp_name'][$index], $comentario, $ip_selecionado);
        if (!$deu_certo) {
            $tudo_certo = false;
        }
    }
    header("Location: ../pages/home.php");
    exit();
}

$sql_query = $connect->query("SELECT * FROM arquivos") or die($connect->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
        #preview {
            display: block;
            margin-top: 10px;
            max-width: 200px;
            max-height: 200px;
        }
    </style>
</head>
<body>
    <a href="../pages/home.php">voltar</a>
    <!-- <a href="arquivos_publicados.php">Arquivos</a>
    <a href="DS.php">DS</a>
    <a href="ADM.php">ADM</a>
    <a href="INFO.php">INFO</a>
    <a href="EDF.php">EDF</a> -->
    <form method="POST" enctype="multipart/form-data" action="">
        <p><label for="">Selecione o arquivo</label>
        <input multiple name="arquivo[]" type="file" onchange="previewImage(event)"></p>
        <img id="preview" src="" alt="Pré-visualização da imagem" style="display: none;">

        <p><label for="">Deixe um comentário</label><br>
        <textarea name="comentario" id="comentario" cols="30" rows="10"></textarea><br>

        <p>Escolha uma opção:</p>
        <label><input type="radio" name="ip_selecionado" value="DS" required> DS</label>
        <label><input type="radio" name="ip_selecionado" value="ADM" required> ADM</label>
        <label><input type="radio" name="ip_selecionado" value="EDF" required> EDF</label>
        <label><input type="radio" name="ip_selecionado" value="INFO" required> INFO</label><br>

        <button name="upload" type="submit">Enviar arquivo</button>
    </form>
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
</body>
</html>
