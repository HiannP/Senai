<?php
	$id_user = $_GET['id_user'];

	$sql = "SELECT * FROM tb_Produtos AS A
			INNER JOIN tb_Vendas AS B
			INNER JOIN tb_Categorias AS C
			INNER JOIN tb_Marcas AS D
			ON A.id_prod = B.FK_id_prod
			AND A.FK_id_categoria = C.id_categoria
			AND A.FK_id_marca = D.id_marca
			AND B.FK_id_user = $id_user
			AND B.situacao = 'Solicitado'";	
	include "../conexao.php";
	$produtos = $conn -> prepare($sql);
	$produtos -> execute();	
	$conn = null;	
	
	$situacaoC = 'Solicitado';
	$sqlP = "SELECT SUM(valor_unit * qntd_pedido) AS soma FROM tb_Vendas WHERE FK_id_user = $id_user AND situacao = :situacaoC"; 
	include "../conexao.php";
	$sqlP = $conn -> prepare($sqlP);
	$sqlP -> bindValue(':situacaoC', $situacaoC);
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
		<script type="text/javascript" src="../../funcionalidades.js"></script>
		<link rel="stylesheet" type="text/css" href="carrinho style.css">
		<link rel="stylesheet" type="text/css" href="../../visualizacao.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
  <body>
<div class="container"> 
		<header>
			<div id="title">
			<a href="../index.php" id="t"><h1>GABINETEC</h1></a> 
			</div>
			<a href="../index.php" id="voltar" title="Voltar"> <i class="fa fa-sign-out"></i></a>
		</header>	
		
		<main>
		<?php
			foreach($produtos as $prod) {
				
				$id_prod = $prod['id_prod'];
				$situacao = $prod['situacao'];
				$desc = $prod['descricao'];
				$valor = $prod['valor_unit'];
				$qntd_pedido = $prod['qntd_pedido'];
				$categ = $prod['categoria'];
				$fab = $prod['marca'];
				$img = $prod['img'];
				
				
				echo "<br><br>";
				
				echo "<div id='campoP'>";
				echo "<fieldset>";
				echo "<form name='formFinal' action='carregarPedido.php' method='POST'>";
					echo "<input type='hidden' value='$id_user' name='id_user'>";
					echo "<input type='hidden' value='$id_prod' name='id_prod'>";
					echo "<input type='hidden' value='$qntd_pedido' name='qntd_pedido'>";
					echo "<div id='img' title='$desc'><img src='../../imge/$img.jpg'></div>";
					echo "<div id='desc'><h4>$desc<h4></div>";
					echo "<div id='fab'>Marca: $fab</div>";
					echo "<div id='categ'>Categoria: $categ</div>";
					echo "<div id='valor'><h3>R$ $valor<h3></div>";
				echo "</fieldset>";
				echo "</div>";
		
				echo "<div id='painelC'>";
					echo "<div id='painelCont'>";
					echo "<h2>Finalização de Compra</h2>";
					echo "<h2 id='valor_u'>Valor Total: R$ $soma</h2>";
					echo "<input type='submit' value='Finalizar' id='finalizar'>";
					echo "</form>";
					echo "<a data-toggle='modal' data-target='#modalCancelar'><button id='cancelar'>Cancelar</button></a>";
					
				echo "<div class='modal fade' id='modalCancelar' tabindex='-1' role='dialog' aria-labelledby='ModalLabel' aria-hidden='true'>
					  <div class='modal-dialog' role='document'>
						<div class='modal-content' id='contentCancelar'>
						  <div class='modal-header'>
							<h3 class='modal-title' id='ModalLabel'>Deseja cancelar os pedidos do carrinho de compras?</h3>
							<button class='close' data-dismiss='modal' aria-label='Fechar'>
							  <span aria-hidden='true'>&times;</span>
							</button>
						  </div>
						  <div class='modal-body'>
						  <br>
							<a href='cancelarPedido.php?id_user=$id_user'<button id='confiCancelar'>Cancelar Pedidos</button></a>
							<br>
						  <br>
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