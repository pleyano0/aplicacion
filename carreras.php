<?php
include_once("funciones.php");
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

	$lector1=sqlReader("select claveCarrera, granPremio, fecha, foto, bandera from Carreras");
	foreach ($lector1 as $tupla_carrera) {
		echo imprimir_carrera($tupla_carrera['claveCarrera'], $tupla_carrera['granPremio'], $tupla_carrera['fecha'], $tupla_carrera['foto'], $tupla_carrera['bandera']);
	}
} else {

	# TRABAJANDO SIN SERVIDOR

	for ($i = 1; $i <= 4; $i++) {
		echo imprimir_carrera(1, "Valencia", "15 -  16 marzo", "images/carreras/race01.jpg", "images/carreras/flag01.jpg");
	}
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
