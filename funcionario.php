<?php

//LISTA FUNCIONÁRIO //inicia sessão
session_start();

//dados do banco e dados sistema
include 'conexao.php';

//Variavel de destino para o formulario
$destino = "inserir_funcionario.php";
$tituloformulario = "Incluir Funcionario";

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
if(!empty($_GET['codigoAltFuncionario'])){
  $codigo = $_GET['codigoAltFuncionario'];

  //exibindo os dados do banco....
  $query       = "select * from tfuncionario where codigoFuncionario=".$codigo;
  $dados       = mysql_query($query);
  $funcionario = mysql_fetch_assoc($dados);

  //alterar Destino
  $destino = "alterar_funcionario.php";
  $tituloformulario = "Alterar Funcionario";

  //ocultar o campo
  $oculto = '<input type="hidden" name="codigo" value="'.$codigo.'"/>';

}


?>


<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Gestão 3LM</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">


		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->


	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="/resources/demos/style.css">
	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script>
	  $( function() {
	    $( "#dataNascimento" ).datepicker();
	  } );
	  </script>

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
                          <div class="page-header text-muted">FUNCIONÁRIOS</div>
                          <form class="form-horizontal" action="<?=$destino; ?>" method="post">
							<fieldset>

							<!-- Form Name -->
							<legend><?php echo $tituloformulario; ?></legend>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="filme">Nome</label>
							  <div class="controls">
							    <input id="nomeFuncionario" name="nomeFuncionario" type="text"  value="<?php echo isset($funcionario)?$funcionario['nomeFuncionario']:""; ?>" class="input-xxlarge" />

							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="trailer">Funcao</label>
							  <div class="controls">

							  	<select name="funcao" class="form-control">
							  		<option value="">Selecione</option>
							  		<?php
                        	  $query = "select * from tfuncoes";
                      			$dados = mysql_query($query);

										        while($linha = mysql_fetch_assoc($dados)){
	                        			echo "<option value='".$linha['codigoFuncao']."'>".$linha['descricaoFuncao']."</option>";
                      		  }
                		?>


							  	</select>

							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="salario">Salario</label>
							  <div class="controls">
							    <input id="salario" name="salario" type="text" value="<?php echo isset($funcionario)?$funcionario['salario']:""; ?>" class="input-xxlarge">

							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="codigoFuncionario">Matricula Funcionario</label>
							  <div class="controls">
							    <input id="codigoFuncionario" name="codigoFuncionario" type="text" value="<?php echo isset($funcionario)?$funcionario['codigoFuncionario']:""; ?>" >
							  </div>
							</div>

							<!-- Text input-->
							<div >
							  <label  for="dataNascimento">Data de nascimento</label>
							   <p> <input id="dataNascimento" name="dataNascimento" type="text" value="<?php echo isset($funcionario)?$funcionario['dataNascimento']:""; ?>" > </p>
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
                            Funcionários Cadastrados
                          </div>
                        </div>

                        <table class="table table-hover">
                        	<tr>
                        		<th></th>
                        		<th>Funcionários</th>
                        		<th></th>
                        	</tr>

                        	<!--CODIGO PARA LISTA FUNCIONARIOS -->
                        	<?php


                        		$query = "select * from tfuncionario";
                        		$dados = mysql_query($query);


								while($linha = mysql_fetch_assoc($dados)){
                        	?>
	                        	<tr>
	                        		<td class="col-md-1"><a class="btn btn-default" href="funcionario.php?codigoAltFuncionario="<?=$linha['codigoFuncionario'];?> role="button">Alterar</a></td>
	                        		<td class="col-md-6"><?php echo $linha['nomeFuncionario']; ?></td>
	                        		<td class="col-md-1"></td>
	                        		<td class="col-md-1"><a class="btn btn-danger" href="<?php echo "excluir_funcionario.php?codigo=".$linha['codigoFuncionario']; ?>" role="button">Excluir</a></td>
	                        	</tr>
                        	<?php
								}
                        	?>
						</table>

                      	<hr>

                        <p>
	                       <a class="btn btn-info" href="<?php echo "imprimir_funcionario.php?opcao=1"; ?>" role="button">Imprimir Listagem de Todos os Funcionarios</a>
	                       <a class="btn btn-info" href="<?php echo "imprimir_funcionario.php?opcao=2"; ?>" role="button">Imprimir Listagem de Funcionarios Por Função</a>
                        </p>

                        <p>
	                       <a class="btn btn-info" href="<?php echo "imprimir_funcionario.php?opcao=3"; ?>" role="button">Imprimir Listagem de Funcionarios Por Salario</a>
	                       <a class="btn btn-info" href="<?php echo "imprimir_funcionario.php?opcao=4"; ?>" role="button">Imprimir Listagem de Funcionarios Por Aniversariantes</a>
	                    </p>


                        <hr>

                       <div class="" id="footer">
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
