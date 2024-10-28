<?php
include_once("../php/filtro.php");
include("../connection/connect.php");

// Consulta para obter todos os arquivos do banco de dados
$sql_query = $connect->query("
    SELECT arquivos.*, alunos.nome AS nome_aluno 
    FROM arquivos 
    JOIN alunos ON arquivos.id_aluno = alunos.id_aluno
") or die($connect->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquivos Publicados</title>
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
    <a href="index.php">Voltar</a>
    <h1>Lista de Arquivos Publicados</h1>
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
            <td><?php echo htmlspecialchars($arquivo['nome_aluno']); ?></td> <!-- Nome do usuário -->
            <td><?php echo htmlspecialchars($arquivo['comentario']); ?></td>
            <td><?php echo htmlspecialchars($arquivo['ip_selecionado']); ?></td>
            <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_uploaded'])); ?></td>
        </tr>
    <?php } ?>
</tbody>
    </table>
</body>
</html>
