
<?php
include_once("funciones.php");
if (!autenticado()) {
	header("Location: redirect.php?src=carrera.php" . (isset($_GET['n']) ? "?n=" . $_GET['n'] : ""));
} else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
	$lector1=sqlReader("select claveCarrera, granPremio, circuito, fecha, foto, fpersonal, bandera, vueltas, distancia from Carreras");
	foreach ($lector1 as $tupla_carrera) {
		if ($tupla_carrera['claveCarrera'] == $_GET['n']) {
			echo imprimir_carrera_personal($tupla_carrera['granPremio'],$tupla_carrera['fecha'], $tupla_carrera['circuito'], $tupla_carrera['vueltas'], $tupla_carrera['distancia'], $tupla_carrera['fpersonal']);
			$lector2=sqlReader("select Pilotos.numPiloto as numPiloto, Resultados.claveCarrera as claveCarrera, Pilotos.nombre as nom, Pilotos.fpersonal as foto, Resultados.parrilla as parrilla, Resultados.vueltas as vueltas, Resultados.tiempo as tiempo, Resultados.posicion as posicion from Resultados join Pilotos on Pilotos.numPiloto = Resultados.numPiloto order by posicion");
			echo "<div id='resultados_pilotos'>";
			foreach ($lector2 as $piloto) {
				if ($piloto['claveCarrera'] == $_GET['n']) {
					echo imprimir_resultado($piloto['numPiloto'], $piloto['nom'], $piloto['parrilla'], $piloto['vueltas'], $piloto['tiempo'], $piloto['posicion'], $piloto['foto']);
				}
			}
			echo "</div>";
		}
	}
} else {
	# TRABAJANDO SIN SERVIDOR
	echo imprimir_carrera_personal("GP de Valencia", "15/10/2013", "Circuit de Valenciá", 68, "501km", "images/carreras/personal01.jpg");
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
