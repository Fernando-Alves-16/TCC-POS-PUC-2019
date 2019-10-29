<?php

// session_start(); //se der errado descomentar esta linha

// se estiver vazio, nao chamou do aplicativo
if ($httpMethod == ''){
	$httpMethod = $_SERVER['REQUEST_METHOD'];
}

if ($httpMethod == 'GET') {
	
	// conexao no banco de dados
	require_once('conec.php');
	
	$marcaErro = 0;
	
	// array de dados
	$jsonArray = array();
	
	// consulta de dados
	$sql = "SELECT CPF, NOME, ENDERECO, MUNICIPIO, ESTADO, TELEFONE, EMAIL, SENHA FROM infocompras.cliente ";
	// $sql = "SELECT CPF, NOME, ENDERECO, MUNICIPIO, ESTADO, TELEFONE, EMAIL, SENHA FROM id6843246_banco01.CLIENTE "; //quando for implantar deixar so este

	$segments = explode("/", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

	// dados recebidos pelo cliente: Email e Senha
	
	// Email recebido
	if ($email0 == '') {
		$email = $segments[count($segments)-2];
	} 
	else {
		$email = $email0;
	}
	
	// Senha recebida
	if ($senha0 == '') {
		$senha = $segments[count($segments)-1];
	}
	else {
		$senha = $senha0;
	}

	// outros comandos, se a consulta atual nao funcionar
	//	$sql = $sql ." WHERE EMAIL = '". $email ."'";
	//	$sql = $sql ." WHERE EMAIL = '". $email ."' AND SENHA = ". $senha;
	
	// consulta utilizada
	$sql = $sql ." WHERE EMAIL = '". $email ."' AND SENHA = '". $senha ."'";
	
	// verifica se os campos Email e Senha estao preenchidos
	
	// verifica se o campo Email esta preenchido
	if ($email == '') {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Email nao esta preenchido";
		die();
	}
	
	
	if ($senha == '') {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Senha nao esta preenchido";
		die();
		
	}
	
	// executa consulta no banco
	$result = $conn->query($sql);

	// se nao encontrar registro, marca um erro
	if ($result && $result->num_rows <= 0) {
		
		$marcaErro = 1;
		
		if ($email0 == '') {
			
			// fecha a conexao no banco
			$conn->close();
			
			echo "Cliente nao foi encontrado";
			die();
		}
		
	}
	else {
	
		if ($email0 == '') {
			
			// fecha a conexao no banco
			$conn->close();
			
			echo "Login realizado com sucesso";
			die();
		}
		
	}	

	$conn->close();
	
	// se o metodo usado for diferente de GET
} else if ($httpMethod != 'GET') {
	
		echo "So funciona com o GET";
		die();
} 

?>