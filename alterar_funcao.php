<?php
	 //acesso ao banco
	 include 'conexao.php';


	//testa se foi enviado algum dado para esta pagina
    if(isset($_REQUEST['codigoFuncao'])){

	$descricaoFuncao 	 =	$_REQUEST['descricaoFuncao'];
	$codigoFuncao	 	 =	$_REQUEST['codigoFuncao'];


	//query para atualizar o dado
	$query = "UPDATE tfuncoes SET
	descricaoFuncao='".$descricaoFuncao."', 
	codigoFuncao='".$codigoFuncao."'
	where codigoFuncao='".$codigoFuncao."'";

	$resultado = mysql_query($query,$con) or die ("erro em ATUALIZAR o banco!");
	header('Location:funcao.php');

    }
	else{//caso não tenha nenhum dado!
		header("Location:funcao.php");
	}

?>
