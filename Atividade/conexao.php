<?php

$server = "localhost";
$user = "root";
$password = "";
$banco = "teste";

//criar uma conexão
$conexao = new mysqli($server, $user, $password, $banco);

// Testar a conexão
if($conexao -> connect_error)
	echo "A conexão falhou: ".$conexao -> connect_error;

?>
