<?php 

session_start();

//Verificações para login
if(!isset($_SESSION['nome_usuario'])) {
	header("location:../index.php");

}

include_once("../conexao.php");

//setcookie
setcookie('voto_cont', $_SERVER['REMOTE_ADDR'], time() + 30);

//verificar se está vindo a variável id pela URL
if (isset($_GET['id'])) {

	if (isset($_COOKIE['voto_cont'])) {
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Você já votou!</div>";
		echo "<script language='javascript'>window.alert('Você já votou!');</script>";
		echo "<script language='javascript'>window.location='../index.php';</script>";

		@session_destroy();

	}else {

		$result_produto = "UPDATE produtos SET qnt_voto=qnt_voto + 1
		WHERE id ='" . $_GET['id'] . "'";

		//Chama o UPDATE por get
		$resultado_produto = mysqli_query($conn, $result_produto);

		if (mysqli_affected_rows($conn)) {
			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Voto recebido com sucesso!</div>";
			echo "<script language='javascript'>window.alert('Voto recebido com sucesso!');</script>";
			echo "<script language='javascript'>window.location='../index.php';</script>";

			@session_destroy();

		}else {
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao votar!</div>";
			echo "<script language='javascript'>window.alert('Erro ao votar!');</script>";
			echo "<script language='javascript'>window.location='../index.php';</script>";
		}

	}
	
}

?>