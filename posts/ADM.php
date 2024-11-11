<?php
include_once("../php/filtro.php");
include("../connection/connect.php");

$sql_query = $connect->query("
    SELECT arquivos.*, alunos.nome AS nome_aluno, alunos.foto_perfil
    FROM arquivos
    JOIN alunos ON arquivos.id_aluno = alunos.id_aluno
    WHERE arquivos.ip_selecionado = 'ADM'
    ORDER BY arquivos.data_uploaded DESC
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
    <?php while ($arquivo = $sql_query->fetch_assoc()) { ?>
        <div class="publicacaoDiv">
            <img src="../posts/<?php echo $arquivo['path']; ?>">
            <div>
                <div class="postInfo">
                    <img class="imgUser" src="<?php echo htmlspecialchars($arquivo['foto_perfil']) ? htmlspecialchars($arquivo['foto_perfil']) : '../src/imgs/userDefault.png'; ?>">
                    <div>
                        <p><?php echo htmlspecialchars($arquivo['nome_aluno']); ?></p>
                        <p><?php echo date("d/m/Y", strtotime($arquivo['data_uploaded'])); ?></p>
                        <p><?php echo htmlspecialchars($arquivo['ip_selecionado']); ?></p>
                    </div>
                </div>
                <div class="titDesc">
                    <h1><?php echo htmlspecialchars($arquivo['titulo']); ?></h1>
                    <p><?php echo htmlspecialchars($arquivo['comentario']); ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
    </table>
</body>
</html>
