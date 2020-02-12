<?php
	//Download de Arquivos PHP
	require_once('database.class.php');
	include_once 'form-cad-dados.php';
	require_once ('modais.class.php');

	// Classe Referencial para Cadastro de Gerencia
	class Gerencia{

		// Atributos

		private $gerencia;

		// Função de Cadastro de Gerencia
		function cadGerencia($valor){
			$this->gerencia = $valor; // Resgatando parametro recebido pela função;

			// Instanciando objeto e retorno de link de conexão com Banco de Dados
			$objetoBanco = new Database(); 
			$retornoDd = $objetoBanco->conectar();

			// Impedindo execução de SQL Injection na consulta.
			$this->gerencia = mysqli_real_escape_string($retornoDd,$this->gerencia);

			// Consulta de Verificação de Registro
			$stringConsulta = "SELECT * FROM cad_gerencia WHERE (NOME_GERENCIA = '$this->gerencia')";
			$consulta = mysqli_query($retornoDd,$stringConsulta);
			$quantidade =  mysqli_num_rows($consulta);
			echo $quantidade;
			// Impedindo Imput de Registro Vazio ou Nulo
			if ($this->gerencia != ""){ 

				// Verificação de Quantidade Registros
				if ($quantidade > 0){
					// Instanciando Objeto e executando Modal para ser retornado caso já haja registros no Banco
					$stringModal = 'Gerente já existente!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);
				}
				else
				{
					//Instanciando Objeto e executando Modal para ser retornado caso não haja registros no Banco
					$stringModal = 'Gerente inserido com sucesso!';
					$novoModal = new Modal();
					$novoModal ->cadastroModal($stringModal);

					//Inserção de Regisro no Banco de Dados
					$insert = "INSERT INTO cad_gerencia(NOME_GERENCIA) VALUES ('$this->gerencia')"; 
					mysqli_query($retornoDd,$insert);
					
				}
			} 
		}
	}

	// Instanciação de Objeto para Execução do Cadastro de Gerencia
	$nomeGerente = $_POST['gerencia'];
	if(is_string($nomeGerente)){
		$novagerencia = new Gerencia();
		$novagerencia ->cadGerencia($nomeGerente);
	}
?>