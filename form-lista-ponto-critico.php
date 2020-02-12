<?php
	include_once 'menu-principal.php';
	require_once ('database.class.php');
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
	
	<table class="table">
  <thead>
    <tr class="table-primary">
      <th scope="col">ID</th>
      <th scope="col">ENDEREÇO</th> 
      <th scope="col">NÚMERO</th>
      <th scope="col">PONTO DE REFERENCIA</th>
      <th scope="col">LATITUDE</th>
      <th scope="col">LONGITUDE</th>
      <th scope="col">STATUS</th>
      <th scope="col">BAIRRO</th>
      <th scope="col">ATUALIZAÇÃO</th>

    </tr>
  </thead>
  <tbody>
  	<?php 
	  		$objetoBanco = new Database();
	  		$retornoBanco = $objetoBanco->conectar();
	  		$stringConsulta = "SELECT * FROM cad_ponto_critico";
	  		$consulta = mysqli_query($retornoBanco, $stringConsulta);
	  		

	  		while($row = mysqli_fetch_array($consulta)) {

	  			 
	  			// Ponto Crítico

		  		$idponto= $row['ID_PONTO'];

	  			//Nome Gerencia

		  		$endereco = $row['ENDERECO'];
	  			

	  			//Consulta Número de Referencia

	  			$referencia = $row['N_DE_REFERENCIA'];

	  			// Consulta Ponto de Referencia

	  			$pontoreferencia = $row['PONTO_DE_REFERENCIA'];
		  		
	  			// Consulta de Latitude

	  			$latitude = $row['LATITUDE'];

	  			// Consulta Longitude

	  			$longitude = $row['LONGITUDE'];

	  			// Consulta de Bairro

	  			$idbairro = $row['ID_BAIRRO'];
	  			$nomebairro = "SELECT NOME_BAIRRO FROM cad_bairro WHERE ID_BAIRRO = $idbairro";
	  			$consultabairro = mysqli_query($retornoBanco, $nomebairro);

	  			$totalbairros = "SELECT * FROM cad_bairro";
	  			$consultatotal = mysqli_query($retornoBanco, $totalbairros);

	  			// Consulta Status

	  			$status = $row['STATUS_CAD_PONTO'];
	  			if($status =='Roteirizado'){
	  				$updateStatus = 'Não Roteirizado';
	  			}else{
	  				$updateStatus = 'Roteirizado';
	  			}

	  			

				echo "<tr>
					  <form method='post' action='alterar-ponto-critico.class.php'>
						  <th>
						  <select class=form-control-sm name='idponto'>
						  <option value='$idponto'>$idponto</option>
						  </select>
						  </th>
						  ";
						  
				echo	"<td>
						<textarea value='' id='endereco' name='endereco' class='form-control-sm' placeholder='$endereco' autocomplete='off'></textarea>
						</td>";

				echo	"<td>
						<input type='number' min='1' value='' id='referencia' name='referencia'  placeholder='$referencia' class='form-control-sm' autocomplete='off'></input>
						</td>";

				echo	"<td>
						<textarea value='' id='pontoreferencia' name='pontoreferencia'  placeholder='$pontoreferencia' class='form-control-sm' autocomplete='off'></textarea>
						</td>";

				echo	"<td>
						<input value='' id='latitude' name='latitude'  placeholder='$latitude' class='form-control-sm' onkeypress=$(this).mask('00.00000000')></input>
						</td>";

				echo	"<td>
						<input value='' id='longitude' name='longitude'  placeholder='$longitude' class='form-control-sm' onkeypress=$(this).mask('00.00000000')></input>
						</td>";

				echo	"<td>
						<select id='bairro' name='bairro' class='form-control-sm'>";
					   		while($bairro = mysqli_fetch_array($consultabairro)){
					   			 $nomebairro = $bairro['NOME_BAIRRO'];
					   			 $idbairro = $idbairro;
								 echo "<option value=''>$nomebairro</option>";
							}

							while($total = mysqli_fetch_array($consultatotal)){

					   			 $nomesbairros = $total['NOME_BAIRRO'];
					   			 $idsbairros = $total['ID_BAIRRO'];
					   			 if($nomesbairros != $nomebairro){
								 echo "<option value='$idsbairros'>$nomesbairros</option>";
								}
							}
				echo	"</select>
						</td>";

				echo	"<td>
						<select id='status' name='status' class='form-control-sm'>
					   		<option value=''>$status</option>		
					   		<option value='$updateStatus'>$updateStatus</option>
						</select>
						</td>";


				
	  			
				echo   "<td><button type='submit' class='btn btn-outline-primary btn-sm'>Atualizar</button></td>
						  </form>
				       </tr>";
				
	  		} 
    ?>
  </tbody>
  </table>
  
</body>
</html>