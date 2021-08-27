<?php
	$sql = "SELECT * FROM tb_Agendamentos AS A
			INNER JOIN tb_Usuarios AS B
			ON A.FK_id_user = B.id_user";
	include "../conexao.php";
	$agenda = $conn -> prepare($sql);
	$agenda -> execute();
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Relatório de Agendamentos</title>
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
		<h1>Relatório de Agendamentos</h1>
		<div class="acoes">
		</div>
		</header>
		<main>
		<input class="search" oninput="pesquisa()" id='search' type="text" placeholder="Pesquisa"> <i class="fa fa-search" style="color: #fff;"></i>
		<a href="relatorio.php" title="Relatório"> <i class="fa fa-arrow-left" style="margin-left: 15px; color: #fff; font-size: 23px;"></i></a>
		<table border="1" style="text-align: center; margin: auto; width: 95%; font-size: 150%; border-width: 0; background-color: #000;">
			<thead>
			<tr>
				<th>ID</th>
				<th>Nome do Solicitador</th>
				<th>Data de Pedido</th>
				<th>Data Agendada</th>
				<th>Opções</th>
			</tr>
			</thead>
		<?php
			foreach($agenda as $age) {
				$id_agendamento = $age['id_agendamento'];
				$nome = $age['nome'];
				$sobre = $age['sobrenome'];
				$data = $age['data_solicitacao'];
				$data_agendada = $age['data_agendada'];
				
				//---------------------------------------- HTML ----------------------------------------\\
				echo "<tbody id='pesquisado'>";
				echo "<tr>";
				echo "<td>$id_agendamento</td>";
				echo "<td>$nome $sobre</td>";
				echo "<td>$data</td>";
				echo "<td>$data_agendada</td>";
				echo "<td><a title='Excluir' href='Deletar/tb_delete_relatorio_agenda.php?id_agendamento=$id_agendamento&nome=$nome&sobrenome=$sobre&data_agendada=$data_agendada'><i class='fa fa-trash'></i></a></td>";
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