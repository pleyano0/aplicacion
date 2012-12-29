function about() {
	
	var alerta = document.createElement("div");
	alerta.setAttribute("id", "about");
	document.body.appendChild(alerta);
	
	var bloque = document.createElement("div");
	bloque.setAttribute("id", "mensaje");
	alerta.appendChild(bloque);
	
	bloque.innerHTML = "Copyright &copy; All Rights Reserved<br />Eduardo Páez - 2013<br /><a href='javascript:;' onClick='document.body.removeChild(document.getElementById(\"about\"));' style='color:blue;'>Cerrar</a>";
	
}