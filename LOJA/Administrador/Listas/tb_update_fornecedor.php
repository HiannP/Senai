<?php
	
	$id = $_GET['id_marcas'];
	$sql = "SELECT * FROM tb_Marcas WHERE id_marcas='$id'";
	include "../conexao.php";
	$forn = $conn -> prepare($sql);
	$forn -> execute();	
	$conn = null;
	foreach($forn as $p){
		$nome = $p["nome"];
		$email = $p["email"];
		$tel = $p["telefone"];
		$obs = $p["obs"];
	}
	
	if(isset($_POST['salvar'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$tel = $_POST['telefone'];
		$obs = $_POST['obs'];
		
	$sql = "
		UPDATE tb_Marcas SET 
		nome=?,
		email=?,
		telefone=?,
		obs=?
		WHERE id_marcas=?
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($nome, $email, $tel, $obs, $id));	
	$conn = null;
	
	echo" <script>
		alert('Fornecedor alterado com sucesso!');
		window.location.href='index.php';
		</script>";
	}
?>
<html lang="pt-br">
  <head>
    <title>Alterar Fornecedor</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insert style.css">
  </head>
  <body>
		<hr>
		<h2>
			Alteração de Fornecedor
		</h2>
		<hr>
		
		<form action="#" method="POST">
		
			Nome: 
			<input type="text" name="nome" value="<?php echo $nome; ?>" required>
			<br><br>
			
			Email:
			<input type="text" name="email" value="<?php echo $email; ?>" required>
			<br><br>
			
			Telefone:
			<input type="tel" name="tele" value="<?php echo $tel; ?>" pattern="[0-9]{4}-[0-9]{4}"> <small style="color: gray;">(Opcional)</small>
			<br><br>
			
			OBS:
			<input type="text" name="obs" value="<?php echo $obs; ?>">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		<hr>
  </body>
</html>