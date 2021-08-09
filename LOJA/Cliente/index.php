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
			<div id="perfil">
			<a id="icon" title="Pefil"> <i class="fa fa-user-circle-o"></i></a>
				<div class="campoP">
					<a id="name"><?php session_start(); echo $_SESSION['nome'] ?></a>
					<hr>
					<a class="botoes" href="../login.php" title="Sair"> <i class="fa fa-sign-out"></i> Sair</a>
				</div>
			</div>
		</header>
		
		<aside>
		<div class="dropdown">
		<a class="botoes">Categoria <i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
				<a href="#">Gabinetes</a>
				<a href="#">Mouses</a>
				<a href="#">Monitores</a>
				<a href="#">Headsets</a>
				<a href="#">Caixas de Som</a>
			</div>
		</div>
		<a class="botoes">Manual do Usuário <i class="fa fa-info-circle"></i></a>
		<a class="botoes"></a>
		</aside>		
		
		<main>
		<div class='produtos-grid'>
		<?php
			foreach($cadastro as $cad) {
				
				$desc = $cad['descricao'];
				$valor = $cad['valor_unit'];
				$fab = $cad['fabricante'];
				$img = $cad['img'];
				
				/*---------------------------------------------------- Produtos ----------------------------------------------------*/
				echo "<div>";
					echo "<div class='produtos-item'>";
					
					echo "<fieldset>";
				
					echo "<div id='img'>";
						echo "<img src='../imge/$img.jpg'>";
					echo "</div>";
				
					echo "<hr>";
				
					echo "<br>";
				
					echo "<div id='desc'>";
						echo "<h4>$desc</h4>";
					echo "</div>";
					
					echo "<div id='fab'>";
						echo "<p>por $fab</p>";
					echo "</div>";
				
					echo "<br><br>";
				
					echo "<div id='valor'>";
						echo "<h2>R$ $valor</h2>";
					echo "</div>";
					
					echo "<br>";
					
					echo "<div id='buttons'>";
					echo "<a title='Comprar' href='carrinho.php?'><button id='compra'><i class='fa fa-shopping-cart'></i></button></a>";
					echo "<a title='Ver Produto'><button id='ver'><i class='fa fa-search'></i></button></a>";	
					echo "</div>";
					
					echo "</fieldset>";
					
					echo "</div>";
				echo "</div>";
				
				/*---------------------------------------------------- CSS ----------------------------------------------------*/
				echo "<style>fieldset {width: 300px; height: 450px; border-style: double; border-color: #310162; border-width: 7px;}</style>";
				echo "<style>#desc {text-align: left;}</style>";
				echo "<style>#fab {float: left;}</style>";
				echo "<style>#buttons {}</style>";
				echo "<style>#compra {padding: 4px; font-size: 100%; border-radius: 7px; width: 20%; margin-right: 5px;}</style>";
				echo "<style>#ver {padding: 4px; font-size: 100%; border-radius: 7px; width: 20%; margin-right: 5px;}</style>"; 
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