<?php
	$id_agendamento = $_GET['id_agendamento'];
	$nome = $_GET['nome'];
	$sobre = $_GET['sobrenome'];
	$data_agendada = $_GET['data_agendada'];

	if(isset($_POST['sim'])){
	$sql = "DELETE FROM tb_Agendamentos WHERE id_agendamento='$id_agendamento'";
	include "../../conexao.php";
	$delete = $conn -> prepare($sql);
	$delete -> execute();	
	$conn = null;
	
	echo "<script>
				alert('Agendamento excluido com sucesso!'); 
				window.location.href='../relatório.php'; 
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
			ID: <?php echo $id_agendamento; ?> <br><br>
			Nome do Cliente: <?php echo $nome; ?> <?php echo $sobre; ?> <br><br>
			Data Agendada: <?php echo $data_agendada; ?> <br><br>
			<form method="POST" action="#">
				<input type="submit" name="sim" value="Sim" id="deletar">
				<input type="button" value="Não" onclick="window.location.href='../relatorio_agendamento.php';" id="voltar">
			</form>
		</main>
  </div>		
	</body>
</html>