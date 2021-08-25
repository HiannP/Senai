<?php

$id_prod = "";
$categoria = $_POST['categ'];
$descricao = $_POST['desc'];
$valor_unit = $_POST['valor'];
$fabricante = $_POST['fab'];
$qntd = $_POST['qntd'];
$arquivo = $_FILES['img'];
$img_name = $arquivo['name'];
$img_size = $arquivo['size'];
$img_temp = $arquivo['tmp_name'];
$formato = pathinfo($img_name, PATHINFO_EXTENSION);
$img = uniqid().".".$formato;
$upload = move_uploaded_file($img_temp, '../../../imge/'.$img);

if(isset($upload)){
	$sql = "INSERT INTO tb_Produtos(FK_id_categoria, descricao, valor_unit, FK_id_marca, qntd, img) VALUES (:FK_id_categoria, :descricao, :valor_unit, :FK_id_marca, :qntd, :img)";
	include "../../conexao.php";
	$cadastro = $conn -> prepare($sql);
	$cadastro -> execute(array(':FK_id_categoria'=>$categoria, ':descricao'=>$descricao, ':valor_unit'=>$valor_unit, ':FK_id_marca'=>$fabricante, ':qntd'=>$qntd, ':img'=>$img));
	$conn = null;
	
	echo "<script>
				alert('Produto inserido com sucesso!'); 
				window.location.href='../tb_insert_produto.php'; 
		 </script>";
	
}