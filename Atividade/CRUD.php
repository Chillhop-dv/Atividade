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


// Salvar
//if(isset($_GET['btnSalvar']))
if(!empty($_GET['btnSalvar'])) 
	$result = $conexao -> query("INSERT INTO alunos(Nome, Idade, Sexo, Cidade, Curso) VALUES(
																			  '".$_GET['nome']."', 
																			   ".$_GET['idade'].", 
																			  '".$_GET['selectSexo']."',
																			  '".$_GET['cidade']."',
																			  '".$_GET['curso']."')");

// Update
if(!empty($_GET['btnUpdate']))
	$result = $conexao -> query("UPDATE Alunos set Nome ='".$_GET['nome']."', 
												   Idade = ".$_GET['idade'].", 
												   Sexo = '".$_GET['selectSexo']."', 
												   cidade = '".$_GET['cidade']."',
												   curso = '".$_GET['curso']."'  
												   where  AlunosID = ".$_GET['AlunosID']);

// Deletar
if(!empty($_GET['del'])) // se não for vazio	
	$result = $conexao -> query("DELETE FROM alunos where AlunosID = ".$_GET['del']);
	

if($result)
	header('Location: inicio.php');
else
	echo "Erro: ". $conexao -> error;


$conexao->close();

?>		

