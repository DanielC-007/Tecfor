<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" href="../src/imgs/icon.png">
    <script src="../assets/scripts/script.jsc"></script>
    <title>Nova publicação</title>
</head>
<body>
    <div class="containerPost">
        <form class="postFlexCollum" method="post" enctype="multipart/form-data">
            <div class="imgpub">
                <img src="../src/imgs/Lobo.jpeg" id="imgPublicacao">
            </div>
            <input type="file" name="postUser" id="fileImgUser">
            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Mensagem"></textarea>
            <input type="submit" value="Publicar" id="publicarPost">
        </form>
    </div>
</body>
</html>