<!-- Formulário HTML para enviar a imagem -->
<form action="" method="post" enctype="multipart/form-data">
    Selecione uma imagem: <input type="file" id="fileInput" name="imagem" accept="image/*">
    <div class="profile-pic">
        <img id="profileImage" src="user.png" alt="Foto de Perfil" />
    </div>
    <?php

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Verifica se um arquivo foi enviado
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
            // ID do usuário - pode ser obtido da sessão ou de outro meio
            $userId = 555; // Exemplo de ID do usuário

            // Diretório onde a imagem será salva
            $uploadDir = __DIR__ . '/uploads/' . $userId . '/';

            // Cria o diretório se não existir
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Caminho completo para o arquivo de destino
            $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);

            // Move o arquivo enviado para o diretório de destino
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
                echo "A imagem foi enviada com sucesso!";
            } else {
                echo "Ocorreu um erro ao enviar a imagem.";
            }
        } else {
            echo "Nenhuma imagem foi enviada ou ocorreu um erro no envio.";
        }
    } else {
        echo "Envie uma imagem através do formulário.";
    }
    ?>
        <input type="submit" value="Enviar">
</form>

<link rel="stylesheet" href="../assets/styles/post.css">
<script src="../assets/script/post.js"></script>
