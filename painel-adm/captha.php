<?php 

	session_start();

	$codigoCaptha = substr(md5(time()) ,0, 5);

	$_SESSION['captha'] = $codigoCaptha;

	$imagemCaptha = imagecreatefrompng("../imagens/cap01.png");

	$fonteCaptha = imageloadfont("../imagens/anonymous.gdf");

	$corCaptha = imagecolorallocate($imagemCaptha, 0, 100, 0);

	imagestring($imagemCaptha, $fonteCaptha, 15, 5, $codigoCaptha, $corCaptha);

	imagepng($imagemCaptha);

	imagedestroy($imagemCaptha);


	//Verificações para login
//if(!isset($_SESSION['nome_usuario'])) {
//	header("location:../index.php");

//}

 ?>