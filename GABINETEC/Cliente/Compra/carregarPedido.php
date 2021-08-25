<?php
	
	$id_user = $_POST['id_user'];
	
	$sql = "
		UPDATE tb_Vendas SET
		situacao = 'Comprado'
		WHERE FK_id_user = $id_user
		AND situacao = 'Solicitado'
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute();	
	$conn = null;
	
	echo" <script>
		alert('Compra realizada com sucesso!');
		window.location.href='../index.php';
		</script>";
?>