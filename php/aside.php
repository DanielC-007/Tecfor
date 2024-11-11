<button id="z" onclick="infoUserOpenClose()"></button>
<?php include_once("../posts/upload_foto.php");?>
  <aside id="infoUser">
    <?php if (!empty($aluno['foto_perfil'])): ?>
        <img src="../posts/<?php echo htmlspecialchars($aluno['foto_perfil']); ?>">
    <?php else: ?>
      <img src="../src/imgs/userDark.png">
    <?php endif; ?>
    <h1><?php echo $logadoNome; ?></h1>
    <h5><?php print_r($logadoEmail);?></h5>
    <form method="POST" enctype="multipart/form-data" action="">
        <input type="file" name="foto_perfil" required>
      <button type="submit" name="upload">Enviar Foto</button>
    </form>
  </aside>