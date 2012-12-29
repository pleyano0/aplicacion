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

function conectar($server,$db)
{
    try 
    {
//      $Cnx = new PDO("sqlsrv:server=$server ; Database=$db");
        $Cnx = new PDO('mysql:host='.$server.';dbname='.$db, 'root', 'toor');
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
//		$miCnx=conectar("(local)","MundialF1"); // MICNX = TIPO PDO
		$miCnx=conectar("127.0.0.1","MundialF1"); // MICNX = TIPO PDO
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
//		$miCnx=conectar("(local)","MundialF1"); // MICNX = TIPO PDO
		$miCnx=conectar("127.0.0.1","MundialF1"); // MICNX = TIPO PDO
		$lector=$miCnx->prepare($sentencia);
		$lector->execute();
	}
	catch (Exception $ex)
	{
		$lector=null;
	}
	$miCnx=null;
}

function autenticado() {
	if (!isset($_SESSION))
		session_start();
	return isset($_SESSION['rol']) ? true : false;
	
}

function login($usuario, $contrasena) {
	
	$lector = sqlReader("select rol, nombre_usuario from usuarios where nombre_usuario = '$usuario' and contrasena = '$contrasena'");
	if (sizeof($lector) > 0) {
		$_SESSION['rol'] = $lector[0]['rol'];
		$_SESSION['user']= $lector[0]['nombre_usuario'];
		return true;
	} else {
		return false;
	}
	
}

function insertar_usuario($nombre, $pass1, $pass2, $email, $provincia, $sexo) {
	
	$error = 0;
	$existe = sqlReader("select nombre_usuario from usuarios where nombre_usuario = '$nombre'");
	if (sizeof($existe) > 0)
		$error = 1;
	elseif ($pass1 != $pass2)
		$error = 2;
	
	if ($error == 0) {

		sqlWriter("insert into usuarios values (default, '$nombre', '$pass1', '$email', 'r', '$provincia', '$sexo')");
		echo "asdasdasd";

	}

	return $error;

}




?>
