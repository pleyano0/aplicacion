<?php
include_once("funciones.php");
if (autenticado()) { 
			header("Location: index.php");
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
<form method="post" action="registro.php" id="register">

<?php if (!isset($_POST['input_reg'])): ?>
<h2>Formulario de registro</h2>
<div class="form_izq">
<div class="form_input"><label for="username">Nombre de usuario:</label><input type="text" name="username" id="username" /></div>
<div class="form_input"><label for="password">Contraseña:</label><input type="password" name="password1" id="password" /></div>
<div class="form_input"><label for="password2">Verificar contraseña:</label><input type="password" name="password2" id="password2" /></div>
</div>
<div class="form_der">

<div class="form_input"><label for="email">Email:</label><input type="text" name="email" id="email" /></div>
<div class="form_input">
<label for="select_prov">Provincia: </label>
<select id="select_prov" name="select_prov">
<script type="text/javascript">
var array_provincias = provincias();
for (i in array_provincias) { 
document.write("<option value='"+array_provincias[i]+"'>"+array_provincias[i]+"</option>");
}
</script>
</select>
</div>
<div class="form_input"><label>Sexo: </label><input type="radio" value="1" name="sexo" /> H <input type="radio" value="2" name="sexo" /> M</div>


</div>
<span id="legal_header">Aviso legal:</span>
<div id="legal">
<p>Al ingresar en "sudominio.com" (de aquí en adelante "nosotros", "nos", "nuestro", "sudominio.com", "http://localhost/"), acuerda estar legalmente sometido a los siguientes términos. En caso contrario por favor no se registre y/o use "sudominio.com". Podemos cambiar estos términos en cualquier momento e intentaríamos avisarle, sin embargo sería prudente que los revisase por su cuenta periódicamente. Seguir registrado a "sudominio.com" después de esos cambios significa que acuerda estar legalmente sometido a esos nuevos términos tal como fueron actualizados y/o reformados.
</p><p>
Nuestros sitio están desarrollados por Eduardo Páez (de aquí en adelante "ellos", "sus", "software de Eduardo", "www.localhost.com", "Eduardo Group", "Eduardo Teams") el cual es una solución de tablón de anuncios liberada bajo la "Licencia Pública General (General Public License en inglés)" (de aquí en adelante "GPL") y puede ser descargada de www.localhost.com. El software phpBB solamente facilita discusiones basadas en Internet y la GPL estrictamente los excluye de lo que aprobamos y/o desaprobamos como conductas y/o contenido permisible. Para más información sobre Eduardo, por favor visite: http://www.localhost.com/.
</p><p>
Acuerda no enviar ningun contenido abusivo, obsceno, vulgar, difamatorio, indecente, amenazante, sexual o cualquier otro material que pueda violar cualquier ley de su país, el país donde "sudominio.com" está instalado o Leyes Internacionales. Hacer eso provocará que sea inmediata y permanentemente expulsado y, si lo creemos oportuno, con notificación a su Proveedor de Servicios de Internet. Las direcciones IP de todos los envíos son registradas como ayuda para reforzar estas condiciones. Acuerda que "sudominio.com" tiene derecho a eliminar, editar, mover o cerrar cualquier tema en cualquier momento que lo creamos conveniente. Como usuario acuerda que cualquier información que haya ingresado será almacenada en una base de datos. Dado que esta información no será compartida con ninguna tercera parte sin su consentimiento, ni "sudominio.com" ni Eduardo podrán considerarse responsables por cualquier intento de hacking que conlleve a que los datos sean comprometidos.
</p>
<p>Al ingresar en "sudominio.com" (de aquí en adelante "nosotros", "nos", "nuestro", "sudominio.com", "http://localhost/"), acuerda estar legalmente sometido a los siguientes términos. En caso contrario por favor no se registre y/o use "sudominio.com". Podemos cambiar estos términos en cualquier momento e intentaríamos avisarle, sin embargo sería prudente que los revisase por su cuenta periódicamente. Seguir registrado a "sudominio.com" después de esos cambios significa que acuerda estar legalmente sometido a esos nuevos términos tal como fueron actualizados y/o reformados.
</p><p>
Nuestros sitio están desarrollados por Eduardo Páez (de aquí en adelante "ellos", "sus", "software de Eduardo", "www.localhost.com", "Eduardo Group", "Eduardo Teams") el cual es una solución de tablón de anuncios liberada bajo la "Licencia Pública General (General Public License en inglés)" (de aquí en adelante "GPL") y puede ser descargada de www.localhost.com. El software phpBB solamente facilita discusiones basadas en Internet y la GPL estrictamente los excluye de lo que aprobamos y/o desaprobamos como conductas y/o contenido permisible. Para más información sobre Eduardo, por favor visite: http://www.localhost.com/.
</p><p>
Acuerda no enviar ningun contenido abusivo, obsceno, vulgar, difamatorio, indecente, amenazante, sexual o cualquier otro material que pueda violar cualquier ley de su país, el país donde "sudominio.com" está instalado o Leyes Internacionales. Hacer eso provocará que sea inmediata y permanentemente expulsado y, si lo creemos oportuno, con notificación a su Proveedor de Servicios de Internet. Las direcciones IP de todos los envíos son registradas como ayuda para reforzar estas condiciones. Acuerda que "sudominio.com" tiene derecho a eliminar, editar, mover o cerrar cualquier tema en cualquier momento que lo creamos conveniente. Como usuario acuerda que cualquier información que haya ingresado será almacenada en una base de datos. Dado que esta información no será compartida con ninguna tercera parte sin su consentimiento, ni "sudominio.com" ni Eduardo podrán considerarse responsables por cualquier intento de hacking que conlleve a que los datos sean comprometidos.
</p>
</div>
<div id="div_enviar"><input type="submit" value="Estoy de acuerdo y deseo continuar" name="input_reg"/><input type="button" value="No estoy de acuerdo" /></div>
</form>
<?php else: ?>
<?php

$error = insertar_usuario($_POST['username'], $_POST['password1'], $_POST['password2'], $_POST['email'], $_POST['select_prov'], $_POST['sexo']);
echo $error;

?>
<script> window.setTimeout(function() {window.location = "redirect.php?errcode=0"}, 5000) </script>
<div id="redirect">
<h2>Registro completo</h2>
<p>Click <a href="#">aquí</a> si no eres redirigido en 5 segundos</p>
</div>
<?php endif; ?>
</div>
</div>
<?php
include("footer.php");
?>
</body>
</html>
<?php } ?>
