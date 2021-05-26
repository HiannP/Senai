<?php
	$sql = "SELECT * FROM Produtos_tb";
	include "conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute();
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>index</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  <body>
		<header>
			<h1>GABINETEC</h1>
		</header>
		<br>
		<fieldset>
			<form action="/index.php">
			<label>Email:</label><br>
			<input type="email" id="em" name="email"> <br>
			
			<label>Senha:</label><br>
			<input type="passaword" id="se" name="senha"> <br><br>
	
			<input type="submit" value="Submit">
			</form> 
		</fieldset>
		<br>
		<footer>
		 <br> <p>© 2021 de GABINETEC. Todos os direitos reservados.</p> <br>
		</footer>
		
  </body>
</html>