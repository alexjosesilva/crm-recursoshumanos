<?php

//LISTA FUNCIONÁRIO //inicia sessão
session_start();

//dados do banco e dados sistema
include 'conexao.php';

//Variavel de destino para o formulario
$destino = "inserir_funcao.php";
$tituloformulario = "Incluir Função";


//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['codigoUsuario']) and !isset($_SESSION['senhaUsuario']) ) {
    //Destrói
    session_destroy();

    //Limpa
    unset ($_SESSION['codigoUsuario']);
    unset ($_SESSION['senhaUsuario']);

    //Redireciona para a página de autenticação
    header('location:login.php');
}

//se recebemos uma variavel pelo metodo Get, faça o seguinte
if(!empty($_GET['codigoAltFuncao'])){
  $codigo = $_GET['codigoAltFuncao'];

  //exibindo os dados do banco....
  $query   = "select * from tfuncoes where codigoFuncao=".$codigo;
  $dados   = mysql_query($query);
  $funcao  = mysql_fetch_assoc($dados);

  //alterar Destino
  $destino = "alterar_funcao.php";
  $tituloformulario = "Alterar Funcao";

  //ocultar o campo
  $oculto = '<input type="hidden" name="codigo" value="'.$codigo.'"/>';

}



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Gestão 3LM</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
		<body>
			<div class="wrapper">
			    <div class="box">
			        <div class="row">


		            <!-- sidebar -->
		            <div class="column col-sm-3" id="sidebar">

		               <img src="images/icone_rh.png"  width="150px" height="150px" > <a class="logo" href="#"><span>Gestão 3LM</span></a>


		                <ul class="nav">
		                    <li class="active">
		                    	<a href="adm.php">Usuarios</a>
		                    </li>
		                    <li>
		                    	<a href="funcao.php">Funcoes</a>
		                    </li>
		                    <li>
		                    	<a href="funcionario.php">Funcionarios</a>
		                    </li>
		                    <li>
		                    	<a href="sair.php">Sair</a>
		                    </li>
		                </ul>
		                <ul class="nav hidden-xs" id="sidebar-footer">
		                    <li>
		                       <a href="#"><h3>Gestão 3LM</h3>Sistema de Gestão RH</a>
		                    </li>
		                </ul>
		            </div>





			<!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">

                        <!-- content -->
                        <div class="col-sm-5" id="featured">
                          <div class="page-header text-muted">Funções</div>

                          <form class="form-horizontal" action="<?=$destino; ?>" method="post">
							<fieldset>

							<!-- Form Name -->
							<legend><?php echo $tituloformulario; ?></legend>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="filme">Nome da Função</label>
							  <div class="controls">
							    <input id="descricaoFuncao" name="descricaoFuncao" type="text" value="<?php echo isset($funcao)?$funcao['descricaoFuncao']:""; ?>" />

							  </div>
							</div>

							<!-- Text input -->
							<div class="control-group">
							  <label class="control-label" for="sinopse">Codigo da Função</label>
							  <div class="controls">
							    <textarea id="codigoFuncao" name="codigoFuncao" value="<?php echo isset($funcao)?$funcao['codigoFuncao']:""; ?>"></textarea>
							  </div>
							</div>




							<!-- Button -->
							<div class="control-group">
							  <label class="control-label" for=""></label>
							  <div class="controls">
							    <input type="submit" class="btn btn-inverse" value="Enviar" />
							  </div>
							</div>

							</fieldset>
							</form>
                        </div>

                        <!--/top story-->


                        <div class="col-sm-12" id="stories">
                          <div class="page-header text-muted divider">
                            Funções Cadastrados
                          </div>
                        </div>

                        <table class="table table-hover">
                        	<tr>
                        		<th></th>
                        		<th>Funcão</th>
                        		<th></th>
                        		<th></th>
                        	</tr>

                        	<?php


                        		$query = "select * from tfuncoes";
                        		$dados = mysql_query($query);

								while($linha = mysql_fetch_assoc($dados)){
                        	?>
	                        	<tr>
	                        		<td class="col-md-1"><a class="btn btn-default" href="funcao.php?codigoAltFuncao=<?=$linha['codigoFuncao']; ?>" role="button">Alterar</a></td>
	                        		<td class="col-md-6"><?php echo $linha['descricaoFuncao']; ?></td>


	                        		<td class="col-md-1"></td>


	                        		<td class="col-md-1"><a class="btn btn-danger" href="<?php echo "excluir_funcao.php?codigo=".$linha['codigoFuncao']; ?>" role="button">Excluir</a></td>
	                        	</tr>
                        	<?php
								}
                        	?>

						</table>

                      	<hr>

                        <a class="btn btn-info" href="<?php echo "imprimir_funcao.php?opcao=1"; ?>" role="button">Imprimir Listagem de Funções</a>

                        <hr>

                        <div class="row" id="footer">
                          <div class="col-sm-6">

                          </div>
                          <div class="col-sm-6">
                            <p>
                            <a href="#" class="pull-right">©Copyright Inc.</a>
                            </p>
                          </div>
                        </div>

                      <hr>

                      <h3 class="text-center">
                      	<a href="#" target="ext">3LM Gestão</a>
                      </h3>

                      <hr>


                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->



        </div>
    </div>
</div>


		  <!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>
