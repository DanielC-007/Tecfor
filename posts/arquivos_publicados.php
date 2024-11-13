<?php
include("../connection/connect.php");

// Verifique se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../pages/login.php');
    exit();
}

// Defina o e-mail logado na variável
$logadoEmail = $_SESSION['email'];

// Obter `id_aluno` do usuário logado
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

// Verifique se há um comentário a ser inserido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_arquivo = $_POST['id_arquivo'];
    $comentario = $_POST['comentario'];

    // Insere o comentário usando o `id_aluno`
    $stmt = $connect->prepare("INSERT INTO comentarios (id_arquivo, id_aluno, comentario, data_comentario) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $id_arquivo, $id_aluno, $comentario);
    $stmt->execute();
    $stmt->close();

    // Redireciona de volta para evitar reenvio do formulário
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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquivos Publicados</title>
</head>
<body>
    <?php while ($arquivo = $sql_query->fetch_assoc()) { ?>
        <div class="publicacaoDiv">
            <img src="../posts/<?php echo $arquivo['path']; ?>">
            <div>
                <div class="postInfo">
                    <img class="imgUser" src="<?php echo htmlspecialchars($arquivo['foto_perfil']) ? htmlspecialchars($arquivo['foto_perfil']) : '../src/imgs/userDefault.png'; ?>">
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

                <!-- Comentários -->
                <div class="comentarios">
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
                            <img class="imgUser" src="<?php echo htmlspecialchars($comentario['foto_perfil']) ? htmlspecialchars($comentario['foto_perfil']) : '../src/imgs/userDefault.png'; ?>">
                            <div>
                                <h4><?php echo htmlspecialchars($comentario['nome_aluno']); ?></h4>
                                <p><?php echo htmlspecialchars($comentario['comentario']); ?></p>
                                <small><?php echo date("d/m/Y H:i", strtotime($comentario['data_comentario'])); ?></small>
                            </div>
                        </div>
                    <?php }
                    $comentarios_stmt->close();
                    ?>
                </div>

                <!-- Formulário de comentário -->
                <div class="comentarios">
                    <form action="" method="POST">
                        <input type="hidden" name="id_arquivo" value="<?php echo $arquivo['id']; ?>">
                        <textarea style="color: black;" name="comentario" placeholder="Escreva um comentário..." required></textarea>
                        <button type="submit">Comentar</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</body>
</html>
