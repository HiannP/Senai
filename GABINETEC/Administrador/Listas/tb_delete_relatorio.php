<?php
	$id = $_GET['id_venda'];
	$data = $_GET['data_compra'];
	$situacao = $_GET['situacao'];

	if(isset($_POST['sim'])){
	$sql = "DELETE FROM tb_Vendas WHERE id_venda='$id'";
	include "../conexao.php";
	$delete = $conn -> prepare($sql);
	$delete -> execute();	
	$conn = null;
	
	echo "<script>
				alert('Relatório excluido com sucesso!'); 
				window.location.href='relatório.php'; 
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
		<title>Deletar Relatório</title>
	</head>	
	
  <div class="container">	
	<header>
	<h1>Excluir Relatório?</h1>
	</header>
		
		<main>
			ID: <?php echo $id; ?> <br><br>
			Data de Requisição: <?php echo $data; ?> <br><br>
			Situação: <?php echo $situacao; ?> <br><br>
			<form method="POST" action="#">
				<input type="submit" name="sim" value="Sim" id="deletar">
				<input type="button" value="Não" onclick='window.history.back();' id="voltar">
			</form>
		</main>
  </div>		
	</body>
</html>