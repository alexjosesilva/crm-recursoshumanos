<?php
	 //acesso ao banco
	 include 'conexao.php';


	//testa se foi enviado algum dado para esta pagina
    if(isset($_REQUEST['codigoUsuario'])){

	$nomeUsuario 	 		=	$_REQUEST['nomeUsuario'];
	$codigoUsuario	 	=	$_REQUEST['codigoUsuario'];
	$senhaUsuario	 		=	$_REQUEST['senhaUsuario'];

  echo "nomeUsuario:   ".$nomeUsuario."<br>";
	echo "codigoUsuario: ".$codigoUsuario."<br>";
	echo "senhaUsuario:  ".$senhaUsuario."<br>";

	//query para atualizar o dado
	$query = "UPDATE localdb.tusuario SET nomeUsuario='".$nomeUsuario."', codigoUsuario='".$codigoUsuario."', senhaUsuario='".$senhaUsuario."' where codigoUsuario='".$codigoUsuario."'";
	$resultado = mysql_query($query,$con) or die ("2-erro em ATUALIZAR o banco!");

	header('Location:adm.php');
  }
	else{//caso não tenha nenhum dado!
		header("Location:adm.php");
	}

?>
