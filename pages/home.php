<?php
session_start();
include_once('../connection/connect.php');

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit();
}

$logadoEmail = $_SESSION['email'];

// Recuperar o nome do usuário do banco de dados
$sql = "SELECT nome FROM alunos WHERE email = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $logadoEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $logadoNome = $row['nome'];
} else {
    $logadoNome = 'Usuário não encontrado';
}

$stmt->close();
$connect->close();
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
      <div class="cabecalho"><img src="../src/imgs/userDark.png"><?php echo $logadoNome; ?></div>
      <div class="descricao"><h3>Veja esse incrível lobo!</h3></div>
      <img src="../src/imgs/Lobo.jpeg">
      <!-- <div class="rodape">/*cod do diego*/</div> -->
    </div>
  </main>
</body>

</html>
