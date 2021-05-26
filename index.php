<?php
	$sql = "SELECT * FROM Produtos_tb";
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
  </head>
  <body>
		<header>
			<h1>GABINETEC</h1>
			<input class="search" type="text" placeholder="Pesquisa  (Nome; Modelo; Cor; etc...)" name="pesquisa" id="Pesquisa">
		</header> <br>
		
		<?php
			foreach($cadastro as $cad) {
				$desc = $cad['descricao'];
				$valor = $cad['valor_unit'];
				$fab = $cad['fabricante'];
				$img = $cad['img'];
				
				echo "<fieldset>";
				echo "<img src='imge/$img' width='500px' height='500px'>";
				echo "$desc";
				echo "$fab";
				echo "R$$valor";
				echo "</fieldset>";
			}
		?> 
		<br>
	
		<footer>
		 <br> <p>© 2021 de GABINETEC. Todos os direitos reservados.</p> <br>
		</footer>
		
  </body>
</html>