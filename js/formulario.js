





// Devuelve la ID del radio marcado dentro de un grupo de radios cuya ID empiece por el parametro id seguido de _ y un número

function check_radio(id) {
	
	var n = 0;
	
	while (document.getElementById(id + "_" + n) != undefined) {
		if (document.getElementById(id + "_" + n).checked == true)
			break;
		
		n++;
	}
	
	return n;
}

// Devuelve un array con las ID de aquellos checkboxes marcados cuya ID empiece por el parametro id seguido de _ y un número

function check_checkbox(id) {
	
	var n = 0;
	var m = 0;
	var array_cb = [];
	
	while (document.getElementById(id + "_" + m) != undefined) {
		if (document.getElementById(id + "_" + m).checked == true) {
			array_cb[n] = (id + "_" + m);
			n++;
		}
		
		m++;
		
	}
	
	return array_cb;
}

// Provincias de España

function provincias() {
	
	return ["Álava", "Albacete", "Alicante", "Almería", "Ávila", "Badajoz", "Baleares (Illes)", "Barcelona", "Burgos", "Cáceres", "Cádiz", "Castellón", "Ceuta", "Ciudad Real", "Córdoba", "A Coruña", "Cuenca", "Girona", "Granada", "Guadalajara", "Guipúzcoa", "Huelva", "Huesca", "Jaén", "León", "Lleida", "La Rioja", "Lugo", "Madrid", "Málaga", "Melilla", "Murcia", "Navarra", "Ourense", "Asturias", "Palencia", "Las Palmas", "Pontevedra", "Salamanca", "Tenerife", "Cantabria", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza"];
	
}

// Dias de la semana

function dias() {
	return ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
}

// Meses del año

function meses() {
	return ["Enero", "Febrero" ,"Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
}

// Dado un conjunto de elementos 'array', devuelve un array de 'n' elementos de 'array' aleatorios sin repeticiones

function n_elementos_aleatorios(n, array) {
	
	var rnd_array = new Array();
	
	if (n <= array.length) {
		
		for (i = 0; i < array.length; i++) {
			
			var aleatorio = parseInt(Math.random()*n);
			
			while (rnd_array.indexOf(array[aleatorio]) != -1) {
			
				aleatorio = parseInt(Math.random()*n);
				
			}			
			
			rnd_array[i] = array[aleatorio];
			
		}
		
	}
	
	return rnd_array;
	
}


// Elemento aleatorio en conjunto de elementos 'array'

function elemento_aleatorio(array) {
	return array[parseInt(Math.random()*array.length)]
}


// Formatear numeros: devuelve "num" con tabulacion de "size" ceros

function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}


// Rellenar el combobox "cb" con los elementos de la matriz "valores", cuya primera dimension es el texto y la segunda el valor del atributo. "vacio" con valor true deja el primer elemento en blanco

function fill_cb(cb, valores, vacio) {
	
	var j = 0;
	
	if (vacio == true) { document.getElementById(cb).options[i] = new Option("",""); j=1; }
	
	for (var i = 0 + j; i < valores.length + j; i++) {
		
		document.getElementById(cb).options[i] = new Option(valores[i - j], i - j);
		
	}
	
}
