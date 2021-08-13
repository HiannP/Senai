<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Inserção de Categoria</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  <body>
  <div class="container"> 
		<header>
		<h1>
			Inserção de Categoria
		</h1>	
		</header>
		
		<main>
		<form action="carregarCategoria.php" method="POST" enctype="multipart/form-data">
		
			Nome:
			<input type="text" name="nome" class="campo" required>
			<br><br>
			
			OBS:
			<input type="text" name="obs" class="campo">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		</main>
  </div>
  </body>
</html>