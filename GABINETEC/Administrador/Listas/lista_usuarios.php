<?php
	$sql = "SELECT * FROM tb_Usuarios";
	include "../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute();
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Lista de Usuarios</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="lista style.css">
	<link rel="stylesheet" href="print.css" media="print" />
	<script type="text/javascript" src="../../funcionalidades.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
  <div class="container"> 
		<header>
		<h1 id="title">Lista de Usuarios</h1>
		<div class="acoes">
		<a class="inserir" href="../Inserir/tb_insert_usuario.php">INSERIR</a>
		<a class="voltar" href="../index.php">VOLTAR</a>
		</div>
		</header>
		
		<main>
		<input class="search" oninput="pesquisa()" id='search' type="text" placeholder="Pesquisa"> <i id="lupa" class="fa fa-search" style="color: #fff;"></i>
		<a id="print" href="#" onClick="print();">Imprimir</a>
		<table border="1" style="text-align: center; margin: auto; width: 95%; font-size: 150%; border-width: 0; background-color: #000;">
			<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Perfil</th>
				<th>Data</th>
				<th>OBS</th>
				<th class="op">Opções</th>
			</tr>
			</thead>
		<?php
			foreach($cadastro as $cad) {
				$id = $cad['id_user'];
				$nome = $cad['nome'];
				$sobre = $cad['sobrenome'];
				$email = $cad['email'];
				$perfil = $cad['perfil'];
				$data = $cad['create_date'];
				$obs = $cad['obs'];

				//---------------------------------------- HTML ----------------------------------------\\
				echo "<tbody id='pesquisado'>";
				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$nome $sobre</td>";
				echo "<td>$email</td>";
				echo "<td>$perfil</td>";
				echo "<td>$data</td>";
				echo "<td>$obs</td>";
				echo "<td class='op'><a title='Editar' href='Update/tb_update_usuario.php?id_user=$id'><i class='fa fa-pencil'></i></a> 
					  <a title='Excluir' href='Deletar/tb_delete_usuario.php?id_user=$id&nome=$nome'><i class='fa fa-trash'></i></a></td>";
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