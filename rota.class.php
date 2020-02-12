<?php
	include_once 'form-cad-rota.php';
	require_once ('database.class.php');
	require_once ('modais.class.php');

	class Rota{

		function cadRota($turno,$status,$idlote,$idgerencia,$idresponsavel,$frequencia){
			
			
			
			//@tutorial: Instanciando objeto e retorno de link de conexão com Banco de Dados
			$objetoBanco = new Database(); 
			$retornoDd = $objetoBanco->conectar();

			//@tutorial: Tratamento de Strings dos Imputs
			$turno = mysqli_real_escape_string($retornoDd,$turno);
			$status = mysqli_real_escape_string($retornoDd,$status);
			$frequencia = mysqli_real_escape_string($retornoDd,$frequencia);
			

			
					$stringModal = 'Rota cadastrada com sucesso!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);

	
					//Inserção de Regisro no Banco de Dados
					
					$insert = "INSERT INTO cad_rota(TURNO, STATUS_CAD_ROTA, ID_LOTE, ID_GERENCIA, ID_RESPONSAVEL, FREQUENCIA) VALUES ('$turno','$status','$idlote','$idgerencia','$idresponsavel','$frequencia')"; 
					mysqli_query($retornoDd,$insert);
		
		}
	}

	$turno = $_POST['turno'];
	$status= $_POST['status'];
	$idlote = $_POST['lote'];
	$idgerencia = $_POST['gerencia'];
	$idresponsavel = $_POST['responsavel'];
	$frequencia = $_POST['frequencia'];

	if($turno !="" AND $status !="" AND $idlote !="" AND $idgerencia !="" AND $idresponsavel !="" AND $frequencia!=""){
		$novaRota = new Rota();
		$novaRota->cadRota($turno,$status,$idlote,$idgerencia,$idresponsavel,$frequencia);
	} else{
		$stringModal = 'Por favor, preencha os campos corretamente!';
		$novoModal = new Modal();
		$novoModal ->cadastroModal($stringModal);
	}
?>