<?php
	class Database {

		//dados do banco de dados

		private $host = 'localhost';
		private $usuario = 'root';
		private $senha = '';
		private $bancodados = 'volumoso.db';

		//Função de Conexão

		public function conectar(){
			
		$conexao = mysqli_connect($this->host,$this->usuario,$this->senha,$this->bancodados); 
		
		
		mysqli_set_charset($conexao, 'utf8');

		// Verificação de Erros de Conexão no Banco de Dados
		if(mysqli_connect_errno()){
				echo 'Erro de Conexão com o Banco de Dados: ' .mysqli_connect_error();
			}

		return $conexao;
		}

	}


?>