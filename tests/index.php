<?php
include("conexao.php");

if (isset($_GET['deletar'])) {
    $id = intval($_GET['deletar']);
    $sql_query = $mysqli->query("SELECT * FROM arquivos WHERE id = '$id'") or die($mysqli->error);
    $arquivo = $sql_query->fetch_assoc();

    if ($arquivo && isset($arquivo['path']) && file_exists($arquivo['path'])) {
        if (unlink($arquivo['path'])) {
            $deu_certo = $mysqli->query("DELETE FROM arquivos WHERE id = '$id'") or die($mysqli->error);
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

function enviarArquivo($error, $size, $name, $tmp_name, $comentario) {
    include("conexao.php");

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
        $stmt = $mysqli->prepare("INSERT INTO arquivos (nome, path, comentario, data_uploaded) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sss", $nomeDoArquivo, $path, $comentario);
        $stmt->execute() or die($mysqli->error);
        return true;
    } else {
        return false;
    }
}

if (isset($_FILES['arquivo'])) {
    $arquivos = $_FILES['arquivo'];
    $comentario = $_POST['comentario'];
    $tudo_certo = true;
    foreach ($arquivos['name'] as $index => $name) {
        $deu_certo = enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $name, $arquivos['tmp_name'][$index], $comentario);
        if (!$deu_certo) {
            $tudo_certo = false;
        }
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
        /* Estilo para o elemento de pré-visualização */
        #preview {
            display: block;
            margin-top: 10px;
            max-width: 200px;
            max-height: 200px;
        }
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="">
        <p><label for="">Selecione o arquivo</label>
        <input multiple name="arquivo[]" type="file" onchange="previewImage(event)"></p>
        <img id="preview" src="" alt="Pré-visualização da imagem" style="display: none;">
        <p><label for="">Deixe um comentário</label><br>
        <textarea name="comentario" id="comentario" cols="30" rows="10"></textarea><br>
        <button name="upload" type="submit">Enviar arquivo</button>
    </form>

    <h1>Lista de Arquivos</h1>
    <table border="1" cellpadding="10">
        <thead>
            <th>Preview</th>
            <!-- <th>Arquivo</th> -->
            <th>Comentário</th>
            <th>Data de Envio</th>
            <!-- <th>Ações</th> -->
        </thead>
        <tbody>
            <?php while ($arquivo = $sql_query->fetch_assoc()) { ?>
                <tr>
                    <td><img src="<?php echo $arquivo['path']; ?>" width="100"></td>
                    <!-- <td><a target="_blank" href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['nome']; ?></a></td> -->
                    <td><?php echo htmlspecialchars($arquivo['comentario']); ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_uploaded'])); ?></td>
                    <!-- <td><a href="index.php?deletar=<?php echo $arquivo['id']; ?>">Delete</a></td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        // Função para pré-visualizar a imagem
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
