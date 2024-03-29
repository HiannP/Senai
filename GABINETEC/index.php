<?php
	$sql = "SELECT * FROM tb_Produtos AS A
			INNER JOIN tb_Categorias AS B 
			INNER JOIN tb_Marcas AS C 
			ON A.FK_id_categoria = B.id_categoria 
			AND A.FK_id_marca = C.id_marca";
	include "conexao.php";
	$produtos = $conn -> prepare($sql);
	$produtos -> execute();
	$conn = null;

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>GABINETEC</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="index style.css">
	<link rel="stylesheet" type="text/css" href="visualizacao.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
<div class="container"> 
		<header>
			<div id="title">
			<a href="index.php" id="t"><h1>GABINETEC</h1></a> 
			</div>
			<a href="Login/login.php" id="cart" title="Carrinho"><i class="fa fa-shopping-cart"></i></a>
			<a id="icon" href="Login/login.php" title="Logar-se"> <i class="fa fa-user-circle-o"></i></a>
		</header>
		
		<aside>
		<a class="sobre" href="sobre_sistema.php">Sobre o Sistema <i class="fa fa-question-circle"></i></a>
		</aside>		
		
		<main>
		<div class='produtos-grid'>
		<?php
			foreach($produtos as $prod) {
				
				$id_prod = $prod['id_prod'];
				$desc = $prod['descricao'];
				$valor = $prod['valor_unit'];
				$fab = $prod['marca'];
				$categ = $prod['categoria'];
				$img = $prod['img'];
				
				/*---------------------------------------------------- Produtos ----------------------------------------------------*/
				echo "<div>";
					echo "<div class='produtos-item'>";
					
					echo "<fieldset>";

					echo "<div id='img' title='$desc'>";
						echo "<img src='imge/$img.jpg' height='200' width='200'>";
					echo "</div>";
				
					echo "<hr>";
				
					echo "<br>";
				
					echo "<div id='desc'>";
						echo "<h4>$desc</h4>";
					echo "</div>";
					
					echo "<div id='fab'>";
						echo "<p>Vendido por $fab</p>";
					echo "</div>";
				
					echo "<div id='valor'>";
						echo "<h2>R$ $valor</h2>";
					echo "</div>";
					
					echo "<br>";

					echo "<div>";
					echo "<a title='Comprar' href='Login/login.php'><button id='compra'><i class='fa fa-cart-arrow-down'></i> Comprar</button></a>";
					echo "<button id='ver' data-toggle='modal' data-target='#modalProduto$id_prod' title='Ver Produto'><i class='fa fa-search'></i> Visualizar</button>";	
					echo "</div>";
					
					echo "</fieldset>";
					
					echo "<div class='modal fade' id='modalProduto$id_prod' tabindex='-1' role='dialog' aria-labelledby='ModalLabel' aria-hidden='true'>
					  <div class='modal-dialog' role='document'>
						<div class='modal-content'>
						  <div class='modal-header'>
							<h3 class='modal-title' id='ModalLabel'>$desc</h3>
							<button class='close' data-dismiss='modal' aria-label='Fechar'>
							  <span aria-hidden='true'>&times;</span>
							</button>
						  </div>
						  <div class='modal-body'>
							<img src='imge/$img.jpg' height='200' width='200'>
							<br>
							<div id='fabVis'>
							Vendido por $fab
							</div>
							<div id='valVis'>
							<h2>R$ $valor</h2>
							</div>
						  </div>
						  <div class='modal-footer'>
							<div id='categVis'>
							<h2>Categoria: $categ</h2>
							</div>
						  </div>
						</div>
					  </div>
					</div>";
					echo "</div>";
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