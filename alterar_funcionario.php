<?php
	 //acesso ao banco
	 include 'conexao.php';

	//testa se foi enviado algum dado para esta pagina
    if(isset($_REQUEST['codigoFuncionario'])){

			$nomeFuncionario 	 		 =	$_REQUEST['nomeFuncionario'];
			$codigoFuncionario	 	 =	$_REQUEST['codigoFuncionario'];
			$salario							 =	$_REQUEST['salario'];
			$dataNascimento				 =	$_REQUEST['dataNascimento'];
			$funcao								 =	$_REQUEST['funcao'];

   echo "<br>".$codigoFuncionario;
	 echo "<br>".$nomeFuncionario;

	//query para atualizar o dado
	$query = "UPDATE tfuncionario SET 
		codigoFuncionario='".$codigoFuncionario."',
		nomeFuncionario='".$nomeFuncionario."',
		salario='".$salario."',
		dataNascimento='".$dataNascimento."',
		funcao='".$funcao."'
		where
		codigoFuncionario='".$codigoFuncionario."'";

	$resultado = mysql_query($query,$con) or die ("erro em ATUALIZAR o banco!");

	var_dump ($resultado);


	header('Location:funcionario.php');

    }
	else{//caso não tenha nenhum dado!
		header("Location:funcionario.php");
	}

?>
