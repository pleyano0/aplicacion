function ajax_object() { var xmlhttp=false;try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) { try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); } catch (E) { xmlhttp = false; }} if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {xmlhttp = new XMLHttpRequest(); } return xmlhttp;}

function consultar() {
	
	tb_usuario = document.getElementById("txt_usuario");
	tb_email = document.getElementById("txt_email");
	tb_sexo = document.getElementById("txt_sexo");
	tb_provincia = document.getElementById("txt_provincia");
	
	ajax = ajax_object();
	ajax.open("GET", "admin_process.php?action=modificar_usuario&usuario="+tb_usuario.value);
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4) {
			var datos = ajax.responseText.split("%%");
			tb_email.value = datos[0];
			tb_provincia.value = datos[1];
			tb_sexo.value = datos[2];
		}
	}	
	ajax.send(null);
}

function actualizar() {
	
	tb_usuario = document.getElementById("txt_usuario");
	tb_email = document.getElementById("txt_email");
	tb_sexo = document.getElementById("txt_sexo");
	tb_provincia = document.getElementById("txt_provincia");
	
	ajax = ajax_object();
	ajax.open("GET", "admin_process.php?action=actualizar_usuario&usuario="+tb_usuario.value + "&email=" + tb_email.value + "&sexo=" + tb_sexo.value + "&provincia=" + tb_provincia.value);
	ajax.send(null);
}