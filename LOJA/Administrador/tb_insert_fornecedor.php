<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Inserção de Fornecedor</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
		<hr>
		<h2>
			Inserção de Fornecedor
		</h2>
		<hr>
		
		<form action="#" method="POST" enctype="multipart/form-data">
		
			Nome:
			<input type="text" name="nome" required>
			<br><br>
			
			Email:
			<input type="email" name="email" required>
			<br><br>
			
			Telefone:
			<input type="tel" name="tele" pattern="[0-9]{4}-[0-9]{4}"> <small>(Opcional)</small>
			<br><br>
			
			OBS:
			<input type="text" name="obs">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		<hr>
  </body>
</html>