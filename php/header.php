<header>
<?php include_once("../posts/upload_foto.php");?>
    <div class="header">
        <button onclick="navOpenClose()">
            <img id="hamburger" src="../src/imgs/hamburgerDark.png" />
        </button>
        <img id="icon" src="../src/imgs/icon.png" />
        <button onclick="infoUserOpenClose()">
            <img id="user" src="../posts/<?php echo htmlspecialchars($aluno['foto_perfil']); ?>" />
        </button>
    </div>
</header>