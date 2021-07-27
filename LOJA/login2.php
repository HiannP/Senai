<?php
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	//echo $email;
	//echo $senha;
	
	$sql="SELECT * FROM tb_Usuarios WHERE email=? AND senha=?";
	include "conexao.php";
	$Usuario = $conn -> prepare($sql);
	$Usuario -> execute(array($email, $senha));
	
	$conn = null;
	
	$porta = $Usuario -> rowCount();
	
	if($porta==1){
		foreach($Usuario as $U) {
			$Perfil = $U['perfil'];
			//echo $Perfil;
			if($Perfil == 5){
				header("Location: Administrador/");
			}
			if($Perfil == 3){
				header("Location: Colaborador/");
			}
			if($Perfil == 1){
				header("Location: Cliente/");
			}
		}		
	}
	else {
		echo" <script>
		alert('Usuário ou Senha não encontrados');
		window.location.href='login.php';
		</script>";
	}
?>