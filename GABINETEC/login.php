<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="funcionalidades.js"></script>
	<link rel="stylesheet" type="text/css" href="login style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">

  </head>
  <body>
  <div class="container"> 
		<header>
			<h1>GABINETEC</h1>
		</header>
		<br>
		<main>
		<div id="boxfield">
		<fieldset id="boxlogi">
			<form action="carregarLogin.php" method="POST">
			<label>Email</label><br>
			<input type="email" id="email" name="email" class="imputbox" required> <br><br>
			
			<label>Senha</label><br>
			<input type="password" id="senha" name="senha" class="imputbox" required> <br>
			<input type="checkbox" onclick="mostrarOcultarSenha()" id="checkbox"> <small id="legend" style="font-size: 70%; ">Mostrar Senha</small> <br><br>
			
			<input type="submit" value="Logar" id="buttonlogi1">
			<input type="button" value="Voltar" onclick="window.location.href='index.php';" id="buttonlogi2">
			
			<br><br>
			<p class="cadastro">Não possui um cadastrado? <a id="cadastro1" href="cadastro.php">Clique aqui.</a></p>
			</form>		
		</fieldset>
		</div>
		</main>
  </div>
  </body>
</html>