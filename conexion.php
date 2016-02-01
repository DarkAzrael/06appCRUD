<?php
	//http://php.net/manual/es/
	require_once 'config.php';

	function conexionMySQL(){
		$conexion = new mysqli(SERVER,USER,PASS,BD);
		if ($conexion->connect_errno) {
			$error = "<div class='error'>";
				$error .= "Error de conexión Nº <b>" . $conexion->connect_errno . "</b> Mensaje del error: <mark>" . $conexion->connect_error . "</mark>";
			$error .= "</div>";

			die($error);
		} else {
			//$formato = "<div class='mensaje'>Conexión exitosa: <b>%s</b></div>";
			//printf($formato, $conexion->host_info);
		}
		
		//$conexion->query("SET CARACTER SET UTF8");
		$conexion->query("SET CHARACTER SET UTF8");
		return $conexion;
	}
	//conexionMySQL();
?>