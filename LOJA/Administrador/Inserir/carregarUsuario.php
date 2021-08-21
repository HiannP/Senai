<?php

$id_user = "";
$nome = $_POST['nome'];
$sobre = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senhaSegura = md5($senha);
$perfil = $_POST['perfil'];
date_default_timezone_set('America/Sao_Paulo');
$data_actual = date('Y-m-d H:i:s', time());
$obs = $_POST['obs'];

	$sql = "INSERT INTO tb_Usuarios(nome, sobrenome, email, senha, perfil, create_date, obs) VALUES (:nome, :sobrenome, :email, :senha, :perfil, :create_date, :obs)";
	include "../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':nome'=>$nome, ':sobrenome'=>$sobre, ':email'=>$email, ':senha'=>$senhaSegura, ':perfil'=>$perfil, ':create_date'=>$data_actual, ':obs'=>$obs));
	$conn = null;
	
	echo "<script>
				alert('Usuário inserido com sucesso!'); 
				window.location.href='tb_insert_usuario.php'; 
		 </script>";
