

<div style="width: 30%; margin-left: 30%; margin-top: 10%; margin-bottom: 5%;">
	 
<span>login:1</span><br/>
<span>senha:123</span><br/>

<form action="acesso.php" metodo="POST" class="form-group">

	<img src="images/ico-rh.png" width="100px" style="margin-left:40%;">
	<div class="form-group">

		<label>Matricula</label> 
		<input name="codigoUsuario" id="codigoUsuario" type="text" class="form-control" /><br>
		
		<label>Senha</label>
		<input name="senhaUsuario" id="senhaUsuario" type="password" class="form-control" /><br>
		
		<input name="enviar" id="enviar" type="submit" value="Enviar"  class="btn btn-primary " />
		<input name="limpar" id="limpar" type="reset"  value="Limpar"  class="btn btn-primary " />
	</div>


</div>


