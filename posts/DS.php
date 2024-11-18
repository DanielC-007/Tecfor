<?php
include_once("../php/filtro.php");
include("../connection/connect.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../pages/login.php');
    exit();
}

// Define o e-mail logado na variável
$logadoEmail = $_SESSION['email'];

// Obtém `id_aluno` e nome do usuário logado
$sql = "SELECT id_aluno, nome FROM alunos WHERE email = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $logadoEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_aluno = $row['id_aluno'];
    $logadoNome = $row['nome'];
} else {
    $logadoNome = 'Usuário não encontrado';
}

$stmt->close();

// Processa a exclusão de publicações
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_arquivo_id'])) {
    $delete_arquivo_id = $_POST['delete_arquivo_id'];

    // Verifica se o usuário logado é o dono da publicação
    $stmt = $connect->prepare("SELECT path, id_aluno FROM arquivos WHERE id = ?");
    $stmt->bind_param("i", $delete_arquivo_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $arquivo = $result->fetch_assoc();
        
        if ($arquivo['id_aluno'] == $id_aluno) {
            // Apagar os comentários relacionados
            $stmt_delete_comments = $connect->prepare("DELETE FROM comentarios WHERE id_arquivo = ?");
            $stmt_delete_comments->bind_param("i", $delete_arquivo_id);
            $stmt_delete_comments->execute();
            $stmt_delete_comments->close();

            // Apagar a imagem do servidor
            $file_path = "../posts/" . $arquivo['path'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Apagar o arquivo da base de dados
            $stmt_delete_file = $connect->prepare("DELETE FROM arquivos WHERE id = ?");
            $stmt_delete_file->bind_param("i", $delete_arquivo_id);
            $stmt_delete_file->execute();
            $stmt_delete_file->close();

            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Você não tem permissão para excluir esta publicação.";
        }
    } else {
        echo "Publicação não encontrada.";
    }

    $stmt->close();
}

// Verifique se há um comentário a ser inserido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_arquivo = $_POST['id_arquivo'];
    $comentario = $_POST['comentario'];

    // Insere o comentário usando o id_aluno
    $stmt = $connect->prepare("INSERT INTO comentarios (id_arquivo, id_aluno, comentario, data_comentario) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $id_arquivo, $id_aluno, $comentario);
    $stmt->execute();
    $stmt->close();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

// Consulta para obter os arquivos e dados do usuário
$sql_query = $connect->query("
    SELECT arquivos.*, alunos.nome AS nome_aluno, alunos.foto_perfil
    FROM arquivos
    JOIN alunos ON arquivos.id_aluno = alunos.id_aluno
    ORDER BY arquivos.data_uploaded DESC
") or die($connect->error);

$sql_query = $connect->query("
    SELECT arquivos.*, alunos.nome AS nome_aluno, alunos.foto_perfil
    FROM arquivos
    JOIN alunos ON arquivos.id_aluno = alunos.id_aluno
    WHERE arquivos.ip_selecionado = 'DS'
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
                <?php if ($arquivo['id_aluno'] == $id_aluno) { ?>
                    <form method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta publicação?');">
                        <input type="hidden" name="delete_arquivo_id" value="<?php echo $arquivo['id']; ?>">
                        <button type="submit" class="dropPost">Excluir</button>
                    </form>
                    <!-- <button class="editPost" onclick="showEditForm(<?php echo $arquivo['id']; ?>)">Editar</button> -->
                <?php } ?>
            </div>
            <div class="titDesc">
                <h1><?php echo htmlspecialchars($arquivo['titulo']); ?></h1>
                <p><?php echo nl2br(wordwrap(htmlspecialchars($arquivo['comentario']), 28, "\n", true)); ?></p>
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
