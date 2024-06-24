<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/styles/style.css" />
  <link rel="icon" href="../src/imgs/icon.png" />
  <script src="../assets/scripts/script.js" defer></script>
  <?php // require_once("../connection/connect.php"); ?>
  <title>Sala 1</title>
</head>

<body>
  <?php require_once ("../php/header.php"); ?>
  <div id="pesquisaDiv">
    <input type="search" name="barraPesquisa" id="barraPesquisa" />
    <button id="procurar"><img src="../src/imgs/busca.png" /></button>
  </div>

  <?php
  require_once ("../php/aside.php");
  require_once ("../php/nav.php");
  require_once ("../php/telaConfig.php");
  ?>

  <main class="container"></main>
</body>

</html>