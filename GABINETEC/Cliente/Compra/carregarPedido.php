<?php
	
	$id_user = $_POST['id_user'];
	$id_prod = $_POST['id_prod'];
	$qntd_pedido = $_POST['qntd_pedido'];
	
		$sql1 = "
		UPDATE tb_Produtos AS A 
		INNER JOIN tb_Vendas AS B SET
		A.qntd = A.qntd - $qntd_pedido,
		B.qntd_pedido = $qntd_pedido
		WHERE A.id_prod = B.FK_id_prod
		AND B.FK_id_user = $id_user
		AND B.situacao = 'Solicitado'
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql1);
	$alterar -> execute();	
	$conn = null;
	
	$sql = "
		UPDATE tb_Vendas SET
		valor_unit = valor_unit * qntd_pedido,
		situacao = 'Comprado'
		WHERE FK_id_user = $id_user
		AND situacao = 'Solicitado'
	";
	include "../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute();	
	$conn = null;

	echo "<script>
				alert('Compra realizada com sucesso!');
				window.location.href='../index.php';
		 </script>";
?>