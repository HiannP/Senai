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
			Tabéla de Inserção de Usuario
		</h2>
		<hr>
		
		<form action="carregarP.php" method="POST" enctype="multipart/form-data">
		
			Nome:
			<input type="text" name="nome" required>
			<br><br>
			
			Email:
			<input type="email" name="email" required>
			<br><br>
			
			Senha:
			<input type="text" name="senha" required>
			<br><br>
			
			Perfil:
			<input type="number" name="perfil" required>
			<br><br>
			
			OBS:
			<input type="text" name="obs">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		<hr>
  </body>
</html>