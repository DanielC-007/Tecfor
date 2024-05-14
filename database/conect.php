<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "alunos";
$conect = mysqli_connect($servidor, $usuario, $senha, $banco);

if(mysqli_connect_errno()){
    die("Conexão falhou" . mysqli_connect_errno());
}
?>