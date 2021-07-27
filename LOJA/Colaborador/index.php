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
    <title>Colaborador</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
<div class="container">   
		<header>
			<h1>COLABORADOR</h1> 
			<input class="search" type="text" placeholder="Pesquisa (Nome; Modelo; Cor; etc...)">
		</header>
		
		<aside>
		<br>
		<a class="botoes" href="../login.php" title="Sair"> <i class="fa fa-sign-out"></i></a> <br>
		<a class="botoes" href='tb_insert.php' title="Adicionar Produto"> <i class='fa fa-plus'></i></a> 
		</aside>
		
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
						echo "<img src='../imge/$img.jpg'>";
					echo "</div>";
				
					echo "<div id='desc'>";
						echo "<h3>$desc</h3>";
					echo "</div>";
				
					echo "<br>";
				
					echo "<div id='fab'>";
						echo "<h4>$fab</h4>";
					echo "</div>";
				
					echo "<div id='valor'>";
						echo "<h3>R$ $valor</h3>";
					echo "</div>";
				
					echo "</fieldset>";
					//echo "<div id='checkbox'>";
						//echo "<input type='checkbox' id='check'>";
					//echo "</div>";
					echo "</div>";
				echo "</div>";
					
				
				echo "<style>fieldset {clear: both;}</style>";
				echo "<style>#img {float: left;}</style>";
				echo "<style>#valor {clear: both;  margin-left:55px;}</style>";
				echo "<style>#check {margin-left:33em;}</style>";
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