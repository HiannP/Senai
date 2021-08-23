<?php

$id_user = "";
$nome = $_POST['nome'];
$sobre = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confiSenha = $_POST['confiSenha'];
if($senha != $confiSenha) {
	header('Location: cadastro.php');
	exit;
}
$senhaSegura = md5($senha);
$perfil = 1;
date_default_timezone_set('America/Sao_Paulo');
$data_actual = date('Y-m-d H:i:s', time());

	$sql = "INSERT INTO tb_Usuarios(nome, sobrenome, email, senha, perfil, create_date) VALUES (:nome, :sobrenome, :email, :senha, :perfil, :create_date)";
	include "conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':nome'=>$nome, ':sobrenome'=>$sobre, ':email'=>$email, ':senha'=>$senhaSegura, ':perfil'=>$perfil, ':create_date'=>$data_actual));
/*	$query = 
	if($sql -> 'email' == ':email') {
		echo "<script>
				alert('Este email já foi cadastrado!'); 
				window.location.href='login.php'; 
		 </script>";
		 exit;
	} */
	$conn = null;
	
	echo "<script>
				alert('Usuário cadastrado com sucesso!'); 
				window.location.href='login.php'; 
		 </script>";
