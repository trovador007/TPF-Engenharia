<?php
	require_once('form-lista-ponto-critico.php');
	require_once('database.class.php');
	require_once('modais.class.php');

	class UpdatePonto{
		  function atualizarPonto($id_ponto,$endereco,$n_referencia,$p_referencia,$latitude,$longitude,$status,$bairro){
		  	$objetoBanco = new Database();
		  	$retornoBanco = $objetoBanco->conectar();

		  	if($endereco !=""){
		  		$updateEndereco = "UPDATE cad_ponto_critico SET ENDERECO='$endereco' WHERE ID_PONTO='$id_ponto'";
		  		$query = mysqli_query($retornoBanco,$updateEndereco);
		  	}

		  	if($n_referencia !=""){
				$updateReferencia = "UPDATE cad_ponto_critico SET N_DE_REFERENCIA='$n_referencia' WHERE ID_PONTO='$id_ponto'";
		  		$query = mysqli_query($retornoBanco,$updateReferencia);
		  	}

		  	if($p_referencia !=""){
		  		$updatePontoReferencia = "UPDATE cad_ponto_critico SET PONTO_DE_REFERENCIA='$p_referencia' WHERE ID_PONTO='$id_ponto'";
		  		$query = mysqli_query($retornoBanco,$updatePontoReferencia);
		  	}

		  	if($latitude !=""){
		  		$updateLatitude = "UPDATE cad_ponto_critico SET LATITUDE='$latitude' WHERE ID_PONTO='$id_ponto'";
		  		$query = mysqli_query($retornoBanco,$updateLatitude);
		  	}

		  	if($longitude !=""){
		  		$updateLongitude = "UPDATE cad_ponto_critico SET LONGITUDE='$longitude' WHERE ID_PONTO='$id_ponto'";
		  		$query = mysqli_query($retornoBanco,$updateLongitude);
		  	}


		  	if($status !=""){
		  		$updateStatus = "UPDATE cad_ponto_critico SET STATUS_CAD_PONTO='$status' WHERE ID_PONTO='$id_ponto'";
		  		$query = mysqli_query($retornoBanco,$updateStatus);
		  	}

		  	if($bairro!=""){
		  		$updateBairro = "UPDATE cad_ponto_critico SET ID_BAIRRO='$bairro' WHERE ID_PONTO='$id_ponto'";
		  		$query = mysqli_query($retornoBanco,$updateBairro);
		  	}

		  	$ordenar = "SELECT * FROM cad_ponto_critico  ORDER BY ID_PONTO DESC";
		  	$query = mysqli_query($retornoBanco,$ordenar);

		  	$stringModal = 'Dados atualizados!';
			$novoModal = new Modal();
			$novoModal ->atualizarPontoCritico($stringModal);

		  }
	}

	$id_ponto = $_POST['idponto'];
	$endereco = $_POST['endereco'];
	$n_referencia = $_POST['referencia'];
	$p_referencia = $_POST['pontoreferencia'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$status = $_POST['status'];
	$bairro = $_POST['bairro'];


	if($endereco !='' OR $n_referencia !='' OR $p_referencia !='' OR $latitude !='' OR $longitude !='' OR $status !='' OR $bairro !=''){
		$updateRota = new UpdatePonto();
		$updateRota->atualizarPonto($id_ponto,$endereco,$n_referencia,$p_referencia, $latitude,$longitude,$status,$bairro);
	} else{
		$stringModal = 'Não houve alterações!';
		$novoModal = new Modal();
		$novoModal ->atualizarPontoCritico($stringModal);
		
	}
?>