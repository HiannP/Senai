<?php
	
	$id = $_GET['id_marcas'];
	$sql = "SELECT * FROM tb_Marcas WHERE id_marcas='$id'";
	include "../../conexao.php";
	$forn = $conn -> prepare($sql);
	$forn -> execute();	
	$conn = null;
	foreach($forn as $p){
		$nome = $p["nome"];
		$email = $p["email"];
		$tel = $p["telefone"];
	}
	
	if(isset($_POST['salvar'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$tel = $_POST['telefone'];
		
	$sql = "
		UPDATE tb_Marcas SET 
		nome=?,
		email=?,
		telefone=?,
		WHERE id_marcas=?
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($nome, $email, $tel, $id));	
	$conn = null;
	
	echo" <script>
		alert('Fornecedor alterado com sucesso!');
		window.location.href='index.php';
		</script>";
	}
?>
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
			<input type="text" name="nome" value="<?php echo $nome; ?>" class="campo" required>
			<br><br>
			
			Email:
			<input type="text" name="email" value="<?php echo $email; ?>" class="campo" required>
			<br><br>
			
			Telefone:
			<input type="tel" name="tele" value="<?php echo $tel; ?>" pattern="[0-9]{4}-[0-9]{4}" class="campo"> <br><small style="color: gray;">(Opcional)</small>
			<br><br>
			
			<input type="submit" name="salvar" value="Salvar" id="salvar">
			<input type="button" value="Voltar" onclick='window.history.back();' id="voltar">
		</form>
		</main>
  </div>		
  </body>
</html>