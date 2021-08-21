<?php
	
	$id = $_GET['id_user'];
	$sql = "SELECT * FROM tb_Usuarios WHERE id_user='$id'";
	include "../conexao.php";
	$user = $conn -> prepare($sql);
	$user -> execute();	
	$conn = null;
	foreach($user as $p){
		$nome = $p["nome"];
		$email = $p["email"];
		$senha = $p["senha"];
		$perfil = $p["perfil"];
	}
	
	if(isset($_POST['salvar'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$perfil = $_POST['perfil'];
		
	$sql = "
		UPDATE Usuarios_tb SET 
		nome=?,
		email=?,
		senha=?,
		perfil=?,
		WHERE id_user=?
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($nome, $email, $senha, $perfil, $id));	
	$conn = null;
	
	echo" <script>
		alert('Usuário alterado com sucesso!');
		window.location.href='index.php';
		</script>";
	}
?>
<html lang="pt-br">
  <head>
    <title>Alterar Produto</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../Inserir/insert style.css">
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
		<form action="#" method="POST">
		
			Nome: 
			<input type="text" name="nome" value="<?php echo $nome; ?>" class="campo" required>
			<br><br>
			
			Email:
			<input type="text" name="email" value="<?php echo $email; ?>" class="campo" required>
			<br><br>
			
			Senha:
			<input type="text" name="senha" value="<?php echo $senha; ?>" class="campo" required>
			<br><br>
			
			Perfil:
			<input type="text" name="perfil" value="<?php echo $perfil; ?>" class="campo" required>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick='window.history.back();' id="voltar">
		</form>
		</main>
  </div>		
  </body>
</html>
