<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "conexaoTecfor";
$connect = mysqli_connect($servidor, $usuario, $senha, $banco);

if(mysqli_connect_errno()){
    die("Conexão falhou" . mysqli_connect_errno());
}

// $servidor = "localhost";
// $usuario = "u774820395_DanielCarlos";
// $senha = "Segunda@10";
// $banco = "u774820395_conexaoTecFor";
// $connect = mysqli_connect($servidor, $usuario, $senha, $banco);

// if(mysqli_connect_errno()){
//     die("Conexão falhou" . mysqli_connect_errno());
// }

?>