<?php
include_once("funciones.php");
if (!autenticado()) {
	header("Location: redirect.php?src=perfil.php");
} else {
	
if (isset($_POST['cambios_enviados'])) {
	
	actualizar_usuario($_SESSION['user'], $_POST['nombre'], $_POST['select_prov'], $_POST['email']);
	
}
$usuario = sqlReader("select * from usuarios where nombre_usuario = '".$_SESSION['user']."'");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">

function cambiar_avatar() {
	
	window.open("upload.php", "Cambiar avatar", "width=400,height=300");
	
}

</script>
<script src="js/formulario.js"></script>
</head>

<body>
<?php include("login.php"); ?>

<?php
include("header.php");
?>
<div id="contenedor">
<?php include("menu.php"); ?>
<div id="perfil_contenido">
<div id="datos">
<h2><?php echo $usuario[0]['nombre_usuario']; ?></h2>
<div id="avatar"><img src="<?php echo $usuario[0]['avatar']; ?>" alt="avatar" /><br /><a href="javascript:cambiar_avatar();">Cambiar avatar</a></div>
<?php if (isset($_GET['editar']) && $_GET['editar'] === 'y') {?>
<form action="perfil.php" method="post">

<ul>
<li><b>Nombre de usuario: </b><input type="text" name="nombre" value="<?php echo $usuario[0]['email']; ?>"  /></li>
<li><b>Email: </b><input type="text" name="email" value="<?php echo $usuario[0]['email']; ?>" /></li>
<li><b>Provincia: </b><select id="select_prov" name="select_prov">
<script type="text/javascript">
var array_provincias = provincias();
for (i in array_provincias) { 
document.write("<option value='"+array_provincias[i]+"'>"+array_provincias[i]+"</option>");
}
</script>
</select></li>
<li><b>Sexo: </b><?php echo ($usuario[0]['sexo'] === "H" ? "Hombre" : "Mujer"); ?></li>
</ul>
<div class="perfil_buttons"><input type="submit" value="Enviar" name="cambios_enviados" /> <input onclick="window.location='perfil.php'" type="button" value="Cancelar" /></div>
</form>
<?php
} else {
	
?>
<ul>
<li><b>Email: </b><?php echo $usuario[0]['email']; ?></li>
<li><b>Provincia: </b><?php echo $usuario[0]['provincia']; ?></li>
<li><b>Sexo: </b><?php echo ($usuario[0]['sexo'] === "H" ? "Hombre" : "Mujer"); ?></li>
</ul>
<div  class="perfil_buttons"><a href="perfil.php?editar=y">Editar...</a></div>
<?php } ?>
</div>
<img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $usuario[0]['provincia']; ?>&zoom=9&size=300x300&sensor=false" alt="Map" id="foto" />

</div>
</div>
<?php
include("footer.php");
?>
</body>
</html>
<?php } ?>
