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
    <title>ADM</title>
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
			<h1>ADM</h1>
			</div>
			<div id="perfil">
			<a id="icon"> <i class="fa fa-user-circle"></i></a>
				<div class="campoP">
					<a id="name"><?php session_start(); echo $_SESSION['nome'] ?></a>
					<hr>
					<a class="botoes" href="#" title="Perfil"><i class="fa fa-user-circle-o"></i> Perfil</a>
					<a class="botoes" href="manual_usuario.php" title="Manual do Usuário"><i class="fa fa-info-circle"></i> Manual do Usuário</a>
					<a class="botoes" href="../login.php" title="Sair"> <i class="fa fa-sign-out"></i> Sair</a>
				</div>
			</div>
		</header>
		
		<div class="painel">
			<div class="icones">		
				<a class="ico" href='Inserir/tb_insert_produto.php' title="Adicionar Produto"><i class='fa fa-cart-plus'></i></a>Adicionar Produto 
			</div>
			<div class="icones">
				<a class="ico" href="Listas/lista_usuarios.php" title="Lista de Usuários"> <i class="fa fa-list-ul"></i></a>Lista de Usuários
			</div>
			<div class="icones">
				<a class="ico" href='Inserir/tb_insert_usuario.php' title="Inserir Usuário"> <i class='fa fa-user-plus'></i></a>Inserir Usuário
			</div>
			<div class="icones">
				<a class="ico" href='Listas/lista_fornecedores.php' title="Lista de Fornedeores"> <i class='fa fa-building'></i></a>Lista de Fornecedeores
			</div>
			<div class="icones">
				<a class="ico" href='Inserir/tb_insert_fornecedor.php' title="Inserir Fornecedor"> <i class='fa fa-trademark'></i></a>Inserir Fornecedor
			</div>
			<div class="icones">
				<a class="ico" href='Listas/lista_categorias.php' title="Lista de Categorias"> <i class='fa fa-paste'></i></a>Lista de Categorias
			</div>
			<div class="icones">
				<a class="ico" href='Inserir/tb_insert_categoria.php' title="Adicionar Categoria"> <i class='fa fa-plus'></i></a>Adicionar Categoria
			</div>
			<div class="icones">
				<a class="ico" href='#' title="Relatórios Semanais"> <i class='fa fa-file-text-o'></i></a>Relatórios Semanais
			</div>
			
		</div>
		<main>
		<input class="search" type="search" placeholder="Pesquisa"> <i class="fa fa-search" style="color: #fff;"></i>
		<table border="1" style="text-align: center; margin: auto; width: 95%; font-size: 150%; border-width: 0; background-color: #000;">
			<tr>
				<th>Produto</th>
				<th>Descrição</th>
				<th>Marcas</th>
				<th>Categoria</th>
				<th>Quantidade</th>
				<th>Preço (R$)</th>
				<th>Opções</th>
			</tr>
		<?php
			foreach($cadastro as $cad) {
				
				$id = $cad['id_prod'];
				$desc = $cad['descricao'];
				$fab = $cad['fabricante'];
				$categ = $cad['categoria'];
				$qntd = $cad['qntd'];
				$valor = $cad['valor_unit'];
				$img = $cad['img'];
				
				//---------------------------------------- HTML ----------------------------------------\\
				echo "<tr>";
				echo "<td><img src='../imge/$img.jpg' height='100' width='100'></td>";
				echo "<td>$desc</td>";
				echo "<td>$fab</td>";
				echo "<td>$categ</td>";
				echo "<td>$qntd</td>";
				echo "<td>$valor</td>";
				echo "<td><a title='Editar' href='tb_update_produto.php?id_prod=$id'><i class='fa fa-pencil'></i></a> 
					  <a title='Excluir' href='tb_delete_produto.php?id_prod=$id&descricao=$desc&img=$img'><i class='fa fa-trash'></i></a></td>";
				echo "</tr>";
				
				//----------------------------------------- CSS -----------------------------------------\\
				echo "<style>tr {background-color: #fff;}</style>";
				
			}
		?> 
		</main>
		<footer>
		 <br> <p>© 2021 de GABINETEC. Todos os direitos reservados.</p> <br>
		</footer>
</div>		
  </body>
</html>