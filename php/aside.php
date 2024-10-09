<button id="z" onclick="infoUserOpenClose()"></button>
  <aside id="infoUser">
    <img src="../src/imgs/userDark.png" />
    <h1><?php echo $logadoNome; ?></h1>
    <h5><?php print_r($logadoEmail);?></h5>
    <a href="../php/sair.php" class="sair">Sair</a>
  </aside>