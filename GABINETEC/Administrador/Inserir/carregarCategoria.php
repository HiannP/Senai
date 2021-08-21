<?php

$id_categoria = "";
$nome = $_POST['nome'];

	$sql = "INSERT INTO tb_Categoria VALUES (?, ?)";
	include "../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array($id_categoria, $nome));
	$conn = null;
	
	echo "<script>
				alert('Categoria inserido com sucesso!'); 
				window.location.href='../index.php'; 
		 </script>";