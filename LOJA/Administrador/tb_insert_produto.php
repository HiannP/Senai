<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Inserção de Produto</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
		<hr>
		<h2>
			Inserção de Produto
		</h2>
		<hr>
		
		<form action="carregar1.php" method="POST" enctype="multipart/form-data">
		
			Categoria:
			<input type="text" name="categ" required>
			<br><br>
		
			Descrição:
			<input type="text" name="desc" required>
			<br><br>
			
			Valor:
			<input type="text" name="valor" required>
			<br><br>
			
			Fabricante:
			<input type="text" name="fab" required>
			<br><br>
			
			Cor:
			<input type="text" name="cor" required>
			<br><br>
			
			Quantidade:
			<input type="number" name="qntd" required>
			<br><br>
			
			Imagem:
			<input type="file" name="img" required>
			<br><br>
			
			OBS:
			<input type="text" name="obs">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		<hr>
  </body>
</html>