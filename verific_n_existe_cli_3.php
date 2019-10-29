<?php

	// indica se cliente existe no sistema:
	// para o valor 0, cliente existe no sistema
	// para o valor 1, cliente nao existe no sistema
	$verificaErro = 0;
	
	// comando de busca no banco
	$sql = "SELECT CPF FROM infocompras.cliente";
	// $sql = "SELECT CPF FROM id6843246_banco01.CLIENTE"; //quando for implantar deixar so este
	
	// execucao do comando de busca
	$sql = $sql ." WHERE CPF = '". $cpf ."'";
	$result = $conn->query($sql);
	
	// verifica se o numero de registros
	// encontrado e maior que zero
	if ($result && $result->num_rows <= 0) {
		
		$verificaErro = 1;
	
	}

?>