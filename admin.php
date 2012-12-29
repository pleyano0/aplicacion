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
<input type="text" id="txt_usuario" />
<br />
<input type="text" id="txt_email" />
<br />
<input type="text" id="txt_provincia" />
<br />
<input type="text" id="txt_sexo" />
<br />
<input type="button" onclick="consultar()" value="consultar" /><input type="button" onclick="actualizar()" value="actualizar" />	

</div>
</div>

<?php
include("footer.php");
?>
</body>
</html>
<?php } ?>