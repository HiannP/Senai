<?php
	$sql = "SELECT * FROM tb_Produtos limit 20";
	include "conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute();
	$conn = null;
	
	$sql1 = "SELECT * FROM tb_Categoria";
	include "conexao.php";
	$categorias = $conn -> prepare($sql1);
	$categorias -> execute();
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>GABINETEC</title>
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
			<a id="icon" href="login.php" title="Logar-se"> <i class="fa fa-user-circle-o"></i></a>
		</header>
		
		<aside>
		<div class="dropdown">
		<a class="botoes">Categoria <i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
			<?php
				foreach($categorias as $cate) {
				
					$categ = $cate['id_categoria'];
					$nome = $cate['nome'];

					echo "<a>$nome</a>";
				}
			?>	
			</div>
		</div>
		</aside>		
		
		<main>
		<div class='produtos-grid'>
		<?php
			foreach($cadastro as $prod) {
				
				$desc = $prod['descricao'];
				$valor = $prod['valor_unit'];
				$fab = $prod['fabricante'];
				$img = $prod['img'];
				
				/*---------------------------------------------------- Produtos ----------------------------------------------------*/
				echo "<div>";
					echo "<div class='produtos-item'>";
					
					echo "<fieldset>";
				
					echo "<div id='img' title='$desc'>";
						echo "<img src='imge/$img.jpg'>";
					echo "</div>";
				
					echo "<hr>";
				
					echo "<br>";
				
					echo "<div id='desc'>";
						echo "<h4>$desc</h4>";
					echo "</div>";
					
					echo "<div id='fab'>";
						echo "<p>por $fab</p>";
					echo "</div>";
				
					echo "<div id='valor'>";
						echo "<h2>R$ $valor</h2>";
					echo "</div>";
					
					echo "<br>";
					
					echo "<div>";
					echo "<a title='Comprar' href='login.php'><button id='compra'><i class='fa fa-cart-arrow-down'></i> Comprar</button></a>";
					echo "<a title='Ver Produto'><button id='ver'><i class='fa fa-search'></i> Visualizar</button></a>";	
					echo "</div>";
					
					echo "</fieldset>";
					
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
		<script type="text/javascript">
		  window._mfq = window._mfq || [];
		  (function() {
			var mf = document.createElement("script");
			mf.type = "text/javascript"; mf.defer = true;
			mf.src = "//cdn.mouseflow.com/projects/ec8b8a87-793d-4016-aa0a-9ed100792e59.js";
			document.getElementsByTagName("head")[0].appendChild(mf);
		  })();
		</script>
</div>		
  </body> 
</html>