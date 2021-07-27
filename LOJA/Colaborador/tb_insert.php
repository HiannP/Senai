<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Doc</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
		<hr>
		<h2>
			Tabéla de Inserção de Produtos
		</h2>
		<hr>
		
		<form action="carregar1.php" method="POST" enctype="multipart/form-data">
		
			Categoria:
			<input type="text" name="categ">
			<br><br>
		
			Descrição:
			<input type="text" name="desc">
			<br><br>
			
			Valor:
			<input type="text" name="valor">
			<br><br>
			
			Fabricante:
			<input type="text" name="fab">
			<br><br>
			
			Cor:
			<input type="text" name="cor">
			<br><br>
			
			Quantidade:
			<input type="number" name="qntd">
			<br><br>
			
			Imagem:
			<input type="file" name="img">
			<br><br>
			
			OBS:
			<input type="text" name="obs">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		<hr>
  </body>
</html>