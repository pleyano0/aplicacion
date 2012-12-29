<div id="lateral">
<div id="lat_head"><a href="javascript:;"></a></div>
<div id="lat_head2"><a href="javascript:;">2012 Clasificación</a></div>
<ul>
<?php
  # TRABAJANDO CON SERVIDOR

if (servidor) {
	$lector1=sqlReader("select clasif = ROW_NUMBER() OVER (order by Pilotos.puntosActuales desc), numPiloto, Pilotos.nombre as Pnombre, Pilotos.puntosActuales as puntos from Pilotos");
	foreach ($lector1 as $tupla_piloto) {
		echo imprimir_piloto_clasificacion(str_pad($tupla_piloto['clasif'], 2, "0", STR_PAD_LEFT), $tupla_piloto['numPiloto'], $tupla_piloto['Pnombre'], $tupla_piloto['puntos']);
	}
} else {
	# TRABAJANDO SIN SERVIDOR
	for ($i = 1; $i <= 14; $i++) {
		echo imprimir_piloto_clasificacion(str_pad($i, 2, "0", STR_PAD_LEFT), $i*3, "Webber apellido", 200-10*$i);
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
