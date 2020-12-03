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

$result = $conexao -> query("SELECT * FROM alunos");

if(isset($_GET['alt']))
{
	$resultAlt = $conexao -> query("SELECT * FROM alunos where AlunosID = ".$_POST['alt'] );

	foreach ($resultAlt as $row) 
	{
		$AlunosIDAlt = $row["AlunosID"];
		$NomeAlt = $row["Nome"];
		$IdadeAlt = $row["Idade"];
		$SexoAlt = $row["Sexo"];
		$CidAlt = $row["Cidade"];
		$CursoAlt = $row["Curso"];
	}

}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
</head>
<body>
	<form method="POST" action="CRUD.php">
		<a href="index.php">Voltar</a>
		<div class="container">
		<table>
				<h3>Cadastro de pessoas</h3>
<tr>
		<td>
			
			<input type="hidden" name="AlunosID" value="<?php if(!empty($AlunosIDAlt)) echo $AlunosIDAlt; ?>">
			<label for="nome">Nome: </label>
			<input type="text" class="campo_nome" name="nome" placeholder="Digite seu nome..." id="nome" value="<?php if(!empty($NomeAlt)) echo $NomeAlt; ?>" required>
			<br/>
		</td>
<tr>
		<td>
			<label for="idade">Idade: </label>
			<input type="text" class="campo_idade" name="idade" placeholder="Digite sua idade..." id="idade"  value="<?php if(!empty($IdadeAlt)) echo $IdadeAlt; ?>" required>
			<br/>
		</td>
</tr>
<tr>
		<td>	
			<label for="cidade">Cidade: </label>
			<input type="text" class="campo_cidade" name="cidade" placeholder="Digite sua Cidade..." id="cidade" value="<?php if(!empty($CidAlt)) echo $CidAlt; ?>" required>
			<br/>
		</td>
</tr>
		<td>
		<label for="curso">Curso: </label>
		<input type="text" class="campo_curso" name="curso" placeholder="Digite seu Curso..." id="curso"  value="<?php if(!empty($CursoAlt)) echo $CursoAlt; ?>" required>
			
		</td>
</tr>
		<td>
		<label for="selectSexo">Sexo: </label>
		<select class="campo_sexo" name="selectSexo" required>
			<option value="" disabled selected>Escolha um Sexo</option>
			<?php

				if(!empty($SexoAlt))
				{
					if($SexoAlt == "F")
					{
						echo "<option value=\"$SexoAlt\" selected>Feminino</option>";
						echo "<option value=M>Masculino</option>";	
					}
					else
					{
						echo "<option value=\"$SexoAlt\" selected>Masculino</option>";
						echo "<option value=F>Feminino</option>";	
					}
				}
				else
				{
					echo "<option value=M>Masculino</option>";
					echo "<option value=F>Feminino</option>";
				}

			?>
			</td>
</tr>
<tr>
		<td>
			<br>
		<?php if (!empty($_POST['alt'])): ?>			
			<input type="submit" value="Salvar" name="btnUpdate">
		<?php else:	?>
			<input type="submit" value="Salvar" name="btnSalvar">
		<?php endif	?>	
			</td>
</tr>		
		
		
		</select>
		</table>

		<br/>
		<br/>




		<br/>
		<br/>

		<table border="2">
			<tr> 
				<td class="tabela_nome"> 
					Nome
				</td>
				<td class="tabela_nome"> 
					Idade
				</td>
				<td class="tabela_nome"> 
					Sexo
				</td>
				<td class="tabela_nome"> 
					Cidade
				</td>
				<td class="tabela_nome"> 
					Curso
				</td>
			</tr>

			<?php
				foreach ($result as $row) 
				{
			?>
					<tr> 
						<td> 
							<?php echo $row["Nome"] ?>
						</td>
						<td> 
							<?php echo $row["Idade"] ?>
						</td>
						<td> 
							<?php echo $row["Sexo"] ?>
						</td >
						<td> 
							<?php echo $row["Cidade"] ?>
						</td>
						<td> 
							<?php echo $row["Curso"] ?>
						</td>
						<td>
							<a href="inicio.php?alt=<?php echo $row["AlunosID"] ?>">Alterar</a>
						</td>
						<td>
							<a href="CRUD.php?del=<?php echo $row["AlunosID"] ?>">Excluir</a>
						</td>
					</tr>
			<?php
				}
			?>			

		</table>

	</div>

	</form>

</body>
</html>





