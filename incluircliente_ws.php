<?php

// verifica metodo informado: se estiver
// vazio, chamou de outra aplicação
if ($httpMethod == '') {
	
	// para receber o metodo:
	// pode ser POST, PUT, DELETE, GET
	$httpMethod = $_SERVER['REQUEST_METHOD'];
	
}

// verifica se metodo chamado é POST
if ($httpMethod == 'POST') {
	
	// indica se cliente foi encontrado:
	// para o valor 0, nao foi encontrado
	// para o valor 1, foi encontrado
	$verificaErro = 0;
	
	// para conectar ao banco de dados
	require_once('conec.php');

	// comando para incluir no banco de dados
	$stmt = $conn->prepare(
		"INSERT INTO infocompras.cliente (CPF, NOME, ENDERECO, MUNICIPIO, ESTADO, TELEFONE, EMAIL, SENHA)
		VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		// "INSERT INTO id6843246_banco01.CLIENTE (CPF, NOME, ENDERECO, MUNICIPIO, ESTADO, TELEFONE, EMAIL, SENHA)
		// VALUES (?, ?, ?, ?, ?, ?, ?, ?)"); //quando for implantar deixar so este
		
	// verifica URL informada
	$segments = explode("/", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

	// recebe campos informados pelo usuario:
	// cpf, nome, endereco, municipio, estado,
	// telefone, email, senha 
	// sera da URL ou da aplicacao
	
	// campo CPF informado pelo usuario
	if ($cpf0 == '') {
		$cpf       = $segments[count($segments)-8];
	}
	else {
		$cpf       = $cpf0;
	}
	
	// campo Nome informado pelo usuario
	if ($nome0 == '') {
		$nome       = $segments[count($segments)-7];
	}
	else {
		$nome       = $nome0;
	}
	
    // campo Endereco informado pelo usuario
	if ($endereco0 == '') {
		$endereco       = $segments[count($segments)-6];
	}
	else {
		$endereco       = $endereco0;
	}
	
    //	campo Municipio informado pelo usuario
	if ($municipio0 == '') {
		$municipio       = $segments[count($segments)-5];
	}
	else {
		$municipio       = $municipio0;
	}
	
    // campo Estado informado pelo usuario
	if ($estado0 == '') {
		$estado       = $segments[count($segments)-4];
	}
	else {
		$estado       = $estado0;
	}
	
    //	campo Telefone informado pelo usuario
	if ($telefone0 == '') {
		$telefone       = $segments[count($segments)-3];
	}
	else {
		$telefone       = $telefone0;
	}
	
    //	campo Email informado pelo usuario
	if ($email0 == '') {
		$email       = $segments[count($segments)-2];
	}
	else {
		$email       = $email0;
	}
	
    // campo Senha informado pelo usuario
	if ($senha0 == '') {
		$senha       = $segments[count($segments)-1];
	}
	else {
		$senha       = $senha0;
	}
	
    //	verifica campos informados pelo usuario: CPF, Nome, Endereco, Municipio, Estado, Telefone, Email, Senha
	
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
	
	// verifica se Nome esta preenchido
	if ($nome == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Nome nao esta preenchido";
		die();
	}
	
	// verifica se Endereco esta preenchido
	if ($endereco == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Endereco nao esta preenchido";
		die();
	}
	
	// verifica se Municipio esta preenchido
	if ($municipio == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Municipio nao esta preenchido";
		die();
	}
	
	// verifica se Estado esta preenchido
	if ($estado == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Estado nao esta preenchido";
		die();
	}
	
	// verifica se Telefone esta preenchido
	if ($telefone == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Telefone nao esta preenchido";
		die();
	}
	
	// verifica se Telefone e numerico
	if  (is_numeric($telefone) == FALSE) {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Telefone nao e numerico";
		die();
	}
	
	// verifica se Email esta preenchido
	if ($email == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Email nao esta preenchido";
		die();
	}
	
	// verifica se Senha esta preenchido
	if ($senha == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo Senha nao esta preenchido";
		die();
	}
	
	// verifica se existe o cliente que sera incluido
	require_once('verific_existe_cli_2.php');
	
	if ($verificaErro == 1) {
		
		// fecha a conexao no banco
		$conn->close();
		
		if ($cpf0 == '') {
			echo "Cliente que sera incluido ja existe";
			die();
		}
		
	}
	else {

		// executa comando no banco
		$stmt->bind_param("issssiss", $cpf, $nome, $endereco, $municipio, $estado, $telefone, $email, $senha);
		$stmt->execute();
		$stmt->close();
	
		// fecha a conexao no banco
		$conn->close();
	
		if ($cpf0 == '') {
			echo "Cliente incluido";
			die();
		}
	
	}
	
}
 
// mensagem caso nao seja chamado o metodo POST
else if ($httpMethod != 'POST') {
	
	echo "So funciona no POST";
	die();
} 

?>