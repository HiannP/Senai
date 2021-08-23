<?php
	
	$id = $_GET['id_categoria'];
	$sql = "SELECT * FROM tb_Categorias WHERE id_categoria='$id'";
	include "../conexao.php";
	$categ = $conn -> prepare($sql);
	$categ -> execute();	
	$conn = null;
	foreach($categ as $p){
		$nome = $p["nome"];
	}
	
	if(isset($_POST['salvar'])){
		$nome = $_POST['nome'];
		
	$sql = "
		UPDATE tb_Categorias SET 
		nome=?,
		WHERE id_categoria=?
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($nome, $id));	
	$conn = null;
	
	echo" <script>
		alert('Categoria alterada com sucesso!');
		window.location.href='index.php';
		</script>";
	}
?>
<html lang="pt-br">
  <head>
    <title>Alterar Categoria</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../Inserir/insert style.css">
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
			<input type="text" name="nome" value="<?php echo $nome; ?>" class="campo" required>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick='window.history.back();' id="voltar">
		</form>
		</main>
  </div>	
  </body>
</html>
