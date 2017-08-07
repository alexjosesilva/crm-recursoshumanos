<?php  

	//acesso ao banco
    include 'conexao.php';
    
    //dados do cliente a ser inserido 
	$codigo		=	$_REQUEST['codigo'];
	
	//query
	$query = "DELETE FROM tfuncoes WHERE tfuncoes.codigoFuncao=".$codigo;

	$resultado = mysql_query($query,$con) or die ("erro em excluir dado no banco!");
	header('Location:funcao.php');

?>