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
			<input type="text" name="categ" class="campo" required>
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
			
			OBS <br>
			<input type="text" name="obs" class="campo">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		</main>
  </div>	
  </body>
</html>