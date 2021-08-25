<?php 
	
	$id_user = $_GET['id_user'];

$id_agendamento = "";
date_default_timezone_set('America/Sao_Paulo');
$data_actual = date('Y-m-d H:i:s', time());	
$data_agendada = $_POST['data'];

	$sql = "INSERT INTO tb_Agendamentos(FK_id_user, data_solicitacao, data_agendada) VALUES (:FK_id_user, :data_solicitacao, :data_agendada)";
	include "conexao.php";
	$agendada = $conn -> prepare($sql);
	$agendada -> execute(array(':FK_id_user'=>$id_user, ':data_solicitacao'=>$data_actual, ':data_agendada'=>$data_agendada));
	$conn = null;
	
	echo "<script>
				alert('Data agendada com sucesso!'); 
				window.location.href='index.php'; 
		 </script>";
?>