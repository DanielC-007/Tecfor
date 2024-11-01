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
</head>
<body>
    <?php while ($arquivo = $sql_query->fetch_assoc()) { ?>
        <div class="publicacaoDiv">
            <img src="../posts/<?php echo $arquivo['path']; ?>" width="100">
            <div>
                <p><?php echo htmlspecialchars($arquivo['nome_aluno']); ?></p>
                <p><?php echo htmlspecialchars($arquivo['titulo']); ?></p>
                <p><?php echo htmlspecialchars($arquivo['comentario']); ?></p>
                <p><?php echo htmlspecialchars($arquivo['ip_selecionado']); ?></p>
                <p><?php echo date("d/m/Y H:i", strtotime($arquivo['data_uploaded'])); ?></p>
            </div>
        </div>
    <?php } ?>
</body>
</html>
