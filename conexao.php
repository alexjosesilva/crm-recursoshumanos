<?php

//acesso ao banco de dados   
$enderecobd = "localhost";   
$dbname = "dbteste";       
                             
//dados do banco             
$usuariobd = "root";         
$senhabd = "";         

//conectar ao banco                                                                                   
$con   = mysql_connect($enderecobd,$usuariobd,$senhabd) or die ("Erro na conexão do Banco de Dados!");

//acessou ao banco dados	                                                 
$selbd = mysql_select_db($dbname,$con) or die ("Erro em selecionar Tabela!");

?>