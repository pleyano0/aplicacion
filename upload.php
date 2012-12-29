<?php
include_once("funciones.php");
if (!autenticado()) { 
			header("Location: redirect.php?src=upload.php");
} else { 
?>

aqui se hace el upload y tal


<?php } ?>