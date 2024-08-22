<?php
  session_start();
  include_once('../connection/connect.php');
  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/styles/style.css" />
  <link rel="icon" href="../src/imgs/icon.png" />
  <script src="../assets/scripts/script.js" defer></script>
  <title>Home</title>
</head>

<body>
  <?php
  require_once("../php/all.php");
  ?>
  <main class="container">
    <div class="publicacaoDiv">
      <div class="cabecalho"><img src="../src/imgs/userDark.png"><?php print_r($logado);?></div>
      <div class="descricao"><h3>Veja esse incrível lobo!</h3></div>
      <img src="../src/imgs/Lobo.jpeg">
      <!-- <div class="rodape">/*cod do diego*/</div> -->
    </div>
  </main>
</body>

</html>