<?php

	$id = $_GET['id_prod'];
	$desc = $_GET['descricao'];
	$img = $_GET['img'];

	if(isset($_POST['sim'])){
	unlink("../imge/$img.jpg");
	$sql = "DELETE FROM tb_Produtos WHERE id_prod='$id'";
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="Listas/Deletar/delete style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Deletar Produtos</title>
	</head>	
	
	<body>
  <div class="container">
	<header>
	<h1>Excluir Produto?</h1>
	</header>
		
		<main>
		<?php echo "<img src='../imge/$img.jpg'>"; ?> <br><br>
		<?php echo $desc; ?>
		<br><br>
			<form method="POST" action="#">
				<input type="submit" name="sim" value="Sim" id="deletar">
				<input type="button" value="Não" onclick="window.location.href='index.php';" id="voltar">
			</form>
		</main>
  </div>		
	</body>
</html>