<?php

$id_categoria = "";
$categ = $_POST['categ'];

	$sql = "INSERT INTO tb_Categorias(categoria) VALUES (:categoria)";
	include "../../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':categoria'=>$categ));
	$conn = null;
	
	echo "<script>
				alert('Categoria inserido com sucesso!'); 
				window.location.href='../tb_insert_categoria.php'; 
		 </script>";