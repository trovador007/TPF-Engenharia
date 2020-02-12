<?php
	include_once 'menu-principal.php'
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Menu Principal</title>
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
			document.getElementById('form-login').style.display = 'none';
   		 });
	</script>
	<br>
	 <div class="form-inline">
		<form class="col-md-3" method="post" action="gerencia.class.php">
			<div class="alert alert-primary" style="text-align: center;">Gerencia</div>
			<div class="form-group">
	    		<input type="text" class="form-control col-md-12" name="gerencia" id="gerencia" placeholder="Gerente..." autocomplete="off" required>
	  		</div>
	  		<br>
	  		<div class="form-group">
	  			<button type="submit" class="btn btn-outline-primary col-md-12">Registrar</button>
	  		</div>
		</form>
		<form class="col-md-3" method="post" action="responsavel.class.php">
			<div class="alert alert-primary" style="text-align: center;">Responsável</div>
			<div class="form-group">
	    		<input type="text" class="form-control col-md-12" id="responsavel" name="responsavel" placeholder="Responsável..." autocomplete="off" required>
	  		</div>
	  		<br>
	  		<div class="form-group" id="login">
	  			<button type="submit" class="btn btn-outline-primary col-md-12">Registrar</button>
	  		</div>
		</form>
	</div>
	<br>
		<div class="form-inline">
				<form class="col-md-3" method="post" action="bairro.class.php">
				<div class="alert alert-primary" style="text-align: center;">Bairro</div>
				<div class="form-group">
		    		<input type="text" class="form-control col-md-12" id="bairro" name="bairro" placeholder="Nome do Bairro..." autocomplete="off" required>
		  		</div>
		  		<br>
		  		<div class="form-group">
		  			<button type="submit" class="btn btn-outline-primary col-md-12">Registrar</button>
		  		</div>
			</form>
			</form>
				<form class="col-md-3" method="post" action="frequencia.class.php">
				<div class="alert alert-primary" style="text-align: center;">Frequencia</div>
				<div  class="form-group" class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="frequencia[]" value="Seg">
				  <label class="form-check-label" for="inlineCheckbox1" name="frequencia[]">Segunda</label>
				</div>
				<div class="form-group" class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="frequencia[]" value="Ter">
				  <label class="form-check-label" for="inlineCheckbox2">Terça</label>
				</div>
				<div class="form-group" class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="frequencia[]" value="Quar" >
				  <label class="form-check-label" for="inlineCheckbox3">Quarta</label>
				</div>
				<div class="form-group" class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="frequencia[]" value="Quin" >
				  <label class="form-check-label" for="inlineCheckbox3">Quinta</label>
				</div>
				<div class="form-group" class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="frequencia[]" value="Sex" >
				  <label class="form-check-label" for="inlineCheckbox3">Sexta</label>
				</div>
				<div class="form-group" class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="frequencia[]" value="Sab" >
				  <label class="form-check-label" for="inlineCheckbox3">Sábado</label>
				</div>
				<div class="form-group">
		  			<button type="submit" class="btn btn-outline-primary col-md-12">Registrar</button>
		  		</div>
			</div>
			</form>
		</div>
		<br>
		<form class="col-md-3" method="post" action="lote.class.php">
				<div class="alert alert-primary" style="text-align: center;">Lote</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">Lote</span>
				  </div>
				  <input type="number"  min="1" id="lote" name="lote" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" autocomplete="off" required>
				</div>
    			
				
		  		<div class="form-group">
		    		<input type="text" class="form-control col-md-12" id="empresa" name="empresa-responsavel" placeholder="Empresa Responsável..."autocomplete="off" required>
		  		</div>
		  		
		  		<div class="form-group">
		  			<button type="submit" class="btn btn-outline-primary col-md-12">Registrar</button>
		  		</div>
		</form>
</body>
</html>