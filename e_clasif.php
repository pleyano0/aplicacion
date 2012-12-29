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
	$lector1=sqlReader("select Pilotos.fcarne as fcarne, Teams.claveTeam as claveTeam, Teams.equipo as equipo, Teams.logo as logo, Teams.foto as foto from Pilotos join Teams on Pilotos.claveTeam = Teams.claveTeam");
	for ($i = 0; $i < sizeof($lector1); $i+=2) {
		echo imprimir_equipo($lector1[$i]['claveTeam'], $lector1[$i]['equipo'], $lector1[$i]['fcarne'], $lector1[$i+1]['fcarne'], $lector1[$i]['logo'], $lector1[$i]['logo']);
	}
} else {

	# TRABAJANDO SIN SERVIDOR

	for ($i = 1; $i <= 5; $i++) {
		echo imprimir_equipo($i, "Red Bull", "fc".str_pad($i, 2, "0", STR_PAD_LEFT).".jpg", "fc".str_pad($i, 2, "0", STR_PAD_LEFT).".jpg", 't01_l.jpg', 't01_l.jpg');
	}
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
