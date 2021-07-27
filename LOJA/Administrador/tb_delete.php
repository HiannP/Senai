<?php
	$id = $_GET['id_prod'];
	$desc = $_GET['descricao'];
	$img = $_GET['img'];

	if(isset($_POST['sim'])){
	unlink("../imge/$img.jpg");
	$sql = "DELETE FROM Produtos_tb WHERE id_prod='$id'";
	include "conexao.php";
	$delete = $conn -> prepare($sql);
	$delete -> execute();	
	$conn = null;
	
	echo "<script>
				alert('Produto excluido com sucesso!'); 
				window.location.href='index.php'; 
		 </script>";
	}
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Deletar Produtos</title>
	</head>	
	
	<header>
	<h1 align="center">Excluir Produto?</h1>
	</header>
		
		<p>
				<p align="center">ID: <?php echo $id; ?></p>
				<p align="center">Produto: <?php echo $desc; ?></p>
		</p>
		
		<center>	
			<form method="POST" action="#">
				<input type="submit" name="sim" value="Sim">
				<input type="button" value="Não" onclick='window.history.back();'>
			</form>
		</center>
	</body>
</html>