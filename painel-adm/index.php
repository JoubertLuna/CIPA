<?php 


session_start();

//Verificações para login
if(!isset($_SESSION['nome_usuario'])) {
	header("location:../index.php");
}

/*if(!isset($_SESSION['nome_usuario']) || $_SESSION['nivel_usuario'] != 'user') {
	header("location:../index.php");

}*/

include_once("../conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="description" content="Dokapack, Caruaru, Pernambuco, embalagens flexiveis ">
	<meta name="author" content="NTI (ti@dokapack.com.br)">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">

	<title>Votação Cipa</title>

	<!-- CSS bootstrap 4.5 -->
	
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/personalizado.css" rel="stylesheet">

	<!-- jquery -->
	<script src="../js/jquery.js"></script>
	
</head>
<body>
	<nav class="navbar navbar-light bg-light">

		<div class="col-md-12">
			<img class="float-left" src="../imagens/logo.png" alt="">
			<li class="float-right nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Usuário - <?php echo $_SESSION['nome_usuario'] ?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" target="_blank" href="../relatorio.php">Relatório</a>
					<a class="dropdown-item" target="_blank" href="../relatorioVT.php">Relatório Votantes</a>
					<a class="dropdown-item" href="../logout.php">sair</a>
				</div>
			</li>
		</div>
	</nav>

	<header style="background: #006400;padding-top: 10px;">
		<div class="container" >
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 style="color: #fff;">CONTADOR REGRESSIVO</h1>
				</div>
			</div>
		</div>
	</header>

	<main>
		<section>
			<div class="container">
				<br />
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 text-center" style="background: #006400;">
							<p style="color: #fff; font-size: 35px; margin-bottom: 0px;">
								<span id="timer_horas">00</span> :
								<span id="timer_minutos">01</span> :
								<span id="timer_segundos">00</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<div class="container">
		<h1 class="text-center">CANDIDATOS</h1>

		<?php 

		if (isset($_SESSION['msg'])) {

			echo $_SESSION['msg'] . "<br><br>";
			unset($_SESSION['msg']);
		}
		?>
		<div class="row">

			
			<?php
			//Pesquisar candidatos
			$result_produto = "SELECT * FROM produtos";
			$resultado_produto = mysqli_query($conn, $result_produto);

			while ($row_produto = mysqli_fetch_assoc($resultado_produto)) {
				?>
				<div class="col-sm-12 col-md-6 lg-6">
					<div class="thumbnail">
						<div class="caption">
							<!-- botão votar<p style="padding-top: 70px;">
								<a href="votar.php?id=<?php echo $row_produto['id']; ?>" class="btn btn-lg btn-success">Votar</a>
							</p>-->
						</div>
						<!-- mostra imagens dos candidatos -->
						<img src="../imagens/<?php echo $row_produto['imagem']; ?>">
						
					</div>
					<div class="descricao">
						

						<!-- botão votar --> 
						<p style="padding-top: 10px;">

							<a href="votar.php?id=<?php echo $row_produto['id']; ?>" data-confirm='Deseja confirmar seu voto?' class="btn btn-lg btn-success">Votar</a>	

						</p>
						<!-- Nome do Candidato -->
						<h3><?php echo $row_produto['nome']; ?></h3>
						
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>

	<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->	
		<script src="../js/personalizado2.js"></script>

		<!-- jquery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<!-- Timer voto!! --> 
<script type="text/javascript">
	function iniciarContador(m_init) {
	
	var t_minutos = document.getElementById("timer_minutos");
	var t_segundos = document.getElementById("timer_segundos");
	t_minutos.innerHTML = ((m_init - 1) > 9) ? ('' +(m_init - 1)) : ('0' + (m_init - 1));
	t_segundos.innerHTML = '59';

	var m = m_init - 1;
	var s = 59;

	var contador = setInterval(function() {
		t_minutos.innerHTML = (m > 9) ? ('' + m) : ('0' + m);
		t_segundos.innerHTML = (s > 9) ? ('' + s) : ('0' + s);


		if(s > 0) s -= 1;
		else if(s == 0 && m > 0) {s = 59; m -= 1;}
		else {m = m_init; }
	}, 1000);

	var alerta = setInterval(function() {alert('Seu tempo para votar está acabando!!!') }, 55000);

	}
	iniciarContador(1);
</script>
	</body>
	</html>