<?php
	
	$id_user = $_GET['id_user'];
	$sql1 = "SELECT * FROM tb_Usuarios WHERE id_user='$id_user'";
	include "../../conexao.php";
	$user = $conn -> prepare($sql1);
	$user -> execute();	
	$conn = null;
	foreach($user as $p){
		$nome = $p["nome"];
		$sobre = $p["sobrenome"];
		$email = $p["email"];
		$senha = $p["senha"];
		$perfil = $p["perfil"];
	}
	
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Alterar Produto</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../Inserir/insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  <body>
  <div class="container">
		<header>
		<h1>
			Alteração de Usuários
		</h1>
		</header>
		
		<main>
		<form action="atualizarUsuario.php" method="POST">
		
			<input type="hidden" name="id_user" value="$id_user">
		
			Nome 
			<input type="text" name="nome" value="<?php echo $nome; ?>" class="campo" required>
			<br><br>
			
			Sobrenome 
			<input type="text" name="sobrenome" value="<?php echo $sobre; ?>" class="campo" required>
			<br><br>
			
			Email
			<input type="email" name="email" value="<?php echo $email; ?>" class="campo" required>
			<br><br>
			
			Senha
			<input type="text" name="senha" value="<?php echo $senha; ?>" class="campo" maxlength="16" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,16}$).*$" 
			title="A senha deve conter de 8 a 16 caracteres com pelo menos uma letra maiúscula e minúscula, um número e um caractere especial" required> <br>
			<small style='color: gray; font-size: 70%;'>Apague o campo e preencha com a nova senha</small>
			<br><br>
			
			Perfil
			<input type="number" name="perfil" value="<?php echo $perfil; ?>" class="campo" required>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar"  onclick="window.location.href='../lista_usuarios.php';" id="voltar">
		</form>
		</main>
  </div>		
  </body>
</html>
