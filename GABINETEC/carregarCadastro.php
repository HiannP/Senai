<?php

$id_user = "";
$nome = $_POST['nome'];
$sobre = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['confiSenha'];
$senhaSegura = md5($senha);
$perfil = 1;
date_default_timezone_set('America/Sao_Paulo');
$data_actual = date('Y-m-d H:i:s', time());

	$sql = "INSERT INTO tb_Usuarios(nome, sobrenome, email, senha, perfil, create_date) VALUES (:nome, :sobrenome, :email, :senha, :perfil, :create_date)";
	include "conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':nome'=>$nome, ':sobrenome'=>$sobre, ':email'=>$email, ':senha'=>$senhaSegura, ':perfil'=>$perfil, ':create_date'=>$data_actual));
	$conn = null;
	
	echo "<script>
				alert('Usuário cadastrado com sucesso!'); 
				window.location.href='login.php'; 
		 </script>";
