<?php
//inicia sessão
session_start();


	//Variavel de destino para o formulario
	$destino = "inserir_usuario.php";
	$tituloformulario = "Incluir Cliente";

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['codigoUsuario']) and !isset($_SESSION['senhaUsuario']) ) {
    //Destrói
    session_destroy();

    //Limpa
    unset ($_SESSION['codigoUsuario']);
    unset ($_SESSION['senhaUsuario']);

    //Redireciona para a página de autenticação
    header('location:index.php');
}
	//acesso ao banco e tabelas do sistema
	include 'conexao.php';
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
            <!-- /sidebar -->

            <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">

                        <!-- content -->
                        <div class="col-sm-5" id="featured">
                          <div class="page-header text-muted">Usuario: <?php echo $_SESSION['usuarioLogado'];  ?></div>

                          <form class="form-horizontal" action="<?=$destino; ?>" method="post">
							<fieldset>

							<!-- Form Name -->
							<legend> <?php echo $tituloformulario; ?> </legend>

							<!-- Text input-->
                            <div class="control-group">
                              <label class="control-label" for="nomeUsuario">Matricula Usuario</label>
                              <div class="controls">
                                <input id="codigoUsuario" name="codigoUsuario" type="text" placeholder=" Nome Usuario" autocomplete="off" />

                              </div>
                            </div>

                            <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="nomeUsuario">Nome Usuario</label>
							  <div class="controls">
							    <input id="nomeUsuario" name="nomeUsuario" type="text" value="<?php echo isset($usuario)?$usuario['nomeUsuario']:""; ?>"  placeholder=" Nome Usuario" autocomplete="off" />

							  </div>
							</div>


							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="senhaUsuario">Senha Usuario</label>
							  <div class="controls">
							    <input id="senhaUsuario" name="senhaUsuario" type="password" placeholder="senha do Usuario" class="input-xxlarge" autocomplete="off">

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
                            Usuários Cadastrados
                          </div>
                        </div>

                        <table class="table table-hover">
                        	<tr>
                        		<th></th>
                        		<th>Usuarios</th>
                        		<th></th>
                        		<th></th>
                        	</tr>

                        	<!--Lista filmes no banco -->

                        	<?php
                        		//exibindo os dados do banco....
                        		$query = "select * from tusuario";
                        		$dados = mysql_query($query);

								while($linha = mysql_fetch_assoc($dados)){
                        	?>
	                        	<tr>
	                        		<td class="col-md-1">
                                        <a class="btn btn-default" href="adm.php?codigoAltUsuario=<?=$linha['codigoUsuario']; ?>" role="button">Alterar</a>
                                    </td>

                                    <td class="col-md-6"><?php echo $linha['nomeUsuario'];  ?></td>

                                    <td class="col-md-1">

                                    </td>


	                        		<td class="col-md-1"><a class="btn btn-danger" href="<?php echo "excluir_usuario.php?codigoUsuario=".$linha['codigoUsuario']; ?>" role="button">Excluir</a></td>
	                        	</tr>
                        	<?php
								}
                        	?>

						</table>

                        <hr>
                        	<a class="btn btn-info" href="<?php echo "imprimir_usuario.php?opcao=1"; ?>" role="button">Imprimir Relatorio Todos os Usuario</a>
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
