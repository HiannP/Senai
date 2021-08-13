<?php
	$id = $_GET['id_user'];
	$nome = $_GET['nome'];

	if(isset($_POST['sim'])){
	$sql = "DELETE FROM tb_Usuarios WHERE id_user='$id'";
	include "../conexao.php";
	$delete = $conn -> prepare($sql);
	$delete -> execute();	
	$conn = null;
	
	echo "<script>
				alert('Usuario excluido com sucesso!'); 
				window.location.href='index.php'; 
		 </script>";
	}
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="insert style.css">
		<title>Deletar Usuario</title>
	</head>	
	
	<header>
	<h1 align="center">Excluir Usuario?</h1>
	</header>
		
		<p>
				<p align="center">ID: <?php echo $id; ?></p>
				<p align="center">Nome: <?php echo $nome; ?></p>
		</p>
		
		<center>	
			<form method="POST" action="#">
				<input type="submit" name="sim" value="Sim">
				<input type="button" value="Não" onclick='window.history.back();'>
			</form>
		</center>
	</body>
</html>