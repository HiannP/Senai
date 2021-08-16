<?php

	$id_user = $_GET['id_user'];
	$sql = "SELECT * FROM tb_Vendas WHERE FK_id_user='$id_user'";
	include "../conexao.php";
	$user = $conn -> prepare($sql);
	$user -> execute();	
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Carrinho de Compras</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="index style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	</head>
	
	<body>
<div class="container"> 
		<header id="title">
			<h1>GABINETEC</h1> 
		</header>	
		
		<main>
		<div class='produtos-grid'>
		<?php
				
				echo $id_user;
				
			
		?>
		</div>
		<br><br>
		</main>
	
		<footer>
		 <br> <p>© 2021 de GABINETEC. Todos os direitos reservados.</p> <br>
		</footer>
</div>		
	</body>
	
</html>