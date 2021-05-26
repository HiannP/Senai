<?php

$id_user = "";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$perfil = $_POST['perfil'];
$obs = $_POST['obs'];

	$sql = "INSERT INTO Usuarios_tb VALUES (?, ?, ?, ?, ?, ?)";
	include "conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array($id_user, $nome, $email, $senha, $perfil, $obs));
	$conn = null;
