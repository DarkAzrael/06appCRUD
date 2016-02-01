<?php require 'vista.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>..::Aplicación CRUD Super Héroes::..</title>
	<meta name="description" content="Aplicación CRUD (Create-Read-Update-Delete) con filosofia MVC desarrollada en PHP MySQL y AJAX">
	<link rel="stylesheet" type="text/css" href="css/super-heroes.css">
</head>
<body>
	<header id="cabecera">
		<h1>Super Héroes</h1>
		<div><img src="img/super-heroes.png" alt="Super Héroes"></div>
		<a href="#" id="insertar">Insertar</a>
	</header>
	<section id="contenido">
		<div id="respuesta"></div>
		<div id="precarga"></div>
		<?php mostrarHeroes(); ?>
	</section>
	<script src="js/super-heroes.js"></script>
</body>
</html>