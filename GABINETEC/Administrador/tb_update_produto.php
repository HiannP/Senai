<?php
	
	$id_prod = $_GET['id_prod'];
	$sql = "SELECT * FROM tb_Produtos AS A
			INNER JOIN tb_Categorias AS B
			INNER JOIN tb_Marcas AS C
			ON A.id_prod = $id_prod
			AND A.FK_id_categoria = B.id_categoria
			AND A.FK_id_marca = C.id_marca";
	include "conexao.php";
	$produtos = $conn -> prepare($sql);
	$produtos -> execute();	
	$conn = null;
	foreach($produtos as $prod){
		$categ = prod['categoria'];
		$desc = $prod["descricao"];
		$valor = $prod["valor_unit"];
		$fab = $prod['marca'];
		$qntd = $prod["qntd"];
		$img = $prod["img"];
	}
	
	if(isset($_POST['salvar'])){
		$categ = $_POST['categ'];
		$desc = $_POST['desc'];
		$valor = $_POST['valor'];
		$fab = $_POST['fab'];
		$qntd = $_POST['qntd'];
		$img = $_POST["img"];
		
	$sql = "
		UPDATE tb_Produtos SET
		FK_id_categoria=?,	
		descricao=?,
		valor_unit=?,
		FK_id_marca=?,
		qntd=?,
		img=?
		WHERE id_prod=?
	";
	include "conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($categ, $desc, $valor, $fab, $qntd, $img, $id));	
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
		<form action="#" method="POST" enctype="multipart/form-data">
		
			Categoria <br>
			<select name="categ" class="campo" required>
				<option></option>
				<?php
				foreach($produtos as $prod) {
				
					$categ = $prod['id_categoria'];
					$nomeC = $prod['categoria'];

					echo "<option value='$categ'>$nomeC</a>";
				}
				?>
			</select>
			<br><br>
		
			Descrição <br>
			<input type="text" name="desc" class="campo" required>
			<br><br>
			
			Preço (R$) <br>
			<input type="text" name="valor" class="campo" required>
			<br><br>
			
			Fabricante <br>
			<select name="fab" class="campo" required>
			<option></option>
				<?php
				foreach($produtos as $marc) {
				
					$marca = $prod['id_marca'];
					$nomeM = $prod['marca'];

					echo "<option value='$marca'>$nomeM</a>";
				}
				?>
			</select>
			<br><br>
			
			Quantidade <br>
			<input type="number" name="qntd" class="campo" required>
			<br><br>
			
			Imagem <br>
			<input type="file" name="img"> <br>
			<small style="font-size: 70%; color: gray;">Dimensão de Imagem <br>!!! RECOMENDADA !!!: 200 X 200</small>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick="window.location.href='index.php';" id="voltar">
		</form>
		</main>
  </div>		
  </body>
</html>