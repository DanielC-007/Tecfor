<?php
include_once("../php/filtro.php");
include("../connection/connect.php");

// Filtra apenas as publicações com 'DS' no ip_selecionado
$sql_query = $connect->query("
    SELECT arquivos.*, alunos.nome AS nome_aluno 
    FROM arquivos 
    JOIN alunos ON arquivos.id_aluno = alunos.id_aluno
    WHERE arquivos.ip_selecionado = 'ADM'
") or die($connect->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicações DS</title>
</head>
<body>
    <a href="index.php">Voltar</a>
    <h1>Lista de Arquivos Publicados - DS</h1>
    <table border="1" cellpadding="10">
        <thead>
            <th>Preview</th>
            <th>Nome do Usuário</th>
            <th>Comentário</th>
            <th>Opção IP</th>
            <th>Data de Envio</th>
        </thead>
        <tbody>
            <?php while ($arquivo = $sql_query->fetch_assoc()) { ?>
                <tr>
                    <td><img src="<?php echo $arquivo['path']; ?>" width="100"></td>
                    <td><?php echo htmlspecialchars($arquivo['nome_aluno']); ?></td>
                    <td><?php echo htmlspecialchars($arquivo['comentario']); ?></td>
                    <td><?php echo htmlspecialchars($arquivo['ip_selecionado']); ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_uploaded'])); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
