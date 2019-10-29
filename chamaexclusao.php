<?php

	// recebe CPF do formulario
	$cpf0       = $_POST['cpf'];

	// verifica se CPF esta preenchido
	if ($cpf0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo CPF nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se CPF e numerico
	if (is_numeric($cpf0) == FALSE) {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo CPF nao é numérico');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// metodo HTTP
	$httpMethod = 'DELETE';
	
	// funcao de exclusao de cliente
	require_once('excluircliente_ws.php');
	
	// exibe mensagem de erro para cliente nao existente 
	// ou mensagem de sucesso para cliente excluido
	if ($verificaErro == 1) {
		echo "<script language='javascript' type='text/javascript'>
		alert('O CPF do cliente a ser excluido nao foi encontrado');window.location.href='excluircliente.html';
		</script>";
		die();
	} 
	else {
		echo "<script language='javascript' type='text/javascript'>
		alert('Cliente excluido com sucesso');window.location.href='index.html';
		</script>";
		die();
	}
		
?>