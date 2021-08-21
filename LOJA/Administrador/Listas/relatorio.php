<?php
	$sql = "SELECT * FROM tb_Vendas";
	include "../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute();
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Relatórios</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="lista style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
  <div class="container"> 
		<header>
		<h1>Relatórios</h1>
		</header>
		<main>
		<input class="search" type="search" placeholder="Pesquisa"> <i class="fa fa-search" style="color: #fff;" id="lupa"></i>
		<table border="1" style="text-align: center; margin: auto; width: 95%; font-size: 150%; border-width: 0; background-color: #000;">
			<tr>
				<th>ID</th>
				<th>ID do Produto</th>
				<th>ID do Cliente</th>
				<th>Quantidade</th>
				<th>Data de Compra</th>
				<th>Preço</th>
				<th>Situação</th>
				<th>Opções</th>
			</tr>
		<?php
			foreach($cadastro as $cad) {
				$id = $cad['id_venda'];
				$FK_id_prod = $cad['FK_id_prod'];
				$FK_id_user = $cad['FK_id_user'];
				$qntd = $cad['qntd'];
				$data = $cad['data_compra'];
				$valor = $cad['valor_unit'];
				$situacao = $cad['situacao'];
				
				//---------------------------------------- HTML ----------------------------------------\\
				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$FK_id_prod</td>";
				echo "<td>$FK_id_user</td>";
				echo "<td>$qntd</td>";
				echo "<td>$data</td>";
				echo "<td>$valor</td>";
				echo "<td>$situacao</td>";
				echo "<td><a title='Editar' href='#'><i class='fa fa-pencil'></i></a> 
					  <a title='Excluir' href='tb_delete_relatorio.php?id_venda=$id&data_compra=$data'><i class='fa fa-trash'></i></a></td>";
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