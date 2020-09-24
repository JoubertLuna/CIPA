<?php 

@session_start();

 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>LOGIN</title>

	<!-- utf-8 -->
	<meta charset="utf-8">
	<!-- Responsivo em Despositivos moveis -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS bootstrap 4.5 -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- CSS local -->
	<link rel="stylesheet" href="css/login.css">

	<!-- favicon -->
	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

	<!-- MASCARAS TELEFONE - CELULAR - CPF - CEP -->
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<script src="js/mascaras.js"></script>
	

	<style type="text/css">
		.notificacoes {
			width: 30px;
			height: 30px;			
			text-align: center;
			line-height: 30px;
			color: #FFF;
			font-size: 16px;

		}

		.tem_notif {			
			color: #FFF;
		}
	</style>

</head>

<body>

	<div class="login-form">
		<form action="autenticar.php" method="post">
			<div class="container-fluid">
				<!-- Botão para acionar modal -->
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#sofy">
					<div class="notificacoes">1</div>
				</button>

				<!-- Modal -->
				<div class="modal fade" id="sofy" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div div class="modal-header bg-success text-white">
								<h5 class="modal-title" id="TituloModalCentralizado">AVISO LEGAL</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="text-center">
									<h2>
									<img src="imagens/logo.png" alt="">	
									</h2>	
								</div>
								
								<p class="text-center">Sistema Desenvolvido pelo Núcleo de Tecnologia da Informação (NTI) - (ti@dokapack.com.br).</p><br>
								<p class="text-center">Responsável Técnico - Núcleo de Tecnologia da Informação (NTI) - (ti@dokapack.com.br).</p><br>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>			
			</div>

			
			<div class="logo">
				<img src="imagens/CI.jpg" alt="">
			</div>

			<!-- Texto acessar sistema -->
			<h2 class="text-center">
				<img src="imagens/logo.png" alt="">
			</h2>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}


			if(isset($_SESSION['msgcad'])){
				echo $_SESSION['msgcad'];
				unset($_SESSION['msgcad']);
			}
			?>

			<!-- Insira seu email -->
			<div class="form-group">
				<label>NÚMERO DO PONTO</label>
				<input class="form-control" type="text" id="cpf" name="usuario" placeholder="Insira seu número de ponto" required>
			</div>

			<!-- Insira sua senha
			<div class="form-group">
				<label>SENHA</label>
				<input class="form-control" type="password" name="senha" placeholder="Insira sua senha" required>
			</div>
			-->

			
			<img class="text-center" src="painel-adm/captha.php" alt="Código captha"><br>	

			<!-- Insira o Captha se eu for tirar é o captha -->
			<div class="form-group">
				<label>DIGITE O CÓDIGO</label>
				<input class="form-control" type="text" name="captha" placeholder="Digite o código" required>
				
			</div>
			

			<!-- Botão login -->
			<div class="form-group">
				<button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-login">LOGIN</button>
			</div>

		</form>

	</div>


	<?php 
	
	$s_usuario = "pendente";

	if ($s_usuario == "pendente") { ?>
		
		<script>
			$(document).ready(function() {
				$('#sofy').modal('show')
			});
		</script>	
		
	<?php } ?>

</body>

</html>