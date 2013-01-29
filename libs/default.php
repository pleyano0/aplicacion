<?php
require_once("../funciones.php");
require_once("dompdf_config.inc.php");
if (!autenticado()) {
	header("Location: ../redirect.php?src=libs/default.php?n=" .$_GET['n']);
} else {
	ob_start();
	
	if (servidor) {
		$lector1=sqlReader("select numPiloto, Pilotos.nombre as Pnombre, Teams.nombre as Tnombre, fpersonal, nacionalidad, Pilotos.puntosActuales as PpuntosActuales, puntosConseguidos, gpDisputados, Pilotos.campeonatos as Pcampeonatos, CONVERT(varchar(10), fNacimiento, 103) as fecha from Pilotos join Teams on Pilotos.claveTeam = Teams.claveTeam");
		foreach ($lector1 as $tupla_piloto) {
			if ($tupla_piloto['numPiloto'] == $_GET['n'])
				echo imprimir_piloto_personal($tupla_piloto['numPiloto'], $tupla_piloto['Pnombre'], $tupla_piloto['fecha'], $tupla_piloto['nacionalidad'], $tupla_piloto['gpDisputados'], $tupla_piloto['puntosConseguidos'], $tupla_piloto['Pcampeonatos'], $tupla_piloto['PpuntosActuales'], $tupla_piloto['Tnombre'], "../images/fpersonal/".$tupla_piloto['fpersonal']);
		}
	} else {
		echo '<html><body>'. imprimir_piloto_pdf(1, "Sebastian Vettel", "12/10/1980", "Aleman", 499, 6168, 3, 419, "Red Bull", "../images/fpersonal/fp01.jpg") . '</body></html>';
	}
	
	$dompdf = new DOMPDF();
	$dompdf->load_html(ob_get_clean());
	$dompdf->render();
	$dompdf->stream("piloto.pdf");
}
?>