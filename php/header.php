<header>
<?php include_once("../src/upload_foto.php");?>
    <div class="header">
        <button onclick="navOpenClose()">
            <img id="hamburger" src="../src/imgs/hamburgerDark.png" />
        </button>
        <img id="icon" src="../src/imgs/icon.png" />
        <button onclick="infoUserOpenClose()">
        <?php if (!empty($aluno['foto_perfil'])): ?>
            <img class="imgUser" src="../posts/<?php echo htmlspecialchars($aluno['foto_perfil']); ?>">
        <?php else: ?>
            <img id="user" class="imgUser" src="../src/imgs/userDark.png">
        <?php endif; ?>
        </button>
    </div>
</header>