<?php
include_once("../php/filtro.php");
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
    <?php
    require_once("../posts/arquivos_publicados.php");
    ?>
  </main>
</body>

</html>
