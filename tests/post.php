<?php 
include_once('../connection/connect.php');
session_start();

// Obtém o ID do aluno a partir da sessão (ou outra fonte de autenticação)
$userId = isset($_SESSION['id_aluno']) ? $_SESSION['id_aluno'] : 0;

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se um arquivo foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
        // Diretório onde a imagem será salva
        $uploadDir = __DIR__ . '/uploads/' . $userId . '/';

        // Debugging: Verifica o diretório
        echo 'Diretório para upload: ' . $uploadDir . '<br>';

        // Cria o diretório se não existir
        if (!is_dir($uploadDir)) {
            if (mkdir($uploadDir, 0777, true)) {
                echo 'Diretório criado com sucesso.<br>';
            } else {
                echo 'Falha ao criar diretório.<br>';
                exit;
            }
        }

        // Caminho completo para o arquivo de destino
        $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);

        // Debugging: Verifica o caminho do arquivo
        echo 'Caminho do arquivo para upload: ' . $uploadFile . '<br>';

        // Move o arquivo enviado para o diretório de destino
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
            echo 'Arquivo enviado com sucesso.<br>';

            // Obtém o comentário do formulário, se definido
            $comentario = isset($_POST['comentario']) ? $connect->real_escape_string($_POST['comentario']) : '';

            // Insere os dados no banco de dados
            $sql = "INSERT INTO imagens (user_id, imagem_path, comentario) VALUES ($userId, '$uploadFile', '$comentario')";

            if ($connect->query($sql) === TRUE) {
                echo 'Dados salvos com sucesso.<br>';
                // Redireciona para evitar reenvio do formulário
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo 'Erro ao salvar os dados: ' . $connect->error . '<br>';
            }
        } else {
            echo 'Ocorreu um erro ao enviar a imagem.<br>';
        }
    } else {
        echo 'Nenhuma imagem foi enviada ou ocorreu um erro no envio.<br>';
    }
} else {
    echo 'Envie uma imagem e um comentário através do formulário.<br>';
}

$connect->close();
?>



<!-- Formulário HTML para enviar a imagem e o comentário -->
<form action="mural.php" method="post" enctype="multipart/form-data">
    Selecione uma imagem: <input type="file" id="fileInput" name="imagem" accept="image/*">
    <br>
    Comentário: <textarea name="comentario" rows="4" cols="50"></textarea>
    <div class="profile-pic">
        <img id="profileImage" src="user.png" alt="Foto de Perfil" />
    </div>
    <input type="submit" value="Enviar">
</form>

<link rel="stylesheet" href="../assets/styles/post.css">
<script>
    // Adiciona um listener para o evento de mudança no input de arquivo
document.getElementById('fileInput').addEventListener('change', function(event) {
    // Obtém o arquivo selecionado
    var file = event.target.files[0];

    // Verifica se um arquivo foi selecionado
    if (file) {
        // Cria um objeto URL para o arquivo
        var reader = new FileReader();

        // Define o que fazer quando o arquivo é lido
        reader.onload = function(e) {
            // Atualiza o src da imagem com o URL do arquivo
            document.getElementById('profileImage').src = e.target.result;
        };

        // Lê o arquivo como uma URL de dados
        reader.readAsDataURL(file);
    }
});

</script>
