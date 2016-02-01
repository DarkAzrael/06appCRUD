/*
links de consulta
codigos estados HTTP request
http://es.wikipedia.org/wiki/Anexo:Códigos_de_estado_HTTP
http://librosweb.es/ajax/capitulo_7/metodos_y_propiedades_del_objeto_xmlhttprequest.html
mimes
http://es.wikipedia.org/wiki/Multipurpose_Internet_Mail_Extensions#MIME-Version
http://sites.utoronto.ca/webdocs/HTMLdocs/Book/Book-3ed/appb/mimetype.html
*/
//Declarar Constantes

var READY_STATE_COMPLETE = 4;
var OK = 200;

//Declarar Variables

var ajax = null;
var btnIns = document.querySelector("#insertar");
var pre = document.querySelector("#precarga");
var res = document.querySelector("#respuesta");

//Funciones

function objetoAJAX () {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else if (window.ActiveXObject){		
		return new ActiveXObject("Microsoft.XMLHTTP");
	};
}

function enviarDatos () {
	pre.style.display = "block";
	pre.innerHTML = "<img src='img/loader.gif' />";

	if (ajax.readyState == READY_STATE_COMPLETE) {
		if (ajax.status == OK) {
			pre.innerHTML = null;
			pre.style.display = "none";
			res.style.display = "block";
			res.innerHTML = ajax.responseText;
		} else{
		}
			console.log(ajax);
	};
}

function ejecutarAJAX (datos) {
	ajax = objetoAJAX();
	ajax.onreadystatechange = enviarDatos;
	ajax.open("POST", "controlador.php");
	ajax.setRequestHeader("Contten-Type", "application/x-www-form-urlencoded");
	ajax.send("trans=alta");
	//console.log(datos);
}

function altaHeroe (e) {
	e.preventDefault();
	var datos = "trans=alta";
	ejecutarAJAX(datos);
	console.log(e);
}

function alCargarDocumento () {
	btnIns.addEventListener("click", altaHeroe);
}

//Eventos

window.addEventListener("load", alCargarDocumento);