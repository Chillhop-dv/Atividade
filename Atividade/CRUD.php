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


// Salvar
//if(isset($_GET['btnSalvar']))
if(!empty($_POST['btnSalvar'])) 
	$result = $conexao -> query("INSERT INTO alunos(Nome, Idade, Sexo, Cidade, Curso) VALUES(
																			  '".$_POST['nome']."', 
																			   '".$_POST['idade']."', 
																			  '".$_POST['selectSexo']."',
																			  '".$_POST['cidade']."',
																			  '".$_POST['curso']."')");

// Update

if(!empty($_GET['btnUpdate']))
	$result = $conexao -> query("UPDATE Alunos set Nome ='".$_GET['nome']."', 
												   Idade = '".$_POST['idade']."', 
												   Sexo = '".$_POST['selectSexo']."', 
												   cidade = '".$_POST['cidade']."',
												   curso = '".$_POST['curso']."'  
												   where  AlunosID = ".$_POST['AlunosID']);

// Deletar
if(!empty($_GET['del'])) // se não for vazio	
	$result = $conexao -> query("DELETE FROM alunos where AlunosID = ".$_POST['del']);
	

 if($result)
 	header('Location: inicio.php');
 else
 	echo "Erro: ". $conexao -> error;


$conexao->close();

?>		

