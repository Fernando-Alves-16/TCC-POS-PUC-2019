<?php

	
	// header("Content-Type: application/json; charset=UTF-8");
	
	// codigo de seguranca
	//	if ( (!isset ($_SESSION['email']) == true) and (!isset ($SESSION['senha']) == true) )
	//	{	
	//		unset($_SESSION['email']);
	//		unset($_SESSION['senha']);
	//		header('location:exemplo.html');
	//	}

// se estiver vazio, nao chamou do aplicativo
if ($httpMethod == '') {
	$httpMethod = $_SERVER['REQUEST_METHOD'];
}

if ($httpMethod == 'GET') {
	
	// para conectar ao banco de dados
	require_once('conec.php');
	
	// array onde serao exibidos os dados
	$jsonArray = array();
	
	// comando de consulta ao banco de dados
	$sql = "SELECT CPF, NOME, ENDERECO, MUNICIPIO, ESTADO, TELEFONE, EMAIL, SENHA FROM infocompras.cliente ";
	// $sql = "SELECT CPF, NOME, ENDERECO, MUNICIPIO, ESTADO, TELEFONE, EMAIL, SENHA FROM id6843246_banco01.CLIENTE "; //quando for implantar deixar so este
	
	$segments = explode("/", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

	// campo Email informado pelo usuario
	if ($email0 == '') {
		$email     = $segments[count($segments)-1];
	}
	else {
		$email     = $email0;
	}

	$sql = $sql ." WHERE EMAIL = '". $email . "'";

	// executa a consulta
	$result = $conn->query($sql);
	
	// se forem encontrados resultados, exibe os dados
	if ($result && $result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$jsonLinha0 = array(
				"CPF"       => $row["CPF"]);
			$jsonLinha1 = array(
				"NOME"      => $row["NOME"]);
			$jsonLinha2 = array(	
				"ENDERECO"  => $row["ENDERECO"]);
			$jsonLinha3 = array(
				"MUNICIPIO" => $row["MUNICIPIO"]);
			$jsonLinha4 = array(
				"ESTADO"    => $row["ESTADO"]);
			$jsonLinha5 = array(
				"TELEFONE"  => $row["TELEFONE"]);
			$jsonLinha6 = array(
				"EMAIL"     => $row["EMAIL"]);
			$jsonLinha7 = array(
				"SENHA"     => $row["SENHA"]);
			$jsonArray0[] = $jsonLinha0;
			$jsonArray1[] = $jsonLinha1;
			$jsonArray2[] = $jsonLinha2;
			$jsonArray3[] = $jsonLinha3;
			$jsonArray4[] = $jsonLinha4;
			$jsonArray5[] = $jsonLinha5;
			$jsonArray6[] = $jsonLinha6;
			$jsonArray7[] = $jsonLinha7;

		}
	}

	// exibe os dados encontrados
	echo json_encode($jsonArray0);
	echo json_encode($jsonArray1);
	echo json_encode($jsonArray2);
	echo json_encode($jsonArray3);
	echo json_encode($jsonArray4);
	echo json_encode($jsonArray5);
	echo json_encode($jsonArray6);
	echo json_encode($jsonArray7);
	
	
	// fecha conexao
	$conn->close();
	
	// se nao for chamado pelo GET
} else if ($httpMethod != 'GET') {
	echo "So funciona no GET.";
}

?>
