<?php
include_once("funciones.php");
if (!autenticado()) {
	header("Location: redirect.php?src=piloto.php" . (isset($_GET['n']) ? "?n=" . $_GET['n'] : ""));
} else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="print.css" media="print" />
</head>

<body>

<?php include("login.php"); ?>

<?php
include("header.php");
?>
<div id="contenedor">
<?php include("menu.php"); ?>
<div id="contenido">
<?php

# TRABAJANDO CON SERVIDOR

if (servidor) {
	$lector1=sqlReader("select numPiloto, Pilotos.nombre as Pnombre, Teams.nombre as Tnombre, fpersonal, nacionalidad, Pilotos.puntosActuales as PpuntosActuales, puntosConseguidos, gpDisputados, Pilotos.campeonatos as Pcampeonatos, CONVERT(varchar(10), fNacimiento, 103) as fecha from Pilotos join Teams on Pilotos.claveTeam = Teams.claveTeam");
	foreach ($lector1 as $tupla_piloto) {
		if ($tupla_piloto['numPiloto'] == $_GET['n'])
			echo imprimir_piloto_personal($tupla_piloto['numPiloto'], $tupla_piloto['Pnombre'], $tupla_piloto['fecha'], $tupla_piloto['nacionalidad'], $tupla_piloto['gpDisputados'], $tupla_piloto['puntosConseguidos'], $tupla_piloto['Pcampeonatos'], $tupla_piloto['PpuntosActuales'], $tupla_piloto['Tnombre'], "images/fpersonal/".$tupla_piloto['fpersonal']);
	}
} else {
	# TRABAJANDO SIN SERVIDOR
	echo imprimir_piloto_personal(1, "Sebastian Vettel", "12/10/1980", "Alemán", 499, 6168, 3, 419, "Red Bull", "images/fpersonal/fp01.jpg");
}
?>
</div>
<?php
include("lateral.php");
?>
</div>
<?php
include("footer.php");
?>
</body>
</html>
<?php } ?>
