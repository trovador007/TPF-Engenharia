<?php
		include_once 'menu-principal.php';
		require_once('database.class.php');
?>

<!DOCTYPE html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
			document.getElementById('form-login').style.display = 'none';
   		 });
	</script>
	<br>
		<div class="form-inline justify-content-center align-items-center">
		<form class="col-md-3" method="post" action="rota.class.php">
			<div class="alert alert-primary" style="text-align: center;">CADASTRO DE ROTA</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="inputGroup-sizing-default">TURNO</span>
		  		<div class="form-group">
		  			<select class="form-control" name="turno">
		  				<option value=''>Selecione...</option>
	  					<option value="Diurno">Diurno</option>
	  					<option value="Noturno">Noturno</option>
					</select>
		  		</div>
		  	</div>
		  	<br>
			<div class="input-group mb-3">
				<span class="input-group-text" id="inputGroup-sizing-default">STATUS</span>
		  		<div class="form-group">
		  			<select class="form-control" name="status">
		  				<option value=''>Selecione...</option>
	  					<option value="Válido">Válido</option>
	  					<option value="Inválido">Inválido</option>
					</select>
		  		</div>
		  	</div>
	  		<br>
	  		<div class="input-group mb-3">
	  			<span class="input-group-text" id="inputGroup-sizing-default">LOTE</span>
		  		<div class="form-group">
		  			<select class="form-control" name="lote">
		  				<?php 
	  							$objetoBanco = new Database();
	  							$retornoBanco = $objetoBanco->conectar();
	  							$stringConsulta = "SELECT * FROM cad_lote";
	  							$consulta = mysqli_query($retornoBanco, $stringConsulta);
	  							echo "<option value=''>Selecione...</option>";
	  					         while($row = mysqli_fetch_array($consulta)) {
	  					         	$value = $row['ID_LOTE'];
	  					         	$nome = $row['NOME_LOTE'];
	  					         	$empresa = $row['EMPRESA_RESPONSAVEL'];

	  					         	echo "<option value=".$value.">$nome - $empresa</option>";
	  					          } 
    					?>
					</select>
		  		</div>
		  	</div>
		  	<br>
	  		<div class="input-group mb-3">
	  			<span class="input-group-text" id="inputGroup-sizing-default">GERENTE</span>
		  		<div class="form-group">
		  			<select class="form-control" name="gerencia">
		  				<?php 
	  							$objetoBanco = new Database();
	  							$retornoBanco = $objetoBanco->conectar();
	  							$stringConsulta = "SELECT * FROM cad_gerencia";
	  							$consulta = mysqli_query($retornoBanco, $stringConsulta);
	  							echo "<option value=''>Selecione...</option>";
	  					         while($row = mysqli_fetch_array($consulta)) {
	  					         	$value = $row['ID_GERENCIA'];
	  					         	$nome = $row['NOME_GERENCIA'];

	  					         	echo "<option value=".$value.">$nome</option>";
	  					          } 
    					?>
					</select>
		  		</div>
		  	</div>
		  	<br>
		  	<div class="input-group mb-3">
	  			<span class="input-group-text" id="inputGroup-sizing-default">RESPONSÁVEL</span>
		  		<div class="form-group">
		  			<select class="form-control" name="responsavel">
		  				<?php 
	  							$objetoBanco = new Database();
	  							$retornoBanco = $objetoBanco->conectar();
	  							$stringConsulta = "SELECT * FROM cad_responsavel";
	  							$consulta = mysqli_query($retornoBanco, $stringConsulta);
	  							echo "<option value=''>Selecione...</option>";
	  					         while($row = mysqli_fetch_array($consulta)) {
	  					         	$value = $row['ID_RESPONSAVEL'];
	  					         	$nome = $row['NOME_RESPONSAVEL'];

	  					         	echo "<option value=".$value.">$nome</option>";
	  					          } 
    					?>
					</select>
		  		</div>
		  	</div>
		  	<br>
	  		<div class="input-group mb-3">
	  			<span class="input-group-text" id="inputGroup-sizing-default">FREQUENCIA</span>
		  		<div class="form-group">
		  			<select class="form-control" name="frequencia">
		  				<?php 
	  							$objetoBanco = new Database();
	  							$retornoBanco = $objetoBanco->conectar();
	  							$stringConsulta = "SELECT * FROM cad_frequencia";
	  							$consulta = mysqli_query($retornoBanco, $stringConsulta);
	  							echo "<option value=''>Selecione...</option>";
	  					         while($row = mysqli_fetch_array($consulta)) {
	  					         	$value = $row['FREQUENCIA'];
	  					     

	  					         	echo "<option value=".$value.">$value</option>";
	  					          } 
    					?>
					</select>
		  		</div>
		  	</div>
		  	<br>
	  		
	  		<div class="form-group">
	  			<button type="submit" class="btn btn-outline-primary col-md-12">Registrar</button>
	  		</div>
		</form>
</body>
</html>