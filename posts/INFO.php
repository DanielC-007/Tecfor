<?php
include_once("../php/filtro.php");
include("../connection/connect.php");

$sql_query = $connect->query("
    SELECT arquivos.*, alunos.nome AS nome_aluno, alunos.foto_perfil
    FROM arquivos
    JOIN alunos ON arquivos.id_aluno = alunos.id_aluno
    WHERE arquivos.ip_selecionado = 'INFO'
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
        <div class="caixa2" >
            <div class="postInfo">
                <img class="imgUser"
                    src="<?php echo htmlspecialchars($arquivo['foto_perfil']) ? htmlspecialchars($arquivo['foto_perfil']) : '../src/imgs/userDefault.png'; ?>">
                <div>
                    <h4><?php echo htmlspecialchars($arquivo['nome_aluno']); ?></h4>
                    <h6><?php echo date("d/m/Y", strtotime($arquivo['data_uploaded'])); ?></h6>
                    <h5><?php echo htmlspecialchars($arquivo['ip_selecionado']); ?></h5>
                </div>
            </div>
            <div class="titDesc">
                <h1><?php echo htmlspecialchars($arquivo['titulo']); ?></h1>
                <p><?php echo htmlspecialchars($arquivo['comentario']); ?></p>
            </div>
            <div class="caixaspcbtw">
                <div class="comentarios">
                    <h3>Comentários</h3>
                    <?php
                                    // Consulta para obter os comentários do arquivo atual
                                    $comentarios_stmt = $connect->prepare("
                                        SELECT comentarios.*, alunos.nome AS nome_aluno, alunos.foto_perfil
                                        FROM comentarios
                                        JOIN alunos ON comentarios.id_aluno = alunos.id_aluno
                                        WHERE comentarios.id_arquivo = ?
                                        ORDER BY comentarios.data_comentario DESC
                                    ");
                                    $comentarios_stmt->bind_param("i", $arquivo['id']);
                                    $comentarios_stmt->execute();
                                    $comentarios_result = $comentarios_stmt->get_result();
                                    while ($comentario = $comentarios_result->fetch_assoc()) { ?>
                    <div class="comentario">
                        <div>
                            <img class="imgUser"
                                src="<?php echo htmlspecialchars($comentario['foto_perfil']) ? htmlspecialchars($comentario['foto_perfil']) : '../src/imgs/userDefault.png'; ?>">
                            <div>
                                <h4><?php echo htmlspecialchars($comentario['nome_aluno']); ?></h4>
                                <h6><?php echo date("d/m/Y", strtotime($comentario['data_comentario'])); ?></>
                            </div>
                        </div>
                        <p><?php echo nl2br(wordwrap(htmlspecialchars($comentario['comentario']), 28, "\n", true)); ?>
                        </p>
                    </div>
                    <?php }
                            $comentarios_stmt->close();
                        ?>
                </div>
                <div class="comentar">
                    <form action="" method="POST">
                        <!-- <button class="like-button" id="likeBtn">
                                <span class="heart empty"><img src="../src/imgs/heartNull.png"></span>
                                <span class="heart filled"><img src="../src/imgs/heartCheio.png"></span>
                            </button> -->
                        <input type="hidden" name="id_arquivo" value="<?php echo $arquivo['id']; ?>">
                        <textarea name="comentario" placeholder="Escreva um comentário..." required></textarea>
                        <button type="submit">Comentar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    </table>
</body>
</html>
