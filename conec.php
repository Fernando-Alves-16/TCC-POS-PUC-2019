<?php

// dados para conectar ao banco de dados

$dbServername = "valor do nome do servidor";
$dbUsername = "valor do nome do usuario";
$dbPassword = "valor da senha";
$dbName = "valor do nome do banco";

// parametros: Nome Servidor, Nome Usuario, 
// Senha, Nome do Banco de Dados
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

?>
