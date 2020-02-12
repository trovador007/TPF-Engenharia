<?php
	require_once('form-lista-rota.php');
	require_once('database.class.php');
	require_once('modais.class.php');

	class UpdateRota{
		  function atualizarRota($id_rota,$lote,$gerencia,$responsavel,$frequencia,$status){
		  	$objetoBanco = new Database();
		  	$retornoBanco = $objetoBanco->conectar();

		  	if($lote !=""){
		  		$updateLote = "UPDATE cad_rota SET ID_LOTE='$lote' WHERE ID_ROTA='$id_rota'";
		  		$query = mysqli_query($retornoBanco,$updateLote);
		  	}

		  	if($gerencia !=""){
		  		$updateGerencia = "UPDATE cad_rota SET ID_GERENCIA='$gerencia' WHERE ID_ROTA='$id_rota'";
		  		$query = mysqli_query($retornoBanco,$updateGerencia);
		  	}

		  	if($responsavel !=""){
		  		$updateResponsavel = "UPDATE cad_rota SET ID_RESPONSAVEL='$responsavel' WHERE ID_ROTA='$id_rota'";
		  		$query = mysqli_query($retornoBanco,$updateResponsavel);
		  	}

		  	if($status !=""){
		  		$updateStatus = "UPDATE cad_rota SET STATUS_CAD_ROTA='$status' WHERE ID_ROTA='$id_rota'";
		  		$query = mysqli_query($retornoBanco,$updateStatus);
		  	}

		  	if($frequencia !=""){
		  		$updateFrequencia = "UPDATE cad_rota SET FREQUENCIA='$frequencia' WHERE ID_ROTA='$id_rota'";
		  		$query = mysqli_query($retornoBanco,$updateFrequencia);
		  	}

		  	$ordenar = "SELECT * FROM cad_rota  ORDER BY ID_ROTA DESC";
		  	$query = mysqli_query($retornoBanco,$ordenar);

		  	$stringModal = 'Dados atualizados!';
			$novoModal = new Modal();
			$novoModal ->atualizarModal($stringModal);

		  }
	}

	$id_rota = $_POST['idrota'];
	$lote = $_POST['lote'];
	$gerencia = $_POST['gerencia'];
	$responsavel = $_POST['responsavel'];
	$status = $_POST['status'];
	$frequencia = $_POST['frequencia'];


	if($lote !='' OR $gerencia !='' OR $responsavel !='' OR $frequencia !='' OR $status !=''){
		$updateRota = new UpdateRota();
		$updateRota->atualizarRota($id_rota,$lote,$gerencia,$responsavel,$frequencia,$status);
	} else{
		$stringModal = 'Não houve alterações!';
		$novoModal = new Modal();
		$novoModal ->atualizarModal($stringModal);
		
	}

?>