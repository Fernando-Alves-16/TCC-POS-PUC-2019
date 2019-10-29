<?php

	// recebe primeiro CPF do formulario
	$cpf_antigo = $_POST['cpf_existe'];
	
	//	recebe CPF do formulario
	$cpf0       = $_POST['cpf'];
	
    //	recebe Nome do formulario
	$nome0      = $_POST['nome'];

    //	recebe Endereco do formulario
	$endereco0  = $_POST['endereco'];

    //	recebe Municipio do formulario
	$municipio0 = $_POST['municipio'];

    //	recebe Estado do formulario
	$estado0    = $_POST['estado'];

    //	recebe Telefone do formulario
	$telefone0  = $_POST['telefone'];

    //	recebe Email do formulario
	$email0     = $_POST['email'];

    //	recebe Senha do formulario
	$senha0     = $_POST['senha'];
	
	// verifica se CPF antigo esta preenchido
	if ($cpf_antigo == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo CPF do cliente a ser alterado nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se CPF antigo e numerico
	if (is_numeric($cpf_antigo) == FALSE) {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo CPF do cliente a ser alterado nao é numérico');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
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
	
	// verifica se Nome esta preenchido
	if ($nome0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Nome nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se Endereco esta preenchido
	if ($endereco0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Endereco nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se Municipio esta preenchido
	if ($municipio0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Municipio nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se Estado esta preenchido
	if ($estado0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Estado nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se Telefone esta preenchido
	if ($telefone0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Telefone nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se Telefone e numerico
	if  (is_numeric($telefone0) == FALSE) {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Telefone nao é numérico');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se Email esta preenchido
	if ($email0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Email nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// verifica se Senha esta preenchido
	if ($senha0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Senha nao preenchido');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
	// metodo HTTP
	$httpMethod = 'PUT';
	
    // executa funcao de alteracao de cliente
	// require_once('alterarcliente.php');
	require_once('alterarcliente_ws.php');
	
	// exibe mensagem de erro para cliente nao existente 
	// ou mensagem de sucesso para cliente alterado
	if ($verificaErro == 1) {
		echo "<script language='javascript' type='text/javascript'>
		alert('O CPF do cliente a ser alterado nao foi encontrado');window.location.href='alterarcliente.html';
		</script>";
		die();
	} 
	else {
		echo "<script language='javascript' type='text/javascript'>
		alert('Cliente alterado com sucesso');window.location.href='alterarcliente.html';
		</script>";
		die();
	}
	
?>