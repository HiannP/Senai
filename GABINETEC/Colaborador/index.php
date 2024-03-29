<?php
	session_start();
	$Perfil = $_SESSION['perfil'];
	$nome = $_SESSION['nome'];
	$id_user = $_SESSION['id_user'];

	if(!isset($Perfil) or ($Perfil != 3)) {
		header('Location: ../Login/login.php');
	}

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
    <title>Colaborador</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index style.css">
	<script type="text/javascript" src="../funcionalidades.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
<div class="container">   
		<header>
			<div id="title">
			<h1>COLABORADOR</h1>
			</div>
			<div id="perfil">
			<a id="icon" title="Perfil"> <i class="fa fa-user-circle"></i></a>
				<div class="campoP">
					<a id="name"><?php echo $nome ?></a>
					<hr>
					<a class="botoes" href="manual_usuario.php"><i class="fa fa-info-circle"></i> Manual do Usuário</a>
					<a class="botoes" href="../Login/logout.php"> <i class="fa fa-sign-out"></i> Sair</a>
				</div>
			</div>
		</header>
			
		<div class="painel">	
			<div class="icones">		
				<a class="ico" href='Inserir/tb_insert_produto.php' title="Adicionar Produto"><i class='fa fa-cart-plus'></i></a>Adicionar Produto 
			</div>
			<div class="icones">		
				<a class="ico" href='Listas/lista_categorias.php' title="Lista de Categorias"><i class='fa fa fa-paste'></i></a>Lista de Categorias 
			</div>
			<div class="icones">		
				<a class="ico" href='Listas/lista_fornecedores.php' title="Lista de Fornecedores"><i class='fa fa fa-building'></i></a>Lista de Fornecedores
			</div>
			<div class="icones">
				<a class="ico" href='Listas/relatorio.php' title="Relatórios Semanais"> <i class='fa fa-file-text-o'></i></a>Relatórios
			</div>
		</div>	
		
		<main>
		<input class="search" oninput="pesquisa()" id='search' type="search" placeholder="Pesquisa"> <i class="fa fa-search" style="color: #fff;"></i>
		<table border="1" style="text-align: center; margin: auto; width: 95%; font-size: 150%; border-width: 0; background-color: #000;">
			<thead>
			<tr>
				<th>Produto</th>
				<th>Descrição</th>
				<th>Marcas</th>
				<th>Categoria</th>
				<th>Quantidade</th>
				<th>Preço (R$)</th>
			</tr>
			</thead>
		<?php
			foreach($produtos as $prod) {
				
				$id = $prod['id_prod'];
				$desc = $prod['descricao'];
				$fab = $prod['marca'];
				$categ = $prod['categoria'];
				$qntd = $prod['qntd'];
				$valor = $prod['valor_unit'];
				$img = $prod['img'];
				
				//---------------------------------------- HTML ----------------------------------------\\
				echo "<tbody id='pesquisado'>";
				echo "<tr>";
				echo "<td id='img'><img src='../imge/$img.jpg' height='100' width='100'></td>";
				echo "<td>$desc</td>";
				echo "<td>$fab</td>";
				echo "<td>$categ</td>";
				echo "<td>$qntd</td>";
				echo "<td>$valor</td>";
				echo "</tr>";
				echo "</tbody>";
				
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