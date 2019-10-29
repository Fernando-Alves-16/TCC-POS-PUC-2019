<?php

	// inicia sessao
	session_start();
	
	//  codigo de seguranca
	//	if ( (!isset ($_SESSION['email']) == true) and (!isset ($SESSION['senha']) == true) )
	//	{	
	//		unset($_SESSION['email']);
	//		unset($_SESSION['senha']);
	//		header('location:exemplo.html');
	//	}
	
	//campo email de sessao - login da tela inicial
	$email0       = $_SESSION['email'];
	
	// metodo HTTP usado
	$httpMethod = 'GET';
	
	// funcao de consulta de cliente
	require_once('consultar_cliente2_ws.php');
	
?>