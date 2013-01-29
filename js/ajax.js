function ajax_object() { var xmlhttp=false;try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) { try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); } catch (E) { xmlhttp = false; }} if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {xmlhttp = new XMLHttpRequest(); } return xmlhttp;}

function consultar() {
	
	tb_usuario = document.getElementById("txt_usuario");
	tb_email = document.getElementById("txt_email");
	tb_sexo = document.getElementById("txt_sexo");
	tb_provincia = document.getElementById("txt_provincia");
	tb_rol = document.getElementById("txt_rol");
	tb_avatar = document.getElementById("txt_avatar");
	
	ajax = ajax_object();
	ajax.open("GET", "admin_process.php?action=modificar_usuario&usuario="+tb_usuario.value);
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4) {
			var datos = ajax.responseText.split("%%");
			tb_email.value = datos[0];
			tb_provincia.value = datos[1];
			tb_sexo.value = datos[2];
			tb_rol.value = datos[3];
			tb_avatar.value = datos[4];
		}
	}	

	ajax.send(null);
}

function actualizar_usuario() {
	
	tb_usuario = document.getElementById("txt_usuario");
	tb_email = document.getElementById("txt_email");
	tb_sexo = document.getElementById("txt_sexo");
	tb_provincia = document.getElementById("txt_provincia");
	tb_rol = document.getElementById("txt_rol");
	tb_avatar = document.getElementById("txt_avatar");
	
	ajax = ajax_object();
	ajax.open("GET", "admin_process.php?action=actualizar_usuario&usuario="+tb_usuario.value + "&email=" + tb_email.value + "&sexo=" + tb_sexo.value + "&provincia=" + tb_provincia.value + "&rol=" + tb_rol.value + "&avatar=" + tb_avatar.value);
	ajax.send(null);
}

function insertar_usuario() {
	
	tb_usuario = document.getElementById("txt_usuario1");
	tb_email = document.getElementById("txt_email1");
	tb_sexo = document.getElementById("txt_sexo1");
	tb_provincia = document.getElementById("txt_provincia1");
	tb_rol = document.getElementById("txt_rol1");
	tb_avatar= document.getElementById("txt_avatar1");
	tb_contrasena = document.getElementById("txt_contrasena1");
	
	ajax = ajax_object();
	ajax.open("GET", "admin_process.php?action=insertar_usuario&usuario="+tb_usuario.value + "&email=" + tb_email.value + "&sexo=" + tb_sexo.value + "&provincia=" + tb_provincia.value + "&contrasena=" + tb_contrasena.value + "&avatar=" + tb_avatar.value + "&rol=" + tb_rol.value);
	ajax.send(null);
}

function insertar_carrera() {
	
	tb_carrera = document.getElementById("txt_carrera0");
	tb_piloto = document.getElementById("txt_piloto0");
	tb_posini = document.getElementById("txt_posini0");
	tb_posfin = document.getElementById("txt_posfin0");
	tb_tiempo = document.getElementById("txt_mejortiempo0");
	tb_vueltas = document.getElementById("txt_vueltas0");
	
	ajax = ajax_object();
	ajax.open("GET", "admin_process.php?action=insertar_carrera&carrera="+tb_carrera.value+ "&piloto=" + tb_piloto.value + "&posini=" + tb_posini.value + "&posfin=" + tb_posfin.value + "&tiempo=" + tb_timepo.value + "&vueltas=" + tb_vueltas.value);
	ajax.send(null);
}

function cambiar(n) {
	var divs = document.getElementById("admin_panel").getElementsByTagName("div");	
	for (var i = 0; i < divs.length; i++) {
		divs[i].style.display = 'none';
	}
	divs[n].style.display = 'block';

	
}
function consultar_carrera() {
	
	tb_carrera = document.getElementById("txt_carrera1");
	tb_piloto = document.getElementById("txt_piloto1");
	tb_posini= document.getElementById("txt_posini1");
	tb_posfin = document.getElementById("txt_posfin1");
	tb_tiempo = document.getElementById("txt_mejortiempo1");
	tb_vueltas = document.getElementById("txt_vueltas1");
	
	ajax = ajax_object();
	ajax.open("GET", "admin_process.php?action=consultar_carrera&carrera="+tb_carrera+"&piloto=" +tb_piloto.value);
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4) {
			var datos = ajax.responseText.split("%%");
			tb_email.value = datos[0];
			tb_provincia.value = datos[1];
			tb_sexo.value = datos[2];
			tb_rol.value = datos[3];
			tb_avatar.value = datos[4];
		}
	}	

	ajax.send(null);
}