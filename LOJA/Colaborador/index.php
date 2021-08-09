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
			<div id="title">
			<h1>COLABORADOR</h1>
			</div>
			<input class="search" type="search" placeholder="Pesquisa (Nome; Modelo; Cor; etc...)">
			<a id="icon" title="Perfil"> <i class="fa fa-user-circle-o"></i></a>
		</header>
		
		<div class="painel">
			<div class="icones">
				<a class="botoes" href="../login.php" title="Sair"> <i class="fa fa-sign-out"></i></a>
			</div>
			<div class="icones">		
				<a class="botoes" href='tb_insert.php' title="Adicionar Produto"><i class='fa fa-cart-plus'></i></a>Adicionar Produto 
			</div>
		</div>	
		
		<main>
		<table border="1" style="text-align: center; margin: auto; width: 95%; font-size: 150%; border-width: 0; background-color: #000;">
			<tr>
				<th>Produto</th>
				<th>Descrição</th>
				<th>Marcas</th>
				<th>Categoria</th>
				<th>Preço</th>
			</tr>
		<?php
			foreach($cadastro as $cad) {
				
				$id = $cad['id_prod'];
				$desc = $cad['descricao'];
				$fab = $cad['fabricante'];
				$categ = $cad['categoria'];
				$valor = $cad['valor_unit'];
				$img = $cad['img'];
				
				//---------------------------------------- HTML ----------------------------------------\\
				echo "<tr>";
				echo "<td><img src='../imge/$img.jpg'></td>";
				echo "<td>$desc</td>";
				echo "<td>$fab</td>";
				echo "<td>$categ</td>";
				echo "<td>$valor</td>";
				echo "</tr>";
				
				//----------------------------------------- CSS -----------------------------------------\\
				echo "<style>tr {background-color: #fff;}</style>";
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