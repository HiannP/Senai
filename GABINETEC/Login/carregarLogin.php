<?php
	session_start();

	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$senha = md5($senha);
	
	$sql = "SELECT * FROM tb_Usuarios WHERE email='$email' AND senha='$senha'";
	include "conexao.php";
	$Usuario = $conn -> prepare($sql);
	$Usuario -> execute(array($email, $senha));
	$conn = null;
	
	$porta = $Usuario -> rowCount();
	
	if($porta==1){
		foreach($Usuario as $U) {
			$Perfil = $U['perfil'];
			$Nome = $U['nome'];
			$Id = $U['id_user'];
			$_SESSION['perfil'] = $Perfil;
			$_SESSION['nome'] = $Nome;
			$_SESSION['id_user'] = $Id;
			
			if($Perfil == 5){
				header("Location: ../Administrador/");
			}
			if($Perfil == 3){
				header("Location: ../Colaborador/");
			}
			if($Perfil == 1){
				header("Location: ../Cliente/");
			}
		}		
	}
	else {
		echo "<script>
					alert('Usuário ou Senha icorreto(s)');
					window.location.href='login.php';
			  </script>";
	}
?>