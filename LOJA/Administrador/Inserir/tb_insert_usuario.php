<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Inserção de Usuário</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  <body>
  <div class="container"> 
		<header>
		<h1>
			Inserção de Usuário
		</h1>
		</header>
		
		<main>
		<form action="carregarUsuario.php" method="POST" enctype="multipart/form-data">
		
			Nome:
			<input type="text" name="nome" class="campo" required>
			<br><br>
			
			Sobrenome:
			<input type="text" name="sobrenome" class="campo" required>
			<br><br>
			
			Email:
			<input type="email" name="email" class="campo" required>
			<br><br>
			
			Senha:
			<input type="text" name="senha" class="campo" required>
			<br><br>
			
			Perfil:
			<input type="number" name="perfil" class="campo" required> <br><small style="color: gray; font-size: 45%;">(Níveis: 1 => Cliente | 3 => Colaborador | 5 => Administrador)</small>
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