<?php
	$id = $_GET['id_marcas'];
	$nome = $_GET['nome'];

	if(isset($_POST['sim'])){
	$sql = "DELETE FROM tb_Marcas WHERE id_marcas='$id'";
	include "../conexao.php";
	$delete = $conn -> prepare($sql);
	$delete -> execute();	
	$conn = null;
	
	echo "<script>
				alert('Fornecedor excluido com sucesso!'); 
				window.location.href='index.php'; 
		 </script>";
	}
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="delete style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Deletar Fornecedor</title>
	</head>	
	
  <div class="container">	
	<header>
	<h1>Excluir Fornecedor?</h1>
	</header>
		
		<main>
			ID: <?php echo $id; ?> <br><br>
			Fornecedor: <?php echo $nome; ?>
			<br><br>
			<form method="POST" action="#">
				<input type="submit" name="sim" value="Sim" id="deletar">
				<input type="button" value="Não" onclick='window.history.back();' id="voltar">
			</form>
		</main>
  </div>		
	</body>
</html>