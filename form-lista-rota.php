<?php	
	include_once 'menu-principal.php';
	require_once ('database.class.php');
?>
<!DOCTYPE html>
<head>
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
      <th scope="col">LOTE</th>
      <th scope="col">GERENCIA</th>
      <th scope="col">RESPONSAVEL</th>
      <th scope="col">FREQUECIA</th>
      <th scope="col">STATUS</th>
      <th scope="col">ATUALIZAÇÃO</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
	  		$objetoBanco = new Database();
	  		$retornoBanco = $objetoBanco->conectar();
	  		$stringConsulta = "SELECT * FROM cad_rota";
	  		$consulta = mysqli_query($retornoBanco, $stringConsulta);
	  		
	  		while($row = mysqli_fetch_array($consulta)) {

	  			 
	  			
		  		$idrota = $row['ID_ROTA'];
		  		$idlote = $row['ID_LOTE'];
		  		$stringConsulta = "SELECT NOME_LOTE FROM cad_lote WHERE(ID_LOTE='$idlote')";
	  			$nomelote = mysqli_query($retornoBanco, $stringConsulta);
	  			$nomelote = mysqli_fetch_array($nomelote);
	  			$nomelote = $nomelote['NOME_LOTE'];
	  			$consultaLote = "SELECT * FROM cad_lote";
	  			$opcoeslote = mysqli_query($retornoBanco, $consultaLote);

	  			//Nome Gerencia

		  		$gerente = $row['ID_GERENCIA'];
		  		$stringConsulta = "SELECT NOME_GERENCIA FROM cad_gerencia WHERE(ID_GERENCIA='$gerente')";
	  			$nomegerencia = mysqli_query($retornoBanco, $stringConsulta);
	  			$nomegerencia = mysqli_fetch_array($nomegerencia);
	  			$nomegerencia = $nomegerencia['NOME_GERENCIA'];
	  			$consultagerencia = "SELECT * FROM cad_gerencia";
	  			$opcoesgerencia = mysqli_query($retornoBanco,$consultagerencia);
	  			

	  			//Consultas Responsável

	  			$responsavel = $row['ID_RESPONSAVEL'];
		  		$stringConsulta = "SELECT NOME_RESPONSAVEL FROM cad_responsavel WHERE(ID_RESPONSAVEL='$responsavel')";
	  			$nomeresponsavel = mysqli_query($retornoBanco, $stringConsulta);
	  			$nomeresponsavel = mysqli_fetch_array($nomeresponsavel);
	  			$nomeresponsavel = $nomeresponsavel['NOME_RESPONSAVEL'];
	  			$consultatotal = "SELECT * FROM cad_responsavel";
	  			$opcoesresponsavel = mysqli_query($retornoBanco,$consultatotal);
	  			// Consultas de Frequencia

	  			$frequencia = $row['FREQUENCIA'];
	  			$stringConsulta = "SELECT * FROM cad_frequencia";
	  			$opcoesfrequencia = mysqli_query($retornoBanco, $stringConsulta);
	  			

	  			
	  			//Status

	  			$status = $row['STATUS_CAD_ROTA'];
	  			if($status =='Válido'){
	  				$updateStatus = 'Inválido';
	  			}else{
	  				$updateStatus = 'Válido';
	  			}

				echo "<tr>
					  <form method='post' action='alterar-rota.class.php'>
						  <th>
						  <select class=form-control-sm name='idrota'>
						  <option value='$idrota'>$idrota</option>
						  </select>
						  </th>
						  ";
						  
				echo	"<td>

						
						<select class='form-control-sm' name='lote'>
						<option value=''>$nomelote</option>";
						while($reglote= mysqli_fetch_array($opcoeslote)){
				  		  		$lote = $reglote['NOME_LOTE'];
				  		  		$value = $reglote['ID_LOTE'];
				  		  		if ($lote != $nomelote){
				  		  			echo "<option value='$value'>$lote</option>";
				  		  		}
				  		}	
				"</select>
				</td>";


				echo	"<td>
						<select class='form-control-sm' name='gerencia'>
						<option value=''>$nomegerencia</option>";
						while($reg_ger = mysqli_fetch_array($opcoesgerencia)){
				  		  		$gerencia = $reg_ger['NOME_GERENCIA'];
				  		  		$value = $reg_ger['ID_GERENCIA'];
				  		  		if ($gerencia != $nomegerencia){
				  		  			echo "<option value='$value'>$gerencia</option>";
				  		  		}
				  		 }	
				echo	"</select>
						</td>";
				echo	  "<td>
							<select class='form-control-sm' name='responsavel'>
							<option value=''>$nomeresponsavel</option>";
							while($regresp = mysqli_fetch_array($opcoesresponsavel)){
				  		  		$responsavel = $regresp['NOME_RESPONSAVEL'];
				  		  		$value = $regresp['ID_RESPONSAVEL'];
				  		  		if ($responsavel != $nomeresponsavel){
				  		  			echo "<option value='$value'>$responsavel</option>";
				  		  			}
				  		  		}	
			    echo	  "</select>
			    			</td>";  
				echo	  "<td>
						  <select class='form-control-sm' name='frequencia'>
						  <option value=''>$frequencia</option>";

						  while($regfreq = mysqli_fetch_array($opcoesfrequencia)){
				  		  	$value = $regfreq['FREQUENCIA'];
				  		  	if($value != $frequencia){
				  		  	echo "<option value='$value'>$value</option>";
				  		  	}
				  		  }			  
				echo   "</select>
						</td>
						  <td>
						  <select class='form-control-sm' name='status'>
						  <option value=''>$status</option>
						  <option value=".$updateStatus.">$updateStatus</option>
						    </select>
						  </td>
						
						  <td><button type='submit' class='btn btn-outline-primary btn-sm'>Atualizar</button></td>
						  </form>
				       </tr>";
				
	  		} 
    ?>
  </tbody>
  </table>
</body>
</html>