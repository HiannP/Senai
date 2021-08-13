<?php

$id_user = "";
$nome = $_POST['nome'];
sobre = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$perfil = $_POST['perfil'];
$obs = $_POST['obs'];

	$sql = "INSERT INTO tb_Usuarios VALUES (?, ?, ?, ?, ?, ?, ?)";
	include "../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array($id_user, $nome, sobre, $email, $senha, $perfil, $obs));
	$conn = null;
	
	echo "<script>
				alert('Usuário inserido com sucesso!'); 
				window.location.href='../index.php'; 
		 </script>";
