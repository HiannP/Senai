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
		<form action="Envio/carregarCategoria.php" method="POST" enctype="multipart/form-data">
		
			Nome:
			<input type="text" name="categ" class="campo" required>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick="window.location.href='../index.php';" id="voltar">
		</form>
		</main>
  </div>
  </body>
</html>