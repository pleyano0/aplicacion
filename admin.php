<?php
include_once("funciones.php");
if (!superusuario()) {
	header("Location: redirect.php?errcode=3");
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
	<li><a href="javascript:cambiar(0);">Carrera</a></li>
	<li><a href="javascript:cambiar(1);">Usuario</a></li>
	<li><a href="javascript:cambiar(2);">Piloto</a></li>
	<li><a href="javascript:cambiar(3);">Equipo</a></li>
    <li class="admin_edit">Ediciones:</li>
	<li><a href="javascript:cambiar(4);">Carrera</a></li>
	<li><a href="javascript:cambiar(5);">Usuario</a></li>
	<li><a href="javascript:cambiar(6);">Piloto</a></li>
	<li><a href="javascript:cambiar(7);">Equipo</a></li>
</ul>
</div>
<div id="admin_panel">
<div id="insertar_carrera">
    Id. carrera: <input type="text" id="txt_carrera0" />
    <br />
    Id. piloto: <input type="text" id="txt_piloto0" />
    <br />
    Posicion inicial: <input type="text" id="txt_posini0" />
    <br />
    Posicion final: <input type="text" id="txt_posfin0" />
    <br />
    Mejor tiempo: <input type="text" id="txt_mejortiempo0" />
    <br />
    Vueltas: <input type="text" id="txt_vueltas0" />
    <br />
</div>
<div id="insertar_usuario">
    Nombre de usuario: <input type="text" id="txt_usuario1" />
    <br />
    Contraseña: <input type="password" id="txt_contrasena1" />
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
    <br /><input type="button" onclick="insertar_usuario()" value="Insertar" />	
</div>
<div id="insertar_piloto">
</div>
<div id="insertar_equipo">
</div>
<div id="modificar_carrera">
    Id. carrera: <input type="text" id="txt_carrera1" /><input type="button" onclick="consultar_carrera()" value="consultar" />
    <br />
    Id. piloto: <input type="text" id="txt_piloto1" />
    <br />
    Posicion inicial: <input type="text" id="txt_posini1" />
    <br />
    Posicion final: <input type="text" id="txt_posfin1" />
    <br />
    Mejor tiempo: <input type="text" id="txt_mejortiempo1" />
    <br />
    Vueltas: <input type="text" id="txt_vueltas1" />
    <br />
</div>
<div id="modificar_usuario">
    Nombre de usuario: <input type="text" id="txt_usuario" />
    <input type="button" onclick="consultar()" value="consultar" />
    <br />
    Email: <input type="text" id="txt_email" />
    <br />
    Rol: <input type="text" id="txt_rol" />
    <br />
    Provincia: <input type="text" id="txt_provincia" />
    <br />
    Sexo: <input type="text" id="txt_sexo" />
    <br />
    Avatar: <input type="text" id="txt_avatar" />
    <br /><input type="button" onclick="actualizar_usuario()" value="actualizar" />	
</div>
<div id="modificar_piloto">
</div>
<div id="modificar_equipo">
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