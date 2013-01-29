<?php
include_once("funciones.php");
if (!superusuario()) {
	header("Location: redirect.php?src=admin.php&errcode=3");
} else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/ajax.js"></script>

</head>

<body>

<?php include("login.php"); ?>
<?php
include("header.php");
?>
<div id="contenedor">
<?php include("menu.php"); ?>
<div id="admin_contenido">
<div id="admin_menu">
<ul>
	<li class="admin_insert">Inserciones:</li>
	<li>Carrera</li>
	<li>Usuario</li>
	<li>Piloto</li>
	<li>Equipo</li>
    <li class="admin_edit">Ediciones:</li>
	<li>Carrera</li>
	<li>Usuario</li>
	<li>Piloto</li>
	<li>Equipo</li>
</ul>
</div>
<div id="admin_panel">
<div id="modificar_usuario">
    Nombre de usuario: <input type="text" id="txt_usuario" />
    <input type="button" onclick="consultar()" value="consultar" />
    <br />
    Email: <input type="text" id="txt_email" />
    <br />
    Provincia: <input type="text" id="txt_provincia" />
    <br />
    Sexo <input type="text" id="txt_sexo" />
    <br /><input type="button" onclick="actualizar()" value="actualizar" />	
</div>
<div id="insertar_usuario">
    Nombre de usuario: <input type="text" id="txt_usuario1" />
    <br />
    Contraseña: <input type="text" id="txt_contrasena1" />
    <br />
    Email: <input type="text" id="txt_email1" />
    <br />
    Rol: <input type="text" id="txt_rol1" />
    <br />
    Provincia: <input type="text" id="txt_provincia1" />
    <br />
    Sexo: <input type="text" id="txt_sexo1" />
    <br />
    Avatar: <input type="text" id="txt_avatar1" />
    <br /><input type="button" onclick="insertar()" value="Insertar" />	
</div>
</div>
</div>
</div>

<?php
include("footer.php");
?>
</body>
</html>
<?php } ?>