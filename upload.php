<?php
include_once("funciones.php");
if (!autenticado()) { 
	header("Location: redirect.php?src=upload.php");
} else { 

if (isset($_FILES['fichero'])) {
	if ($_FILES['fichero']['error'] > 0) {
		echo "Error: ".$_FILES['fichero']['error'];
	} else {
		$carpeta = "uploads/avatars/". $_FILES['fichero']['name'];
		move_uploaded_file($_FILES['fichero']['tmp_name'], $carpeta );
		sqlWriter("update usuarios set avatar = '". $carpeta . "' where nombre_usuario = '" . $_SESSION['user']. "'");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cambiar avatar</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<script type="text/javascript">window.close();</script>
</body>
</html>

<?php

} else {
$usuario = sqlReader("select * from usuarios where nombre_usuario = '".$_SESSION['user']."'");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cambiar avatar</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<form id="subir" action="upload.php" enctype="multipart/form-data" method="post">
<img src="<?php echo $usuario[0]['avatar']; ?>" alt="avatar" />
<input type="file" onChange="document.getElementById('subir').submit();" name="fichero" />
</form>
</body>
</html>
<?php } } ?>
