<?php
	
	$id_categ = $_GET['id_categoria'];
	$sql = "SELECT * FROM tb_Categorias WHERE id_categoria = '$id_categ'";
	include "../../conexao.php";
	$categ = $conn -> prepare($sql);
	$categ -> execute();	
	$conn = null;
	
	foreach($categ as $p){
		$categoria = $p["categoria"];
	}
	
	if(isset($_POST['salvar'])) {
		$categoria = $_POST['categoria'];
		
	$sql = "
		UPDATE tb_Categorias SET 
		categoria = ?
		WHERE id_categoria = ?
	";
	include "../../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($categoria, $id_categ));	
	$conn = null;
	
	echo" <script>
				alert('Categoria alterada com sucesso!');
				window.location.href='../lista_categorias.php';
		  </script>";
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Alterar Categoria</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../Inserir/insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  
  <body>
  <div class="container">
		<header>
		<h1>
			Alteração de Categoria
		</h1>
		</header>
		
		<main>
		<form action="#" method="POST">
		
			Nome: 
			<input type="text" name="categoria" value="<?php echo $categoria; ?>" class="campo" required>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar"  onclick="window.location.href='../lista_categorias.php';" id="voltar">
		</form>
		</main>
  </div>	
  </body>
</html>
