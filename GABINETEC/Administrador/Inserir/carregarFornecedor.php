<?php

$id_marca = "";
$nome = $_POST['nome'];
$email = $_POST['email'];
$tele = $_POST['tele'];

	$sql = "INSERT INTO tb_Marcas(nome, email, telefone) VALUES (:nome, :email, :telefone)";
	include "../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':nome'=>$nome, ':email'=>$email, ':telefone'=>$tele));
	$conn = null;
	
	echo "<script>
				alert('Fornecedor inserido com sucesso!'); 
				window.location.href='tb_insert_fornecedor.php'; 
		 </script>";