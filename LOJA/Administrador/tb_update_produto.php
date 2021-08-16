<?php
	
	$id = $_GET['id_prod'];
	$sql = "SELECT * FROM Produtos_tb WHERE id_prod='$id'";
	include "conexao.php";
	$prod = $conn -> prepare($sql);
	$prod -> execute();	
	$conn = null;
	foreach($prod as $p){
		$desc = $p["descricao"];
		$valor = $p["valor_unit"];
		$fab = $p["fabricante"];
		$cor = $p["cor"];
		$qntd = $p["qntd"];
	}
	
	if(isset($_POST['salvar'])){
		$desc = $_POST['desc'];
		$valor = $_POST['valor'];
		$fab = $_POST['fab'];
		$cor = $_POST['cor'];
		$qntd = $_POST['qntd'];
		
	$sql = "
		UPDATE Produtos_tb SET 
		descricao=?,
		valor_unit=?,
		fabricante=?,
		cor=?,
		qntd=?,
		WHERE id_prod=?
	";
	include "conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($desc, $valor, $fab, $cor, $qntd, $id));	
	$conn = null;
	
	echo" <script>
		alert('Produto alterado com sucesso!');
		window.location.href='index.php';
		</script>";
	}
?>
<html lang="pt-br">
  <head>
    <title>Alterar Produto</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Inserir/insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  
  <body>
  <div class="container">
		<header>
		<h1>
			Alteração de Produto
		</h1>
		</header>
		
		<main>
		<form action="#" method="POST">
		
			Descrição <br> 
			<input type="text" name="desc" value="<?php echo $desc; ?>" class="campo" required>
			<br><br>
			
			Valor <br>
			<input type="text" name="valor" value="<?php echo $valor; ?>" class="campo" required>
			<br><br>
			
			Fabricante <br>
			<input type="text" name="fab" value="<?php echo $fab; ?>" class="campo" required>
			<br><br>
			
			Cor <br>
			<input type="text" name="cor" value="<?php echo $cor; ?>" class="campo" required>
			<br><br>
			
			Quantidade <br>
			<input type="number" name="qntd" value="<?php echo $qntd; ?>" class="campo" required>
			<br><br>
			
			Imagem <br>
			<input type="file" name="img" required>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick='window.history.back();' id="voltar">
		</form>
		</main>
  </div>		
  </body>
</html>