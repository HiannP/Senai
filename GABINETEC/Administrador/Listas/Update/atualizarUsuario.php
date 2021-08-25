<?php
	
$id_user = $_POST['id_user'];
$nome = $_POST['nome'];
$sobre = $_POST['sobrenome'];
$email = $_POST['email'];	
$senha = $_POST['senha'];
$senhaSegura = md5($senha);
$perfil = $_POST['perfil'];		
	
	$sql = "
		UPDATE tb_Usuarios SET 
		nome = ?,
		sobrenome = ?,
		email = ?,
		senha = ?,
		perfil = ?
		WHERE id_user = ?
	";
	include "../../conexao.php";
	$alterar = $conn -> prepare($sql);
	$alterar -> execute(array($nome, $sobre, $email, $senhaSegura, $perfil, $id_user));	
	$conn = null;
	
	echo" <script>
		alert('Usuário alterado com sucesso!');
		window.location.href='../lista_usuarios.php';
		</script>";
		
?>