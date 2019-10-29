<?php

// verifica metodo informado: se estiver
// vazio, chamou de outra aplicação
if ($httpMethod == '') {
	
	// para receber o metodo:
	// pode ser POST, PUT, DELETE, GET
	$httpMethod = $_SERVER['REQUEST_METHOD'];
	
}

// verifica se metodo chamado é PUT
if ($httpMethod == 'PUT') {
	
	// indica se cliente existe no sistema:
	// para o valor 0, cliente existe no sistema
	// para o valor 1, cliente nao existe no sistema
	$verificaErro = 0;
	
	// para conectar ao banco de dados
	require_once('conec.php');

	// comando para alterar no banco de dados
	$stmt = $conn->prepare(
		"UPDATE infocompras.cliente SET CPF=?, NOME=?, ENDERECO=?, MUNICIPIO=?, ESTADO=?, TELEFONE=?, EMAIL=?, SENHA=?
		WHERE CPF=?");
		// "UPDATE id6843246_banco01.CLIENTE SET CPF=?, NOME=?, ENDERECO=?, MUNICIPIO=?, ESTADO=?, TELEFONE=?, EMAIL=?, SENHA=?
		// WHERE CPF=?"); //quando for implantar deixar so este
		
	// verifica URL informada
	$segments = explode("/", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

	// recebe campos informados pelo usuario:
	// cpf antigo, cpf, nome, endereco, municipio,
	// estado, telefone, email, senha 
	// sera da URL ou da aplicacao
	
	// campo CPF ja existente informado pelo usuario
	if ($cpf_antigo == '') {
		$cpf_alterar       = $segments[count($segments)-9];
	}
	else {
		$cpf_alterar       = $cpf_antigo;
	}
	
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
	
    //	verifica campos informados pelo usuario: CPF cliente a alterar, CPF, Nome, Endereco, Municipio, Estado, Telefone, Email, Senha
	
	// verifica se CPF antigo esta preenchido
	if ($cpf_alterar == "") {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo CPF nao esta preenchido";
		die();
	}
	
	// verifica se CPF antigo e numerico
	if (is_numeric($cpf_alterar) == FALSE) {
		
		// fecha a conexao no banco
		$conn->close();
		
		echo "Campo CPF nao e numerico";
		die();
	}
	
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
			echo "Cliente que sera alterado nao existe";
			die();
		}
		
	}
	else {

		// executa comando no banco
		$stmt->bind_param("issssissi", $cpf, $nome, $endereco, $municipio, $estado, $telefone, $email, $senha, $cpf_alterar);
		$stmt->execute();
		$stmt->close();
		
		// fecha a conexao no banco
		$conn->close();
	
		if ($cpf0 == '') {
			echo "Cliente alterado";
			die();
		}
	
	}
	
}
 
// mensagem caso nao seja chamado o metodo PUT
else if ($httpMethod != 'PUT') {
	
	echo "So funciona no PUT";
	die();
} 

?>