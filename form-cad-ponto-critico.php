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
		<form class="col-md-3" method="post" action="ponto-critico.class.php">
			<div class="alert alert-primary" style="text-align: center;">CADASTRO DE PONTO CRÍTICO</div>
			<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">VOL</span>
				  </div>
				  <input type="number"  min="1" id="idponto" name="idponto" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" autocomplete="off" placeholder="ID...">
				</div>
			<div class="form-group">
	    		<input type="text" class="form-control col-md-12" name="endereco" id="endereco" placeholder="Endereço..." autocomplete="off">
	  		</div>
	  		<br>
	  		<div class="form-group">
	    		<input type="text" class="form-control col-md-12" name="p-referencia" id="p-referencia" placeholder="Ponto de Referência..." autocomplete="off">
	  		</div>
	  		<br>
	  		<div class="form-group">
	    		<input type="number" class="form-control col-md-12" name="nreferencia" id="nreferencia" placeholder="Número de Referência..." autocomplete="off" min="1">
	  		</div>
	  		<br>
	  		<div class="form-group">
	    		<input type="text" class="form-control col-md-12" name="latitude" id="latitude" placeholder="Latitude..." autocomplete="off" onkeypress="$(this).mask('00.00000000')">
	  		</div>
	  		<br>
	  		<div class="form-group">
	    		<input type="text" class="form-control col-md-12" name="longitude" id="longitude" placeholder="Longitude..." autocomplete="off" onkeypress="$(this).mask('00.00000000')">
	  		</div>
	  		<br>
	  		<div class="input-group mb-3">
	  			<span class="input-group-text" id="inputGroup-sizing-default">STATUS</span>
		  		<div class="form-group">
		  			<select class="form-control" name="status">
		  				<option value="">Selecione...</option>
	  					<option value="Roteirizado">Roteirizado</option>
	  					<option value="Não Roteirizado">Não Roteirizado</option>
					</select>
		  		</div>
		  	</div>
	  		<div class="input-group mb-3">
	  			<span class="input-group-text" id="inputGroup-sizing-default">BAIRRO</span>
		  		<div class="form-group">
		  			<select class="form-control" name="idbairro">
		  				<option value="">Selecione...</option>
		  				<?php 
	  							$objetoBanco = new Database();
	  							$retornoBanco = $objetoBanco->conectar();
	  							$stringConsulta = "SELECT * FROM cad_bairro";
	  							$consulta = mysqli_query($retornoBanco, $stringConsulta);

	  					         while($row = mysqli_fetch_array($consulta)) {
	  					         	$value = $row['ID_BAIRRO'];
	  					         	$nome = $row['NOME_BAIRRO'];

	  					         	echo "<option value=".$value.">$value - $nome</option>";
	  					          } 
    					?>
					</select>
		  		</div>
		  	</div>
	  		<div class="form-group">
	  			<button type="submit" class="btn btn-outline-primary col-md-12">Registrar</button>
	  		</div>
		</form>
</body>
</html>