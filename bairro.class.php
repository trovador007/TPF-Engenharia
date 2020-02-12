<?php
	//Download de Arquivos PHP
	require_once('database.class.php');
	include_once 'form-cad-dados.php';
	require_once ('modais.class.php');

	// Classe Referencial para Cadastro de Gerencia
	class Bairro{

		// Atributos

		private $bairro;

		// Função de Cadastro de Gerencia
		function cadBairro($valor){
			$this->bairro = $valor; // Resgatando parametro recebido pela função;

			// Instanciando objeto e retorno de link de conexão com Banco de Dados
			$objetoBanco = new Database(); 
			$retornoDd = $objetoBanco->conectar();

			// Impedindo execução de SQL Injection na consulta.
			$this->bairro = mysqli_real_escape_string($retornoDd,$this->bairro);

			// Consulta de Verificação de Registro
			$stringConsulta = "SELECT * FROM cad_bairro WHERE (NOME_BAIRRO = '$this->bairro')";
			$consulta = mysqli_query($retornoDd,$stringConsulta);
			$quantidade =  mysqli_num_rows($consulta);

			// Impedindo Imput de Registro Vazio ou Nulo
			if ($this->bairro != ""){ 

				// Verificação de Quantidade Registros
				if ($quantidade > 0){
					// Instanciando Objeto e executando Modal para ser retornado caso já haja registros no Banco
					$stringModal = 'Bairro já existente!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);
				}
				else
				{
					//Instanciando Objeto e executando Modal para ser retornado caso não haja registros no Banco
					$stringModal = 'Bairro inserido com sucesso!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);

					//Inserção de Regisro no Banco de Dados
					$insert = "INSERT INTO cad_bairro(NOME_BAIRRO) VALUES ('$this->bairro')"; 
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
	$nomeBairro = $_POST['bairro'];
	if(is_string($nomeBairro)){
		$novabairro = new Bairro();
		$novabairro ->cadBairro($nomeBairro);
	}
?>