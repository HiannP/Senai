<?php
	
	$id_marca = $_GET['id_marca'];
	$sql = "SELECT * FROM tb_Marcas WHERE id_marca = '$id_marca'";
	include "../../conexao.php";
	$forn = $conn -> prepare($sql);
	$forn -> execute();	
	$conn = null;
	foreach($forn as $p){
		$marca = $p["marca"];
		$email = $p["email"];
	}
	
	if(isset($_POST['salvar'])) {
		$marca = $_POST['marca'];
		$email = $_POST['email'];
		
	$sql = "
		UPDATE tb_Marcas SET 
		marca = ?,
		email = ?
		WHERE id_marca = ?
	";
	include "../../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($marca, $email, $id_marca));	
	$conn = null;
	
	echo" <script>
				alert('Fornecedor alterado com sucesso!');
				window.location.href='../lista_fornecedores.php';
		  </script>";
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Alterar Fornecedor</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../Inserir/insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  
  <body>
  <div class="container">
		<header>
		<h1>
			Alteração de Fornecedor
		</h1>
		</header>
		
		<main>
		<form action="#" method="POST">
		
			Nome: 
			<input type="text" name="marca" value="<?php echo $marca; ?>" class="campo" required>
			<br><br>
			
			Email:
			<input type="text" name="email" value="<?php echo $email; ?>" class="campo" required>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar"  onclick="window.location.href='../lista_fornecedores.php';" id="voltar">
		</form>
		</main>
  </div>		
  </body>
</html>