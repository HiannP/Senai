<?php

	$id_prod = $_GET['id_prod'];
	$id_user = $_GET['id_user'];
	$valor =  $_GET['valor_unit'];

$id_vendas = "";
$qntd_pedido = '1';
$situacao = 'Solicitado';
date_default_timezone_set('America/Sao_Paulo');
$data_actual = date('Y-m-d H:i:s', time());


	$sql = "INSERT INTO tb_Vendas(FK_id_prod, FK_id_user, qntd_pedido, data_compra, valor_unit, situacao) VALUES (:FK_id_prod, :FK_id_user, :qntd_pedido, :data_compra, :valor_unit, :situacao)";
	include "conexao.php";
	$requisicao = $conn -> prepare($sql);
	$requisicao -> execute(array(':FK_id_prod'=>$id_prod, ':FK_id_user'=>$id_user, ':qntd_pedido'=>$qntd_pedido, ':data_compra'=>$data_actual, ':valor_unit'=>$valor, ':situacao'=>$situacao));
	$conn = null;
	
	echo "<script>
				window.location.href='index.php'; 
		 </script>";
	
