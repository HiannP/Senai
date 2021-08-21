<?php
	session_start();
	$Perfil = $_SESSION['perfil'];
	$nome = $_SESSION['nome'];
	$id_user = $_SESSION['id_user'];
	
	if(!isset($Perfil) or ($Perfil != 1)) {
		header('Location: ../login.php');
	}	
	
	$sql = "SELECT * FROM tb_Produtos limit 20";
	include "conexao.php";
	$produtos = $conn -> prepare($sql);
	$produtos -> execute();
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="index style.css">
	<link rel="stylesheet" type="text/css" href="../visualizacao.css">
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
					<a href="perfil.php?id_user=<?php echo $id_user ?>?" title="Perfil"><i class="fa fa-user-circle-o"></i> Perfil</a>
					<a><i class="fa fa-info-circle"></i> Manual do Usuário</a>
					<a href="../logout.php" title="Sair"> <i class="fa fa-sign-out"></i> Sair</a>
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
			foreach($produtos as $prod) {
				
				$id_prod = $prod['id_prod'];
				$desc = $prod['descricao'];
				$valor = $prod['valor_unit'];
				$fab = $prod['fabricante'];
				$img = $prod['img']; 
				
				/*---------------------------------------------------- Produtos ----------------------------------------------------*/
				echo "<div>";
					echo "<div class='produtos-item'>";
					
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
				
					echo "<div id='valor'>";
						echo "<h2>R$ $valor</h2>";
					echo "</div>";
					
					echo "<br>";
					
					echo "<div>";
					echo "<a title='Comprar' href='requisicao_pedido.php?id_prod=$id_prod&id_user=$id_user&valor_unit=$valor'><button id='compra'><i class='fa fa-cart-arrow-down'></i> Comprar</button></a>";
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
							<img src='../imge/$img.jpg'>
							<br>
							<div id='fabVis'>
							por $fab
							</div>
						  </div>
						  <div class='modal-footer'>
						  <div id='valVis'>
						  <h2>R$ $valor</h2>
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
</div>		
  </body> 
</html>