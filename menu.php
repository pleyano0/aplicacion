<script src="js/main.js" type="text/javascript"></script>
<div id="menu">
<ul>
<li><a href="./">Inicio</a></li>
<li><a href="p_clasif.php">Clasificación de pilotos</a></li>
<li><a href="e_clasif.php">Clasificación de equipos</a></li>
<li><a href="carreras.php">Carreras</a></li>
<?php if (superusuario()): ?>
<li><a href="admin.php">Administración</a></li>
<?php endif; ?>
<?php if (autenticado()): ?>
<li><a href="perfil.php">Perfil de usuario</a></li>
<?php endif; ?>
<li><a href="javascript:about();">Acerca de</a></li>
</ul>
</div>
