<?php

// se estiver vazio, nao chamou do aplicativo
if ($httpMethod == ''){
	$httpMethod = $_SERVER['REQUEST_METHOD'];
}

if ($httpMethod == 'DELETE') {

	// indica se cliente existe no sistema:
	// para o valor 0, cliente existe no sistema
	// para o valor 1, cliente nao existe no sistema
	$verificaErro = 0;
	
	// para conectar ao banco de dados
	require_once('conec.php');
	
	// comando para excluir no banco de dados
	$stmt = $conn->prepare("DELETE FROM infocompras.cliente WHERE CPF=?");
	// $stmt = $conn->prepare("DELETE FROM id6843246_banco01.CLIENTE WHERE CPF=?"); //quando for implantar deixar so este
	
	$segments = explode("/", $_SERVER["REQUEST_URI"]);
	
	// campo CPF informado pelo usuario
	if ($cpf0 == '') {
		$cpf = $segments[count($segments)-1];
	}
	else {
		$cpf = $cpf0;
	}
	
	//	verifica campo informado pelo usuario: CPF
	
	// verifica se CPF esta preenchido
	if ($cpf == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo CPF nao esta preenchido";
		die();
	}
	
	// verifica se CPF e numerico
	if (is_numeric($cpf) == FALSE) {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo CPF nao e numerico";
		die();
	}
	
	// verifica se existe o cliente que sera incluido
	require_once('verific_n_existe_cli_3.php');
	
	if ($verificaErro == 1) {
		
		// fecha a conexao no banco
		$conn->close();
		
		if ($cpf0 == '') {
			echo "Cliente que sera excluido nao existe";
			die();
		}
		
	}
	else {
	
	$stmt->bind_param("i", $cpf);
	$stmt->execute();
	$stmt->close();
	
		// fecha a conexao no banco
		$conn->close();
	
		if ($cpf0 == '') {
			echo "Cliente excluido";
			die();
		}
	
	}
		
} else if ($httpMethod != 'DELETE') {
	echo "So funciona no DELETE";
		die();
}

?>