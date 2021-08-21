<?php

$id_marcas = "";
$nome = $_POST['nome'];
$email = $_POST['email'];
$tele = $_POST['telefone'];

	$sql = "INSERT INTO tb_Marcas VALUES (?, ?, ?, ?)";
	include "../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array($id_marcas, $nome, $email, $tele));
	$conn = null;
	
	echo "<script>
				alert('Fornecedor inserido com sucesso!'); 
				window.location.href='../index.php'; 
		 </script>";