<?php
	include_once("funciones.php");
	if (!isset($_SESSION))
		session_start();
	if (isset($_POST['btn_submit'])) {
		if ($user = login($_POST['user_id'], $_POST['user_pass'])) {
			if (isset($_GET['src'])) {
				header("Location: ".$_GET['src']);
			} else {
				header("Location: index.php");
			}

		} else {
			header("Location: redirect.php?errcode=1");
		}
	}
?>
		<div id="login">
			<?php if (!autenticado()): ?>
            
			<form action="login.php" method="post">

				Usuario: <input type="text" name="user_id" id="user_id" /> Contraseña: <input type="password" name="user_pass" id="user_pass" /> <input type="submit" name="btn_submit" id="btn_submit" value="Entrar" />
			</form>
			<span><a href="registro.php">Registrarse</a></span>
			<?php else: ?>
			<span>Bienvenido, <?php echo $_SESSION['user']; ?>. <a href="logout.php">Salir</a></span>
			<?php endif; ?>
		</div>

