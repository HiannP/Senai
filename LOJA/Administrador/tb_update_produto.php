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
		$obs = $p["obs"];
	}
	
	if(isset($_POST['salvar'])){
		$desc = $_POST['desc'];
		$valor = $_POST['valor'];
		$fab = $_POST['fab'];
		$cor = $_POST['cor'];
		$qntd = $_POST['qntd'];
		$obs = $_POST['obs'];
		
	$sql = "
		UPDATE Produtos_tb SET 
		descricao=?,
		valor_unit=?,
		fabricante=?,
		cor=?,
		qntd=?,
		obs=?
		WHERE id_prod=?
	";
	include "conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($desc, $valor, $fab, $cor, $qntd, $obs, $id));	
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
  </head>
  <body>
		<hr>
		<h2>
			Alteração de Produto
		</h2>
		<hr>
		
		<form action="#" method="POST">
		
			Descrição: 
			<input type="text" name="desc" value="<?php echo $desc; ?>">
			<br><br>
			
			Valor:
			<input type="text" name="valor" value="<?php echo $valor; ?>">
			<br><br>
			
			Fabricante:
			<input type="text" name="fab" value="<?php echo $fab; ?>">
			<br><br>
			
			Cor:
			<input type="text" name="cor" value="<?php echo $cor; ?>">
			<br><br>
			
			Quantidade:
			<input type="number" name="qntd" value="<?php echo $qntd; ?>">
			<br><br>
			
			Imagem:
			<input type="file" name="img">
			<br><br>
			
			OBS:
			<input type="text" name="obs" value="<?php echo $obs; ?>">
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar">
		</form>
		<hr>
  </body>
</html>