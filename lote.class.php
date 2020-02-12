<?php
	//Download de Arquivos PHP
	require_once('database.class.php');
	include_once 'form-cad-dados.php';
	require_once ('modais.class.php');

	// Classe Referencial para Cadastro de Gerencia
	class Lote{

		// Atributos

		private $lote;
		private $empresa;

		// Função de Cadastro de Gerencia
		function cadLote($valor,$valor2){
			$this->lote = $valor; // Resgatando parametro recebido pela função;
			$this->empresa = $valor2;

			// Instanciando objeto e retorno de link de conexão com Banco de Dados
			$objetoBanco = new Database(); 
			$retornoDd = $objetoBanco->conectar();

			// Impedindo execução de SQL Injection na consulta.
			$this->lote = mysqli_real_escape_string($retornoDd,$this->lote);
			$this->empresa = mysqli_real_escape_string($retornoDd,$this->empresa);
			// Consulta de Verificação de Registro
			$stringConsulta = "SELECT * FROM cad_lote WHERE (NOME_LOTE = '$this->lote')";
			$consulta = mysqli_query($retornoDd,$stringConsulta);
			$quantidade =  mysqli_num_rows($consulta);

			// Impedindo Imput de Registro Vazio ou Nulo
			if ($this->lote != "" AND $this->empresa != ""){ 

				// Verificação de Quantidade Registros
				if ($quantidade > 0){
					// Instanciando Objeto e executando Modal para ser retornado caso já haja registros no Banco
					$stringModal = 'Lote já existente!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);
				}
				else
				{
					//Instanciando Objeto e executando Modal para ser retornado caso não haja registros no Banco
					$stringModal = 'Lote inserido com sucesso!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);

					//Inserção de Regisro no Banco de Dados
					$insert = "INSERT INTO cad_lote(NOME_LOTE , EMPRESA_RESPONSAVEL ) VALUES ('$this->lote', '$this->empresa')"; 
					mysqli_query($retornoDd,$insert);
					
				}
			} 
		}

	}

	// Instanciação de Objeto para Execução do Cadastro de Lote
	$numLote = $_POST['lote'];
	if($numLote != ""){
	$nomeLote = 'Lote '.$numLote.'';
	$empresaResponsavel = $_POST['empresa-responsavel'];
	if(is_string($nomeLote)){
		if(is_string($empresaResponsavel)){
			$novolote = new lote();
			$novolote ->cadLote($nomeLote,$empresaResponsavel);
		}
	}
} 
?>