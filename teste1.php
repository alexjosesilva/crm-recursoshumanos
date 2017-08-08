<?php
	include 'conexao.php';

	$codigoUsuario = $_GET['codigo'];

	if(!empty($codigoUsuario)){
		echo $codigoUsuario."<br>";

		$query   = "select * from tusuario where codigoUsuario=".$codigoUsuario;
  	$dados   = mysql_query($query);
  	//$usuario = mysql_affected_rows($dados));
    var_dump($usuario);

		echo "<br>";

		echo isset($usuario)?$usuario['nomeUsuario']:"";

	}

?>
