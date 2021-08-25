<?php

$id_marca = "";
$marca = $_POST['marca'];
$email = $_POST['email'];
$tele = $_POST['tele'];

	$sql = "INSERT INTO tb_Marcas(marca, email, telefone) VALUES (:marca, :email, :telefone)";
	include "../../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':marca'=>$marca, ':email'=>$email, ':telefone'=>$tele));
	$conn = null;
	
	echo "<script>
				alert('Fornecedor inserido com sucesso!'); 
				window.location.href='../tb_insert_fornecedor.php'; 
		 </script>";