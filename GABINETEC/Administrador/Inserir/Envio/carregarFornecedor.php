<?php

$id_marca = "";
$marca = $_POST['marca'];
$email = $_POST['email'];

	$sql = "INSERT INTO tb_Marcas(marca, email) VALUES (:marca, :email)";
	include "../../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':marca'=>$marca, ':email'=>$email));
	$conn = null;
	
	echo "<script>
				alert('Fornecedor inserido com sucesso!'); 
				window.location.href='../tb_insert_fornecedor.php'; 
		 </script>";