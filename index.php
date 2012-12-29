<?php
include_once("funciones.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />
    <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/bjqs-1.3.min.js" type="text/javascript"></script>

    <script>
		jQuery(document).ready(function(jQuery) {
		
			$('#banner-fade').bjqs({
			height      : 450,
			width       : 965,
			responsive  : true,
			showcontrols: false,
			showmarkers : false,
			usecaptions : false,
			randomstart : true,
			hoverpause  : false		
			});
		
		});
    </script>

</head>

<body>

<?php include("login.php"); ?>
<?php
include("header.php");
?>
<div id="contenedor">
<?php include("menu.php"); ?>
<div id="index_contenido">

      <div id="banner-fade">

        <ul class="bjqs">
          <li><img src="images/backindex.jpg" /></li>
          <li><img src="images/back.jpg" /></li>
          <li><img src="images/backindex3.jpg" /></li>
          <li><img src="images/vuela.jpg" /></li>
        </ul>

      </div>

</div>
</div>

<?php
include("footer.php");
?>
</body>
</html>
