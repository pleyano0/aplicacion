<?php
include_once("funciones.php");
if (!autenticado()) {
	header("Location: redirect.php?src=perfil.php");
} else {
	
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
<ul>
<li><b>Email: </b><?php echo $usuario[0]['email']; ?></li>
<li><b>Provincia: </b><?php echo $usuario[0]['provincia']; ?></li>
<li><b>Sexo: </b><?php echo ($usuario[0]['sexo'] === "H" ? "Hombre" : "Mujer"); ?></li>
</ul>
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
