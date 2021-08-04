<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
	
	</script>
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
			<form action="login2.php" method="POST" id="myForm">
			<label>Email</label><br>
			<input type="email" id="email" name="email" class="imputbox" required> <br><br>
			
			<label>Senha</label><br>
			<input type="password" id="senha" name="senha" class="imputbox" required>
			<span id="olho" class="fa fa-eye-slash" onclick="mostrarOcultarSenha()"></span> <br><br>
			<script type="text/javascript" src="funcionalidades.js"></script>
			
			
			<input type="submit" value="Logar" id="buttonlogi1">
			<input type="button" value="Voltar" onclick="window.location.href='index.php';" id="buttonlogi2">
			</form>		
		</fieldset>
		</div>
		</main>
		<footer>
		 <br> <p>© 2021 de GABINETEC. Todos os direitos reservados.</p> <br>
		</footer>
  </div>
  </body>
</html>

		<!-- padilha.hiann@gmail.com | senha:h5

		cezar.jenzura@gmail.com | senha:c1

		patri.trik@gmail.com | senha:p3 -->