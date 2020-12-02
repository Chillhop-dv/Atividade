<?php

$server = "de1tmi3t63foh7fa.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "gy3exai7wk7e9sg0";
$password = "llo3oub1rpdp2rqe";
$banco = "prvf4e1byhpdus1l";

//criar uma conexão
$conexao = new mysqli($server, $user, $password, $banco);

// Testar a conexão
if($conexao -> connect_error)
	echo "A conexão falhou: ".$conexao -> connect_error;

?>
