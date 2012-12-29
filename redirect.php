<?php
include_once("funciones.php");
if (autenticado()) { 
	if (isset($_GET['src'])) {
		header("Location: " . $_GET['src']);
	} else {
		header("Location: index.php");
	}
} else { 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/formulario.js"></script>
</head>

<body>
<?php include("login.php"); ?>

<?php
include("header.php");
?>
<div id="contenedor">
<?php include("menu.php"); ?>
<div id="index_contenido">
<div id="redirect">

<?php if (isset($_GET['errcode'])): 
	switch($_GET['errcode']) {
		case '0':
		echo "<h2>Login de usuario</h2>";
		break;
		case '1':
		echo "<h2>Usuario o contraseña incorrectos</h2>";
		break;
	}
else: ?>
<h2>Necesitas estar autenticado para acceder a esta paǵina.</h2>
<?php endif; ?>
<form action="login.php<?php echo (isset($_GET['src'])) ? "?src=".$_GET['src'] : "" ?>" method="post">
<label for="username1">Nombre de usuario:</label><input type="text" name="user_id" id="username1" />
<label for="password1">Contraseña:</label><input type="password" name="user_pass" id="password1" />
<input type="submit" value="Entrar" name="btn_submit" />
</form>

</div>
</div>
</div>
<?php
include("footer.php");
?>
</body>
</html>
<?php } ?>
