<button id="z" onclick="infoUserOpenClose()"></button>
<?php include_once("../src/upload_foto.php");?>
  <aside id="infoUser">
    <?php if (!empty($aluno['foto_perfil'])): ?>
        <img id="preview" src="../posts/<?php echo htmlspecialchars($aluno['foto_perfil']); ?>">
    <?php else: ?>
      <img id="preview" src="../src/imgs/userDefault.png">
    <?php endif; ?>
    <h1><?php echo $logadoNome; ?></h1>
    <h5><?php print_r($logadoEmail);?></h5>
    <form method="POST" enctype="multipart/form-data" action="">
        <label for="foto_perfil" class="custom-file-label">Mudar foto de perfil</label>
        <input type="file" name="foto_perfil" id="foto_perfil" required style="display:none;" onchange="previewImage(event)">
      <button type="submit" name="upload">Confirmar Foto</button>
    </form>
  </aside>

  <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>