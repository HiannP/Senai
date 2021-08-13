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
		$obs = $p["obs"];
	}
	
	if(isset($_POST['salvar'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$perfil = $_POST['perfil'];
		$obs = $_POST['obs'];
		
	$sql = "
		UPDATE Usuarios_tb SET 
		nome=?,
		email=?,
		senha=?,
		perfil=?,
		obs=?
		WHERE id_user=?
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($nome, $email, $senha, $perfil, $obs, $id));	
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
	<link rel="stylesheet" type="text/css" href="insert style.css">
  </head>
  <body>
		<hr>
		<h2>
			Alteração de Usuários
		</h2>
		<hr>
		
		<form action="#" method="POST">
		
			Nome: 
			<input type="text" name="nome" value="<?php echo $nome; ?>" required>
			<br><br>
			
			Email:
			<input type="text" name="email" value="<?php echo $email; ?>" required>
			<br><br>
			
			Senha:
			<input type="text" name="senha" value="<?php echo $senha; ?>" required>
			<br><br>
			
			Perfil:
			<input type="text" name="perfil" value="<?php echo $perfil; ?>" required>
			<br><br>
			
			OBS:
			<input type="text" name="obs" value="<?php echo $obs; ?>">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		<hr>
  </body>
</html>
