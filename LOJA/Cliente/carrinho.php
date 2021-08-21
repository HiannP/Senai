<?php
	$id_user = $_GET['id_user'];
	$sql = "SELECT A.id_prod, A.descricao, A.valor_unit, A.fabricante, A.categoria, A.img, 
			B.FK_id_prod, B.FK_id_user, B.situacao 
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="../funcionalidades.js"></script>
		<link rel="stylesheet" type="text/css" href="carrinho style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	</head>
	
  <body>
<div class="container"> 
		<header id="title">
			<h1>GABINETEC</h1>
		</header>	
		<main>
		<?php
			foreach($produtos as $prod) {
				
				$id_prod = $prod['id_prod'];
				$desc = $prod['descricao'];
				$valor = $prod['valor_unit'];
				$categ = $prod['categoria'];
				$fab = $prod['fabricante'];
				$img = $prod['img'];
				
				echo "<br><br>";
				
				echo "<div id='campoP'>";
				echo "<fieldset>";
					echo "<div id='img' title='$desc'><img src='../imge/$img.jpg'></div>";
					echo "<div id='desc'><h4>$desc<h4></div>";
					echo "<div id='fab'>Marca: $fab</div>";
					echo "<div id='categ'>Categoria: $categ</div>";
					echo "<div id='valor'><h3>R$ $valor<h3></div>";
				echo "</fieldset>";
				echo "</div>";
			
				echo "<div id='painelC'>";
					echo "<h2>Finalização de Compra</h2>";
					echo "<h2 id='valor_u' onload='totalProd()'>Valor Total: </h2>";
					echo "<script type='text/javascript' src='../funcionalidades.js'></script>";
				echo "</div>";
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