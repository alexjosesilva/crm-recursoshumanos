<?php
	 //acesso ao banco
	 include 'conexao.php';


	//testa se foi enviado algum dado para esta pagina
    if(isset($_REQUEST['codigoUsuario'])){

	$nomeUsuario 	 		=	$_REQUEST['nomeUsuario'];
	$codigoUsuario	 	=	$_REQUEST['codigoUsuario'];
	$senhaUsuairo	 		=	$_REQUEST['senhaUsuario'];

  echo "Teste: ".$nomeUsuario."<br>";
	echo "Teste: ".$codigoUsuario."<br>";
	echo "Teste: ".$senhaUsuario."<br>";

	//query para atualizar o dado
	$query = "UPDATE `bdteste`.`tusuario` SET nomeUsuario=".$nomeUsuario."', codigoUsuario='".$codigoUsuario."',senhaUsuario='".$senhaUsuario."' where codigoUsuario=".$codigoUsuario;
	$resultado = mysql_query($query,$con) or die ("erro em ATUALIZAR o banco!");

	header('Location:adm.php');
  }
	else{//caso não tenha nenhum dado!
		header("Location:adm.php");
	}

?>
