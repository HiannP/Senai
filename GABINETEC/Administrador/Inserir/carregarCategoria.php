<?php

$id_categoria = "";
$nome = $_POST['nome'];

	$sql = "INSERT INTO tb_Categorias(nome) VALUES (:nome)";
	include "../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':nome'=>$nome));
	$conn = null;
	
	echo "<script>
				alert('Categoria inserido com sucesso!'); 
				window.location.href='tb_insert_categoria.php'; 
		 </script>";