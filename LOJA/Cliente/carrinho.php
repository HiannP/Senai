<?php
	$id_user = $_GET['id_user'];
	$sql = "SELECT A.id_prod, A.descricao, A.valor_unit, A.fabricante, A.img, 
			B.FK_id_prod, B.FK_id_user 
			FROM tb_Produtos as A 
			INNER JOIN tb_Vendas as B 
			ON A.id_prod = B.FK_id_prod 
			AND B.FK_id_user = $id_user";
	include "../conexao.php";
	$produtos = $conn -> prepare($sql);
	$produtos -> execute();	
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Carrinho de Compras</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="#">
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
			foreach($produtos as $prod) {
				
				$id_prod = $prod['id_prod'];
				$desc = $prod['descricao'];
				$valor = $prod['valor_unit'];
				$fab = $prod['fabricante'];
				$img = $prod['img'];

				echo "<table>";
				echo "<tr>";
				echo "<th><img src='../imge/$img.jpg' height='100' width='100'></th>";
				echo "<td>$desc</td>";
				echo "</tr>";
				echo "</table>";
			}
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