<?php
	$sql = "SELECT * FROM tb_Categoria";
	include "../conexao.php";
	$categoria = $conn -> prepare($sql);
	$categoria -> execute();
	$conn = null;
	
?>	

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Inserção de Produto</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  <body>
  <div class="container"> 
		<header>
		<h1>
			Inserção de Produto
		</h1>	
		</header>
		
		<main>
		<form action="carregarProduto.php" method="POST" enctype="multipart/form-data">
		
			Categoria <br>
			<select name="categ" class="campo" required><option></option></select>
			<br><br>
		
			Descrição <br>
			<input type="text" name="desc" class="campo" required>
			<br><br>
			
			Valor <br>
			<input type="text" name="valor" class="campo" required>
			<br><br>
			
			Fabricante <br>
			<input type="text" name="fab" class="campo" required>
			<br><br>
			
			Cor <br>
			<input type="text" name="cor" class="campo" required>
			<br><br>
			
			Quantidade <br>
			<input type="number" name="qntd" class="campo" required>
			<br><br>
			
			Imagem <br>
			<input type="file" name="img">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick='window.history.back();' id="voltar">
		</form>
		</main>
  </div>	
  </body>
</html>