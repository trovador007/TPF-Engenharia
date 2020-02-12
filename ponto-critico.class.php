<?php
	include_once 'form-cad-ponto-critico.php';
	require_once ('database.class.php');
	require_once ('modais.class.php');

	class PontoCritico{

		function cadPontoCritico($idponto,$endereco,$nreferencia,$pontoreferencia,$latitude,$longitude,$statuscadponto,$idbairro){
			
			/*echo $idponto." ".$endereco." ".$nreferencia." ".$pontoreferencia ." ".$latitude." ".$longitude." ".$statuscadponto." ".$idbairro;*/
			
			$id_ponto = "VOL - ".$idponto;
			// Instanciando objeto e retorno de link de conexão com Banco de Dados
			$objetoBanco = new Database(); 
			$retornoDd = $objetoBanco->conectar();

			//Tratamento de Strings dos Imputs
			$endereco = mysqli_real_escape_string($retornoDd,$endereco);
			$pontoreferencia = mysqli_real_escape_string($retornoDd,$endereco);
			//Consulta se o Ponto Critoco já Existe
			$stringConsulta = "SELECT * FROM cad_ponto_critico WHERE (ID_PONTO = '$id_ponto')";
			$consulta = mysqli_query($retornoDd,$stringConsulta);
			$quantidade =  mysqli_num_rows($consulta);

			if($quantidade > 0){
					$stringModal = 'Ponto Critico já existente!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);

			}else{
					$stringModal = 'Ponto Critico inserido com sucesso!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);
					//Inserção de Regisro no Banco de Dados
					$id_ponto = "VOL - ".$idponto;
					$insert = "INSERT INTO cad_ponto_critico(ID_PONTO, ENDERECO, N_DE_REFERENCIA, PONTO_DE_REFERENCIA, LATITUDE, LONGITUDE, STATUS_CAD_PONTO, ID_BAIRRO) VALUES ('$id_ponto','$endereco','$nreferencia','$pontoreferencia','$latitude','$longitude','$statuscadponto','$idbairro')"; 
					mysqli_query($retornoDd,$insert);
			}
		}
	}

	$endereco = $_POST['endereco'];
	$idponto = $_POST['idponto'];
	$pontoreferencia = $_POST['p-referencia'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$statuscadponto = $_POST['status'];
	$idbairro = $_POST['idbairro'];
	$nreferencia = $_POST['nreferencia'];

	if($endereco !="" AND $idponto !="" AND $pontoreferencia !="" AND $latitude !="" AND $longitude !="" AND $statuscadponto !="" AND $idbairro !="" AND $nreferencia !=""){
		$novoPontoCritico = new PontoCritico();
		$novoPontoCritico->cadPontoCritico($idponto,$endereco,$nreferencia,$pontoreferencia,$latitude,$longitude,$statuscadponto,$idbairro);
	} else{
		$stringModal = 'Por favor, preencha os campos corretamente!';
		$novoModal = new Modal();
		$novoModal ->cadastroModal($stringModal);
	}
?>