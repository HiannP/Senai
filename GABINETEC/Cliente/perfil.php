<?php
	$id_user = $_GET['id_user'];
	$sql = "SELECT * FROM tb_Usuarios WHERE id_user='$id_user'";
	include "conexao.php";
	$usuarios = $conn -> prepare($sql);
	$usuarios -> execute();
	$conn = null;
?>	

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Carrinho de Compras</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="perfil style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
  <body>
<div class="container"> 
		<header id="title">
			<h1>GABINETEC</h1>
		</header>	
		
		<main>
		<div class='user-grid'>
		<?php
			foreach($usuarios as $user) {
				
				$nome = $user['nome'];
				$sobrenome = $user['sobrenome'];
				$email = $user['email'];
				$create_date = $user['create_date'];

				echo "<table>";
				echo "<th>Nome: $nome $sobrenome</th>";
				echo "<tr><td>Email: $email</td></tr>";
				echo "<tr><td>Data de Criação: $create_date</td></tr>";
				echo "</table>";
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