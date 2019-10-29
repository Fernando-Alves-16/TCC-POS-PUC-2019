<?php

	// sessao inicial
	   session_start(); //se der errado retirar esta linha
	
	// campo email recebido pelo cliente
	$email0       = $_POST['email'];

	// campo senha recebido pelo cliente
	$senha0       = $_POST['senha'];
	
	if ($email0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Email nao preenchido');window.location.href='index.html';
		</script>";
		die();
	}
	if ($senha0 == "") {
		echo "<script language='javascript' type='text/javascript'>
		alert('Campo Senha nao preenchido');window.location.href='index.html';
		</script>";
		die();
	}
	
	// metodo HTTP
	$httpMethod = 'GET';
	
	// funcao de login do teste
	require_once('loginteste_ws.php');
	
	
	if ($marcaErro == 1) {
		echo "<script language='javascript' type='text/javascript'>
		alert('Nenhum registro encontrado');window.location.href='index.html';
		</script>";
		die();
	} else {
		$_SESSION['email'] = $email0;
		$_SESSION['senha'] = $senha0;
		header("Location:menusistema.html");
	}
	
?>