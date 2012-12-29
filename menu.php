<script src="js/main.js" type="text/javascript"></script>
<div id="menu">
<ul>
<li><a href="index.php">Inicio</a></li>
<li><a href="p_clasif.php">Clasificación de pilotos</a></li>
<li><a href="e_clasif.php">Clasificación de constructores</a></li>
<li><a href="javascript:about();">Acerca de</a></li>
<?php if (!autenticado()): ?>
<li><a href="admin/admin.php">Administración</a></li>
<?php endif; ?>
<?php if (autenticado()): ?>
<li><a href="perfil.php">Perfil de usuario</a></li>
<?php endif; ?>
</ul>
</div>
