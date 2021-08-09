<!DOCTYPE html>
<?php
	$sql = "SELECT * FROM tb_Marcas";
	include "conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute();
	$conn = null;
?>
<html lang="pt-br">
  <head>
    <title>Lista de Fornecedores</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>
		<header style="text-align: center;">
		<h1>Lista de Fornecedores</h1>
		</header>
		<table border="1" style="text-align: center; margin: auto; width: 90%; font-size: 150%;">
		<hr>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Telefone</th>
				<th>OBS</th>
				<th>Opções</th>
			</tr>
		<?php
			foreach($cadastro as $cad) {
				$id = $cad['id_marcas'];
				$nome = $cad['nome'];
				$email = $cad['email'];
				$tel = $cad['telefone'];
				$obs = $cad['obs'];
				
				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$nome</td>";
				echo "<td>$email</td>";
				echo "<td>$tel</td>";
				echo "<td>$obs</td>";
				echo "<td><a title='Editar' href='tb_update_usuario.php?id_marcas=$id'><i class='fa fa-pencil'></i></a> 
					  <a title='Excluir' href='tb_delete_usuario.php?id_marcas=$id&nome=$nome'><i class='fa fa-trash'></i></a></td>";
				echo "</tr>";
			}
		?>
  </body>
</html>