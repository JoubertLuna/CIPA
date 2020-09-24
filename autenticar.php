<?php

include_once("conexao.php");

@session_start();

if (empty($_POST['usuario'])) {
	header("location:index.php");
}

if ($_SESSION['captha'] == $_POST['captha']) {

$usuario = $_POST['usuario'];

$res = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");

$res->bindValue(":usuario", $usuario);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if ($linhas > 0) {

	//Chamando nome e nível do usuário no BD
	$_SESSION['nome_usuario'] = $dados[0]['nome'];
	$_SESSION['nivel_usuario'] = $dados[0]['nivel'];

	if ($_SESSION['nivel_usuario'] == 'admin') {
	//Direcionamento para a pagina de votação
		header("location:painel-adm/index.php");
		exit();
	}

	if ($_SESSION['nivel_usuario'] == 'user') {
	//Direcionamento para a pagina de votação
		header("location:painel-adm/index.php");
		exit();
	}

	if ($_SESSION['nivel_usuario'] == '') {
	//Direcionamento para a pagina de votação
		header("location:painel-adm/index.php");
		exit();
	}

}

}else {
	//Teste de dados incorretos
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Dados Incorretos ou caracteres anti-robô inválidos!</div>";
	header("location:index.php");
}

?>