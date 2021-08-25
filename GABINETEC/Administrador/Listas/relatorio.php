<?php
	$sql = "SELECT * FROM tb_Vendas AS A
			INNER JOIN tb_Produtos AS B
			INNER JOIN tb_Usuarios AS C
			ON A.FK_id_prod = B.id_prod
			AND A.FK_id_user = C.id_user";
	include "../conexao.php";
	$vendas = $conn -> prepare($sql);
	$vendas -> execute();
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Relatórios</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="lista style.css">
	<script type="text/javascript" src="../../funcionalidades.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
  <div class="container"> 
		<header>
		<h1>Relatórios</h1>
		</header>
		<main>
		<input class="search" oninput="pesquisa()" id='search' type="text" placeholder="Pesquisa"> <i class="fa fa-search" style="color: #fff;"></i>
		<table border="1" style="text-align: center; margin: auto; width: 95%; font-size: 150%; border-width: 0; background-color: #000;">
			<thead>
			<tr>
				<th>ID</th>
				<th>Produto</th>
				<th>Cliente</th>
				<th>Quantidade</th>
				<th>Data de Compra</th>
				<th>Preço (R$)</th>
				<th>Situação</th>
				<th>Opções</th>
			</tr>
			</thead>
		<?php
			foreach($vendas as $vend) {
				$id = $vend['id_venda'];
				$prod = $vend['descricao'];
				$nome = $vend['nome'];
				$qntd = $vend['qntd_pedido'];
				$data = $vend['data_compra'];
				$valor = $vend['valor_unit'];
				$situacao = $vend['situacao'];
				
				//---------------------------------------- HTML ----------------------------------------\\
				echo "<tbody id='pesquisado'>";
				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$prod</td>";
				echo "<td>$nome</td>";
				echo "<td>$qntd</td>";
				echo "<td>$data</td>";
				echo "<td>$valor</td>";
				echo "<td>$situacao</td>";
				echo "<td><a title='Editar' href='#'><i class='fa fa-pencil'></i></a> 
					  <a title='Excluir' href='Deletar/tb_delete_relatorio.php?id_venda=$id&data_compra=$data&situacao=$situacao'><i class='fa fa-trash'></i></a></td>";
				echo "</tr>";
				echo "</tbody>";
				
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