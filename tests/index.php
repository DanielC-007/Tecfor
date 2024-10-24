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


function enviarArquivo($error, $size, $name, $tmp_name) {
    include("conexao.php");

    if ($size > 2097152) {
        die("Arquivo muito grande!!");
    }

    $pasta = "arquivos/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);
    if ($deu_certo) {
        $mysqli->query("INSERT INTO arquivos (nome, path, data_uploaded) VALUES ('$nomeDoArquivo', '$path', NOW())") or die($mysqli->error);
        return true;
    } else {
        return false;
    }
}

if (isset($_FILES['arquivo'])) {
    $arquivos = $_FILES['arquivo'];
    $tudo_certo = true;
    foreach ($arquivos['name'] as $index => $name) {
        $deu_certo = enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $name, $arquivos['tmp_name'][$index]);
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="">
        <p><label for="">Selecione o arquivo</label>
        <input multiple name="arquivo[]" type="file"></p>
        <button name="upload" type="submit">Enviar arquivo</button>
    </form>

    <h1>Lista de Arquivos</h1>
    <table border="1" cellpadding="10">
        <thead>
            <th>Preview</th>
            <th>Arquivo</th>
            <th>Data de Envio</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php while ($arquivo = $sql_query->fetch_assoc()) { ?>
                <tr>
                    <td><img src="<?php echo $arquivo['path']; ?>" width="100"></td>
                    <td><a target="_blank" href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['nome']; ?></a></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_uploaded'])); ?></td>
                    <td><a href="index.php?deletar=<?php echo $arquivo['id']; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
// conexão.php file content
$host = "localhost";
$user = "root";
$pass = "";
$bd = "upload";

$mysqli = new mysqli($host, $user, $pass, $bd);

if ($mysqli->connect_errno) {
    echo "Connect failed: " . $mysqli->connect_error;
    exit();
}
?>
