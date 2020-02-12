<?php
	//Download de Arquivos PHP
	require_once('database.class.php');
	include_once 'form-cad-dados.php';
	require_once ('modais.class.php');

	// Classe Referencial para Cadastro de Gerencia
	class Frequencia{

		// Atributos

		private $frequencia;

		// Função de Cadastro de Gerencia
		function cadFrequencia($valor){
			$this->frequencia = $valor; // Resgatando parametro recebido pela função;

			// Instanciando objeto e retorno de link de conexão com Banco de Dados
			$objetoBanco = new Database(); 
			$retornoDd = $objetoBanco->conectar();

			// Impedindo execução de SQL Injection na consulta.
			$this->frequencia = mysqli_real_escape_string($retornoDd,$this->frequencia);

			// Consulta de Verificação de Registro
			$stringConsulta = "SELECT * FROM cad_frequencia WHERE (FREQUENCIA = '$this->frequencia')";
			$consulta = mysqli_query($retornoDd,$stringConsulta);
			$quantidade =  mysqli_num_rows($consulta);

			// Impedindo Imput de Registro Vazio ou Nulo
			if ($this->frequencia != ""){ 

				// Verificação de Quantidade Registros
				if ($quantidade > 0){
					// Instanciando Objeto e executando Modal para ser retornado caso já haja registros no Banco
					$stringModal = 'Frequencia já existente!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);
				}
				else
				{
					//Instanciando Objeto e executando Modal para ser retornado caso não haja registros no Banco
					$stringModal = 'Frequencia inserida com sucesso!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);

					//Inserção de Regisro no Banco de Dados
					$insert = "INSERT INTO cad_frequencia(FREQUENCIA) VALUES ('$this->frequencia')"; 
					mysqli_query($retornoDd,$insert);
					
				}
			} else
			{
				//Instanciando Objeto e executando Modal para ser retornado caso haja inserção de valor nulo parametro $valor da função cadGerencia()
				
				$stringModal = 'Por favor, preencha os campos corretamente!';
				$novoModal = new Modal();
				$novoModal ->cadastroModal($stringModal);	
			}
		}

	}

	// Instanciação de Objeto para Execução do Cadastro de Gerencia
	$nomeFrequencia = $_POST['frequencia'];
	if($nomeFrequencia != ""){
		$stringFrequencia = implode("-", $nomeFrequencia);
		if(is_string($stringFrequencia)){
		$novafrequencia = new Frequencia();
		$novafrequencia ->cadFrequencia($stringFrequencia);
		}
	}else{
		$stringModal = 'Por favor, preencha os campos corretamente!';
		$novoModal = new Modal();
		$novoModal ->cadastroModal($stringModal);
	}
	
?>