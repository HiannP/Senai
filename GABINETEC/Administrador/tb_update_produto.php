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
	
	$sql1 = "SELECT * FROM tb_Categorias";
	include "conexao.php";
	$categorias = $conn -> prepare($sql1);
	$categorias -> execute();
	$conn = null;
	
	$sql2 = "SELECT * FROM tb_Marcas";
	include "conexao.php";
	$marcas = $conn -> prepare($sql2);
	$marcas -> execute();
	$conn = null;
	
	foreach($produtos as $prod) {
		$FK_id_categoria = $prod['FK_id_categoria'];
		$FK_id_marca = $prod['FK_id_marca'];
		$categ = $prod['categoria'];
		$desc = $prod["descricao"];
		$valor = $prod["valor_unit"];
		$fab = $prod['marca'];
		$qntd = $prod["qntd"];
		$img = $prod["img"];
	}
	
	$imge = $_GET['img'];
	if(isset($_POST['salvar'])) {
		unlink("../imge/$imge.jpg");
		$categ = $_POST['categ'];
		$desc = $_POST['desc'];
		$valor = $_POST['valor'];
		$fab = $_POST['fab'];
		$qntd = $_POST['qntd'];
		$arquivo = $_FILES['img'];
		$img_name = $arquivo['name'];
		$img_size = $arquivo['size'];
		$img_temp = $arquivo['tmp_name'];
		$formato = pathinfo($img_name, PATHINFO_EXTENSION);
		$img = uniqid().".".$formato;
		$upload = move_uploaded_file($img_temp, '../imge/'.$img);

if(isset($upload)) {		
	$sql = "
		UPDATE tb_Produtos SET
		FK_id_categoria = ?,	
		descricao = ?,
		valor_unit = ?,
		FK_id_marca = ?,
		qntd = ?,
		img = ?
		WHERE id_prod = ?
	";
	include "conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($categ, $desc, $valor, $fab, $qntd, $img, $id_prod));	
	$conn = null;
	
	echo" <script>
				alert('Produto alterado com sucesso!');
				window.location.href='index.php';
		  </script>";
		
		}
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
				<option value="<?php echo $FK_id_categoria ?>"><?php echo $categ; ?></option>
				
				<?php
				foreach($categorias as $cate) {
				
					$categC = $cate['id_categoria'];
					$nomeC = $cate['categoria'];

					echo "<option value='$categC'>$nomeC</a>";
				}
				?>
			</select>
			<br><br>
		
			Descrição <br>
			<input type="text" name="desc" class="campo" value="<?php echo $desc; ?>" required>
			<br><br>
			
			Preço (R$) <br>
			<input type="text" name="valor" class="campo" value="<?php echo $valor; ?>" required>
			<br><br>
			
			Fabricante <br>
			<select name="fab" class="campo" required>
			<option value="<?php echo $FK_id_marca ?>"><?php echo $fab; ?></option>
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
			<input type="number" name="qntd" class="campo" value="<?php echo $qntd; ?>" required>
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