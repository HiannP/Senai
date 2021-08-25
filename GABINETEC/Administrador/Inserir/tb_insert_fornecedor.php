<?php
	session_start();
	$Perfil = $_SESSION['perfil'];
	
	if(!isset($Perfil) or ($Perfil != 5)) {
		header('Location: ../login.php');
	}	
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Inserção de Fornecedor</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  <body>
  <div class="container"> 
		<header>
		<h1>
			Inserção de Fornecedor
		</h1>
		</header>
		
		<main>
		<form action="Envio/carregarFornecedor.php" method="POST" enctype="multipart/form-data">
		
			Nome:
			<input type="text" name="marca" class="campo" required>
			<br><br>
			
			Email:
			<input type="email" name="email" class="campo" required>
			<br><br>
			
			Telefone:
			<input type="tel" name="tele" placeholder="Ex: 3223-9339" pattern="[0-9]{4}-[0-9]{4}" class="campo"> <br><small style="color: gray;">(Opcional)</small>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick="window.location.href='../index.php';" id="voltar">
		</form>
		</main>
  </div>
  </body>
</html>