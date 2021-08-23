<?php
	$id_user = $_GET['id_user'];
	
	$sql = "SELECT * FROM tb_Produtos AS A
			INNER JOIN tb_Vendas AS B
			INNER JOIN tb_Categoria AS C
			INNER JOIN tb_Marcas AS D
			ON A.id_prod = B.FK_id_prod
			AND A.FK_id_categoria = C.id_categoria
			AND A.FK_id_marca = D.id_marca
			AND B.FK_id_user = $id_user";	
	include "conexao.php";
	$produtos = $conn -> prepare($sql);
	$produtos -> execute();	
	$conn = null;	
	
	$situacao = 'Solicitado';
	$sqlP = "SELECT SUM(valor_unit) AS soma FROM tb_Vendas WHERE FK_id_user = $id_user AND situacao = :situacao"; 
	include "../conexao.php";
	$sqlP = $conn -> prepare($sqlP);
	$sqlP->bindValue(':situacao', $situacao);
	$sqlP -> execute();	
	$row = $sqlP->fetch();
	$soma = $row['soma'];
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
				$fab = $prod['marca'];
				$img = $prod['img'];
				
				echo "<br><br>";
				
				echo "<div id='campoP'>";
				echo "<fieldset>";
					echo "<form name='formFinal' action='#.php' method='POST' enctype='multipart/form-data'>";
					echo "<div id='img' title='$desc'><img src='../imge/$img.jpg'></div>";
					echo "<div id='desc'><h4>$desc<h4></div>";
					echo "<div id='fab'>Marca: $fab</div>";
					echo "<div id='categ'>Categoria: $categ</div>";
					echo "<div id='valor'><h3>R$ $valor<h3></div>";
					echo "<input type='number' min='1' max='99' value='1' name='qntd' id='quanti'>";
					echo "</form>";
				echo "</fieldset>";
				echo "</div>";
			}	
		?>
		
		<?php
				echo "<div id='painelC'>";
					echo "<div id='painelCont'>";
					echo "<h2>Finalização de Compra</h2>";
					echo "<h2 id='valor_u'>Valor Total: R$ $soma</h2>";
					echo "<a href='#'><button id='finalizar'>Finalizar</button></a>";
					echo "<a href='#'><button id='cancelar'>Cancelar</button></a>";
					echo "</div>";
				echo "</div>";
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