<?php 
@session_start();
if(!isset($_SESSION['nome_usuario']) || $_SESSION['nivel_usuario'] != 'admin'){
	header("location:index.php");
}

require 'vendor/autoload.php';
include_once("conexao.php");

//Referenciando o namespace da dompdf

use Dompdf\Dompdf;


$sql = $pdo->query('SELECT * FROM produtos');

$html ='<img src="imagens/logo.png" alt="" width=30%>';
$html .='<h1> Relatorio de Votação CIPA</h1>';
$html .= '<table border=1 width=100%>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td>Código</td>';
$html .= '<td>Nome Candidato</td>';
$html .= '<td>Quantidade de votos</td>';
$html .= '</tr>';
$html .= '</thead>';

while ($consulta = $sql->fetch(PDO::FETCH_ASSOC)) {
	# code...
	$html .='<tbody>';
	$html .= '<tr><td>'.$consulta['id'] .'</td>';
	$html .= '<td>'.$consulta['nome'] .'</td>';
	$html .= '<td>'.$consulta['qnt_voto'] .'</td></tr>';
	$html .='</tbody>';
}

$html .= '</table>';

?>

<form>
	<input type="button" value="Imprimir" onClick="window.print()"/>
</form>


<?php

echo $html;

//instancia da dompdf
$dompdf = new Dompdf();

//converter o html
$dompdf->loadHtml($html);

//definir tamanho e orientação
$dompdf-> setPaper('A4', 'portrait');

//renderizar o html
$dompdf->render();

?>