<?php
// Inclui o arquivo de conexão com o banco de dados
include_once('../connection/connect.php');

// Busca todas as imagens e comentários do banco de dados
$sql = "SELECT imagens.imagem_path, imagens.comentario, alunos.nome 
        FROM imagens 
        JOIN alunos ON imagens.user_id = alunos.id_aluno
        ORDER BY imagens.id DESC";

// Executa a consulta
$result = $connect->query($sql);

// Verifica se a consulta falhou
if (!$result) {
    die("Erro na consulta: " . $connect->error);
}

// Inicia a exibição HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="styles.css"> <!-- Adicione seu CSS aqui -->
</head>
<body>
    <h1>Posts</h1>
    <?php
    if ($result->num_rows > 0) {
        // Exibe cada post
        while ($row = $result->fetch_assoc()) {
            echo '<div class="post">';
            echo '<h2>' . htmlspecialchars($row['nome']) . '</h2>';
            echo '<img src="' . htmlspecialchars($row['imagem_path']) . '" alt="Imagem do post" style="max-width: 100%; height: auto;">';
            echo '<p>' . htmlspecialchars($row['comentario']) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>Nenhum post encontrado.</p>';
    }

    // Fecha a conexão com o banco de dados
    $connect->close();
    ?>
</body>
</html>
