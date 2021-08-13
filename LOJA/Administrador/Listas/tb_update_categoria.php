<?php
	
	$id = $_GET['id_categoria'];
	$sql = "SELECT * FROM tb_Categoria WHERE id_categoria='$id'";
	include "../conexao.php";
	$categ = $conn -> prepare($sql);
	$categ -> execute();	
	$conn = null;
	foreach($categ as $p){
		$nome = $p["nome"];
		$obs = $p["obs"];
	}
	
	if(isset($_POST['salvar'])){
		$nome = $_POST['nome'];
		$obs = $_POST['obs'];
		
	$sql = "
		UPDATE tb_Categoria SET 
		nome=?,
		obs=?
		WHERE id_categoria=?
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($nome, $obs, $id));	
	$conn = null;
	
	echo" <script>
		alert('Categoria alterada com sucesso!');
		window.location.href='index.php';
		</script>";
	}
?>
<html lang="pt-br">
  <head>
    <title>Alterar Categoria</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insert style.css">
  </head>
  <body>
		<hr>
		<h2>
			Alteração de Categoria
		</h2>
		<hr>
		
		<form action="#" method="POST">
		
			Nome: 
			<input type="text" name="nome" value="<?php echo $nome; ?>" required>
			<br><br>
			
			OBS:
			<input type="text" name="obs" value="<?php echo $obs; ?>">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		<hr>
  </body>
</html>
