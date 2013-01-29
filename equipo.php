<?php
include_once("funciones.php");
if (!autenticado()) {
	header("Location: redirect.php?src=equipo.php" . (isset($_GET['n']) ? "?n=" . $_GET['n'] : ""));
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
	$lector1=sqlReader("select claveTeam, equipo, fundacion, campeonatos, puntosActuales, foto from Teams");
	foreach ($lector1 as $tupla_equipo) {
		if ($tupla_equipo['claveTeam'] == $_GET['n'])
			echo imprimir_equipo_personal($tupla_equipo['claveTeam'], $tupla_equipo['equipo'], $tupla_equipo['fundacion'], $tupla_equipo['campeonatos'],  "images/tfoto/" . $tupla_equipo['foto'], $tupla_equipo['puntosActuales']);
	}
} else {
	# TRABAJANDO SIN SERVIDOR
	echo imprimir_equipo_personal(4, "Red Bull", "05/11/1956", 50, "images/tfoto/t05.jpg", 400);
}
?>
</div>
<?php
include("lateral_equipo.php");
?>
</div>
<?php
include("footer.php");
?>
</body>
</html>
<?php } ?>
