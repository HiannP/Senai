<?php
	$sql = "SELECT * FROM Produtos_tb Order by rand() limit 20";
	include "conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute();
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>index</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
<div class="container"> 
		<header>
			<div id="title">
			<h1>GABINETEC</h1> 
			</div>
			<input class="search" type="search" placeholder="Pesquisa (Nome; Modelo; Cor; etc...)">
			<a class="botoes" href="login.php" title="Logar"> <i class="fa fa-user-circle-o"></i></a>
		</header>	
		
		<main>
		<div class='produtos-grid'>
		<?php
			foreach($cadastro as $cad) {
				
				$desc = $cad['descricao'];
				$valor = $cad['valor_unit'];
				$fab = $cad['fabricante'];
				$img = $cad['img'];
				
				echo "<div>";
					echo "<div class='produtos-item'>";
					echo "<fieldset width='250px' height='250px'>";
				
					echo "<div id='img'>";
						echo "<img src='imge/$img.jpg'>";
					echo "</div>";
				
					echo "<div id='desc'>";
						echo "<h4>$desc</h4>";
					echo "</div>";
				
					echo "<br>";
				
					echo "<div id='fab'>";
						echo "<h4>$fab</h4>";
					echo "</div>";
				
					echo "<div id='valor'>";
						echo "<h3>R$ $valor</h3>";
					echo "</div>";
					
					echo "<button id='compra' title='Comprar'><i class='fa fa-shopping-cart'></i></button>";
					
					echo "<a href='#' title='Ver Produto'><button id='compra'><i class='fa fa-search'></i></button></a>";	
				
					echo "</fieldset>";
					//echo "<div id='checkbox'>";
						//echo "<input type='checkbox' id='check'>";
					//echo "</div>";
					echo "</div>";
				echo "</div>";
				
				echo "<style>#img {float: left;}</style>";
				echo "<style>#fab {float: left;}</style>";
				echo "<style>#valor {clear: both;  margin-left:55px;}</style>";
				echo "<style>#check {margin-left:33em;}</style>";
				echo "<style>#compra {padding: 4px; float: right; font-size: 100%; border-radius: 7px; width: 10%; margin-right: 5px;}</style>";
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