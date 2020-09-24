<!-- Conexão PHP Estruturado -->
<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "@jou1824";
$dbname = "votar";

//Criar Conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

?>

<!-- Conexão PHP PDO -->
<?php 

try {
	
	$pdo = new PDO("mysql:dbname=votar;host=localhost", "root", "@jou1824");
	

} catch (Exception $e) {

	echo "Erro ao conectar com o banco de dados!".$e;
}

?>