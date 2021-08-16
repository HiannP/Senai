<?php
	$sql = "SELECT * FROM Produtos_tb limit 20";
	include "conexao.php";
	$produtos = $conn -> prepare($sql);
	$produtos -> execute();
	$conn = null;
	
	$sql1 = "SELECT * FROM tb_Categoria";
	include "conexao.php";
	$categorias = $conn -> prepare($sql1);
	$categorias -> execute();
	$conn = null;
	
	session_start();
	$nome = $_SESSION['nome'];
	$id_user = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>GABINETEC</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index style.css">
	<link rel="stylesheet" type="text/css" href="visualizacao.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
<div class="container"> 
		<header>
			<div id="title">
			<h1>GABINETEC</h1> 
			</div>
			<input class="search" type="search" onkeyup="pesquisaProduto()" placeholder="Pesquisa (Nome; Modelo; Cor; etc...)">
			<a href="carrinho.php?id_user=<?php echo $id_user ?>" id="cart" title="Carrinho"><i class="fa fa-shopping-cart"></i></a>
			<div id="perfil">
			<a id="icon" title="Perfil"> <i class="fa fa-user-circle"></i></a>
				<div class="campoP">
					<a id="name"><?php echo $nome ?></a>
					<hr>
					<a><i class="fa fa-user-circle-o"></i> Perfil</a>
					<a><i class="fa fa-info-circle"></i> Manual do Usuário</a>
					<a href="../login.php" title="Sair"> <i class="fa fa-sign-out"></i> Sair</a>
				</div>
			</div>
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
			foreach($produtos as $cad) {
				
				$id_prod = $cad['id_prod'];
				$desc = $cad['descricao'];
				$valor = $cad['valor_unit'];
				$fab = $cad['fabricante'];
				$img = $cad['img']; 
				
				/*---------------------------------------------------- Produtos ----------------------------------------------------*/
				echo "<div>";
					echo "<div class='produtos-item' id='inner'>";
					
					echo "<fieldset>";
				
					echo "<div id='img' title='$desc'>";
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
				
					echo "<br><br><br><br>";
				
					echo "<div id='valor'>";
						echo "<h2>R$ $valor</h2>";
					echo "</div>";
					
					echo "<br>";
					
					echo "<div>";
					echo "<a title='Comprar' href='requisicao_pedido.php?id_prod=$id_prod&id_user=$id_user&valor_unit=$valor'><button id='compra'><i class='fa fa-cart-arrow-down'></i> Comprar</button></a>";
					echo "<a title='Ver Produto'><button id='ver' onclick='visualiza()'><i class='fa fa-search'></i> Visualizar</button></a>";
					echo "<script type='text/javascript' src='../funcionalidades.js'></script>";
					echo "</div>";
				
					echo "<div id='myModal' class='modal'>
							<div class='modal-content'>
								<div class='modal-header'>
									<span class='close'>&times;</span>
									<h2>$desc</h2>
								</div>
								<div class='modal-body'>
									<img src='../imge/$img.jpg'>
									<p>por $fab</p>
								</div>
								<div class='modal-footer'>
									<h3>R$ $valor</h3>
								</div>
							</div>
						  </div>";	
				
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
</div>
</div>		
  </body> 
</html>