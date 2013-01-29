<div id="lateral">
<div id="lat_head"><a href="javascript:;"></a></div>
<div id="lat_head2"><a href="javascript:;">2012 Clasificación</a></div>
<ul>
<?php
  # TRABAJANDO CON SERVIDOR

if (servidor) {
	$lector1=sqlReader("select claveTeam, clasif = ROW_NUMBER() OVER (order by puntosActuales desc), equipo, puntosActuales from Teams");
	foreach ($lector1 as $tupla_equipo) {
		echo imprimir_equipo_clasificacion($tupla_equipo['claveTeam'], str_pad($tupla_equipo['clasif'], 2, "0", STR_PAD_LEFT), $tupla_equipo['equipo'], $tupla_equipo['puntosActuales']);
	}
} else {
	# TRABAJANDO SIN SERVIDOR
	for ($i = 1; $i <= 12; $i++) {
		echo imprimir_equipo_clasificacion($i, str_pad($i, 2, "0", STR_PAD_LEFT), "Red Bull", 260-20*$i);
	}
}
?>
</ul>
<div class="elemento"><a href="javascript:;">LIVE TIMING</a></div>
<div class="elemento"><a href="javascript:;">VIDEO</a></div>
<div class="elemento"><a href="javascript:;">TICKETS &amp; TRAVEL</a></div>
<div class="elemento"><a href="javascript:;">F1 STORE</a></div>
<div class="elemento"><a href="javascript:;">MOBILE SERVICES</a></div>

</div>
