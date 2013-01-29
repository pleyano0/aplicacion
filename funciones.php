<?php

define("servidor", false);

function imprimir_piloto($foto, $numero, $nombre, $equipo) {
	return "<div class='pilot'><div class='bloque'><a href='piloto.php?n=$numero'><img src='$foto' /></a><br /><a href='piloto.php?n=$numero'>$nombre</a> <br />$equipo</div></div>";
}

function imprimir_piloto_clasificacion($clasif, $posicion, $nombre, $puntos) {
	return "<li><a href='piloto.php?n=$posicion'><span class='clasif1'>$clasif</span><span class='clasif2'>$nombre</span><span class='clasif3'>$puntos</span></a></li>";	
}

function imprimir_equipo($numero, $nombre, $p1, $p2, $foto, $logo) {
	return "\n<div class='equip'><div class='bloque'><a href='equipo.php?n=$numero'><img src='images/tlogo/$logo' /></a><a href='equipo.php?n=$numero'>$nombre</a></div><a href='equipo.php?n=$numero'><img src='images/fcarne/$p1' class='p_equipo' /></a><a href='equipo.php?n=$numero'><img src='images/fcarne/$p2' class='p_equipo' /></a><a href='equipo.php?n=$numero'><img src='$p2' class='p_equipo' /></a><a href='equipo.php?n=$numero'><img src='images/efoto/$foto' class='p_equipo' /></a></div>";
}

function imprimir_equipo_clasificacion($clave, $clasif, $nombre, $puntos) {
	return "<li><a href='equipo.php?n=$clave'><span class='clasif1'>$clasif</span><span class='clasif2'>$nombre</span><span class='clasif3'>$puntos</span></a></li>";	
}

function imprimir_piloto_personal($numPiloto, $nombre, $fNacimiento, $nacionalidad, $gpDisputados, $puntosConseguidos, $campeonatos, $puntosActuales, $nombreEquipo, $fPersonal) {
	
	$retorno = ''?>
    <table id="t_piloto">
    	<tr><td>
    	<table>
            <tr>
                <td colspan="2"><h2><?php echo $nombre; ?></h2></td>
            </tr>            
            <tr>
                <td>Equipo</td><td><?php echo $nombreEquipo; ?></td>
            </tr>
            <tr>
                <td>Nacionalidad</td><td><?php echo $nacionalidad; ?></td>
            </tr>
            <tr>
                <td>Puntos totales</td><td><?php echo $puntosConseguidos; ?></td>
            </tr>
            <tr>
                <td>Puntos actuales</td><td><?php echo $puntosActuales; ?></td>
            </tr>
            <tr>
                <td>Grandes Premios disputados</td><td><?php echo $gpDisputados; ?></td>
            </tr>
            <tr>
                <td>Campeonatos Ganados</td><td><?php echo $campeonatos; ?></td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td><td><?php echo $fNacimiento; ?></td>
            </tr>
            <tr>
                <td>Número de piloto</td><td><?php echo $numPiloto; ?></td>
            </tr>
         </table>
        </td>
        <td id="col_img"> <img src="<?php echo $fPersonal; ?>" /><a href="javascript:;" id="piloto_btn"><?php echo $nombre; ?></a></td>
        </tr>
    </table>
    
    <?php ;
	
	return $retorno;
	
}


function imprimir_equipo_personal($numEquipo, $nombre, $fundacion, $campeonatos, $coche, $puntos) {
	
	$retorno = ''?>
    <table id="t_piloto">
    	<tr><td>
    	<table>
            <tr>
                <td colspan="2"><h2><?php echo $nombre; ?></h2></td>
            </tr>
            <tr>
                <td>Fundacion</td><td><?php echo $fundacion; ?></td>
            </tr>
            <tr>
                <td>Campeonatos</td><td><?php echo $campeonatos; ?></td>
            </tr>
            <tr>
                <td>Puntos conseguidos</td><td><?php echo $puntos ?></td>
            </tr>
         </table>
        </td>
        <td id="col_img"> <img src="<?php echo $coche; ?>" /><a href="javascript:;" id="equipo_btn"><?php echo $nombre; ?></a></td>
        </tr>
    </table>
    
    <?php ;
	
	return $retorno;
	
}

function imprimir_carrera($numCarrera, $nombre, $fecha, $img1, $img2) {

	return "<div class='carrera'><a href='carrera.php?n=$numCarrera' class='carrera_header'><span class='titulo_carrera'>$nombre</span><span class='fecha_carrera'>$fecha</span></a><a href='carrera.php?n=$numCarrera'><img src='$img1' alt='' /></a><a href='carrera.php?n=$numCarrera'><img src='$img2' alt='' /></a></div>";

}

function imprimir_carrera_personal($granPremio, $fecha, $circuito, $vueltas, $distancia, $foto) {
	
	$retorno = ''?>
    <table id="t_piloto">
    	<tr><td>
    	<table>
            <tr>
                <td colspan="2"><h2><?php echo $granPremio; ?></h2></td>
            </tr>            
            <tr>
                <td>Circuito</td><td><?php echo $circuito; ?></td>
            </tr>
            <tr>
                <td>N. de vueltas</td><td><?php echo $vueltas; ?></td>
            </tr>
            <tr>
                <td>Distancia</td><td><?php echo $distancia; ?></td>
            </tr>
            <tr>
                <td>Fecha</td><td><?php echo $fecha; ?></td>
            </tr>
         </table>
        </td>
        <td id="col_img_carrera"><img src="<?php echo $foto; ?>" /></td>
        </tr>
    </table>
    
    <?php ;
	
	return $retorno;
	
}

function conectar($server,$db)
{
    try 
    {
		$Cnx = new PDO("sqlsrv:server=$server ; Database=$db");
       // $Cnx = new PDO('mysql:host='.$server.';dbname='.$db, 'root', 'toor');
        return($Cnx);
    } 
    catch (PDOException $ex) 
    {
        throw new Exception();
    }
}


function sqlReader($sentencia)
{
	$lector;
	try
	{	
		$miCnx=conectar("(local)","MundialF1"); // MICNX = TIPO PDO
		//$miCnx=conectar("127.0.0.1","MundialF1"); // MICNX = TIPO PDO
		$lector=$miCnx->query($sentencia);
		if ($lector) $lector = $lector->fetchAll();
	}
	catch (Exception $ex)
	{
		$lector=null;
	}
	$miCnx=null;
	return $lector;
}

function sqlWriter($sentencia)
{
	$lector;
	try
	{	
		$miCnx=conectar("(local)","MundialF1"); // MICNX = TIPO PDO
	//	$miCnx=conectar("127.0.0.1","MundialF1"); // MICNX = TIPO PDO
		$lector=$miCnx->prepare($sentencia);
		$lector->execute();
	}
	catch (Exception $ex)
	{
		echo $ex;
		$lector=null;
	}
	$miCnx=null;
}

function autenticado() {
	if (!isset($_SESSION))
		session_start();
	return isset($_SESSION['rol']);
	
}

function superusuario() {
	if (!isset($_SESSION))
		session_start();
	return (isset($_SESSION['rol']) && $_SESSION['rol'] == 'a');
	
}

function login($usuario, $contrasena) {
	$contrasena = md5($contrasena);
	$lector = sqlReader("select rol, nombre_usuario from usuarios where nombre_usuario = '$usuario' and contrasena = '$contrasena'");
	if (sizeof($lector) > 0) {
		$_SESSION['rol'] = $lector[0]['rol'];
		$_SESSION['user']= $lector[0]['nombre_usuario'];
		return true;
	} else {
		return false;
	}
	
}

function insertar_usuario($nombre, $pass1, $pass2, $email, $provincia, $sexo, $avatar) {
	
	$error = 0;
	$existe = sqlReader("select nombre_usuario from usuarios where nombre_usuario = '$nombre'");
	if (sizeof($existe) > 0)
		$error = 1;
	elseif ($pass1 != $pass2)
		$error = 2;
	if ($error == 0) {
		sqlWriter("insert into usuarios values ('$nombre', '$pass1', '$email', 'r', '$provincia', '$sexo', '$avatar')");
	}

	return $error;

}




?>
