<?php
	//Download de Arquivos PHP
	require_once('database.class.php');
	include_once 'form-cad-dados.php';
	require_once ('modais.class.php');

	// Classe Referencial para Cadastro de Gerencia
	class Responsavel{

		// Atributos

		private $responsavel;

		// Função de Cadastro de Gerencia
		function cadResponsavel($valor){
			$this->responsavel = $valor; // Resgatando parametro recebido pela função;

			// Instanciando objeto e retorno de link de conexão com Banco de Dados
			$objetoBanco = new Database(); 
			$retornoDd = $objetoBanco->conectar();

			// Impedindo execução de SQL Injection na consulta.
			$this->responsavel = mysqli_real_escape_string($retornoDd,$this->responsavel);

			// Consulta de Verificação de Registro
			$stringConsulta = "SELECT * FROM cad_responsavel WHERE (NOME_RESPONSAVEL = '$this->responsavel')";
			$consulta = mysqli_query($retornoDd,$stringConsulta);
			$quantidade =  mysqli_num_rows($consulta);

			// Impedindo Imput de Registro Vazio ou Nulo
			if ($this->responsavel != ""){ 

				// Verificação de Quantidade Registros
				if ($quantidade > 0){
					// Instanciando Objeto e executando Modal para ser retornado caso já haja registros no Banco
					$stringModal = 'Responsável já existente!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);
				}
				else
				{
					//Instanciando Objeto e executando Modal para ser retornado caso não haja registros no Banco
					$stringModal = 'Responsável inserido som sucesso!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);

					//Inserção de Regisro no Banco de Dados
					$insert = "INSERT INTO cad_responsavel(NOME_RESPONSAVEL) VALUES ('$this->responsavel')"; 
					mysqli_query($retornoDd,$insert);
					
				}
			} 
		}

	}

	// Instanciação de Objeto para Execução do Cadastro de Gerencia
	$nomeResponsavel = $_POST['responsavel'];
	if(is_string($nomeResponsavel)){
		$novaresponsavel = new Responsavel();
		$novaresponsavel ->cadResponsavel($nomeResponsavel);
	}
?>