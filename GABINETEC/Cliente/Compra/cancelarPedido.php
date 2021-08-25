<?php

	$id_user = $_GET['id_user'];

	$sql = "DELETE FROM tb_Vendas WHERE FK_id_user = $id_user AND situacao = 'Solicitado'";
	include "../conexao.php";
	$delete = $conn -> prepare($sql);
	$delete -> execute();	
	$conn = null;
	
	echo "<script>
				alert('Pedido(s) cancelado com sucesso!'); 
				window.location.href='../index.php'; 
		 </script>";
	
?>