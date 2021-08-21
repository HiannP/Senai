<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="funcionalidades.js"></script>
	<link rel="stylesheet" type="text/css" href="cadastro style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  <body>
  <div class="container"> 
		<header>
		<h1>
			Cadastro
		</h1>
		</header>
		
		<main>
		<form name="formCadastrar" action="carregarCadastro.php" method="POST" enctype="multipart/form-data">
		
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
			<input type="text" name="senha" class="campo" maxlength="16" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,16}$).*$" title="A senha deve conter de 8 a 16 caracteres com pelo menos uma letra maiúscula e minúscula, um número e um caractere especial" required>
			<br><br>
			
			Confirmar Senha:
			<input type="text" name="confiSenha" class="campo" maxlength="16" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,16}$).*$" title="A senha deve conter de 8 a 16 caracteres com pelo menos uma letra maiúscula e minúscula, um número e um caractere especial" required>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" onsubmit="return validar()" id="salvar">
			<input type="button" value="Voltar" onclick='window.history.back();' id="voltar">
		</form>
		</main>
  </div>
  </body>
</html>