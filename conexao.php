<?php

$Servidor = "br924.hostgator.com.br";
$Usuario = "modain69_grupo1";
$DB_Nome = "modain69_info1h";
$Senha = "grupo1";

	try{
		$conn = new PDO("mysql:host=$Servidor; dbname=$DB_Nome",$Usuario,$Senha);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "Conectado com sucesso. PARABÉNS";
	}
	
	catch(PDOException $e){
		echo "Erro de Conexão. ARRUMA ISSO DAE : ". $e->getMessage();
	}
?>