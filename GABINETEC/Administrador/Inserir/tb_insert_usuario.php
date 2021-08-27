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
		<form action="Envio/carregarUsuario.php" method="POST" enctype="multipart/form-data">
		
			Nome
			<input type="text" name="nome" class="campo" required>
			<br><br>
			
			Sobrenome
			<input type="text" name="sobrenome" class="campo" required>
			<br><br>
			
			Email
			<input type="email" name="email" class="campo" required>
			<br><br>
			
			Senha
			<input type="text" name="senha" class="campo" maxlength="16" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,16}$).*$" 
			title="A senha deve conter de 8 a 16 caracteres com pelo menos uma letra maiúscula e minúscula, um número e um caractere especial" required>
			<br><br>
			
			Perfil <br>
			<input type="radio" name="perfil" value="1" required>
			<label class="campo" for="html">Cliente</label>
			<input type="radio" name="perfil" value="3" required>
			<label class="campo" for="css">Colaborador</label>
			<input type="radio" name="perfil" value="5" required>
			<label class="campo" for="javascript">ADM</label>
			<br><br>
			
			OBS
			<input type="text" name="obs" class="campo">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick="window.location.href='../index.php';" id="voltar">
		</form>
		</main>
  </div>
  </body>
</html>