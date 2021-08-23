<?php
	
	$sql = "SELECT * FROM tb_Categorias";
	include "../conexao.php";
	$categorias = $conn -> prepare($sql);
	$categorias -> execute();
	$conn = null;
	
	$sql1 = "SELECT * FROM tb_Marcas";
	include "../conexao.php";
	$marcas = $conn -> prepare($sql1);
	$marcas -> execute();
	$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Inserção de Produto</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insert style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  </head>
  <body>
  <div class="container"> 
		<header>
		<h1>
			Inserção de Produto
		</h1>	
		</header>
		
		<main>
		<form action="carregarProduto.php" method="POST" enctype="multipart/form-data">
		
			Categoria <br>
			<select name="categ" class="campo" required>
				<option></option>
				<?php
				foreach($categorias as $cate) {
				
					$categ = $cate['id_categoria'];
					$nomeC = $cate['categoria'];

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
				foreach($marcas as $marc) {
				
					$marca = $marc['id_marca'];
					$nomeM = $marc['marca'];

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