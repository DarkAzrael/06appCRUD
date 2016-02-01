<?php
	require_once 'conexion.php';

	function listaEditoriales(){
		//
	}

	function altaHeroe(){
		$fmr = "<form id='altaHeroe' class='frm' data-insertar>";
			$fmr .= "<fieldset>";
				$fmr .= "<legeng>Alta de Super Héroe</legend>";				
				$fmr .= "<div>"; //$fmr .= "<>";
					$fmr .= "<label for='nom'>Nonbre:</label>";
					$fmr .= "<input type='text' id='nom' name='txtNom' required/>";
				$fmr .= "</div>";
					$fmr .= "<label for='img'>Imagen:</label>";
					$fmr .= "<input type='text' id='img' name='txtImg' required/>";
				$fmr .= "<div>";
					$fmr .= "<label for='dscr'>Descripción:</label>";
					$fmr .= "<textarea id='dscr' name='txaDscr' required></textarea>";
				$fmr .= "</div>";
				$fmr .= "<div>";
					$fmr .= "<label for='edit'>Editorial:</label>";
					$fmr .= listaEditoriales();
				$fmr .= "</div>";
				$fmr .= "<div>";
					$fmr .= "<input type='submit' id='btnIns' name='btmIns' value='Insertar'/>";
					$fmr .= "<input type='hidden' id='trans' name='transaccion' value='insertar'/>";
				$fmr .= "</div>";
			$fmr .= "</fieldset>";
		$fmr .= "</form>";

		return printf($frm);
	}

	function catslogoEditoriales(){
		$edit = Array();
		$con = conexionMySQL();
		$sql = "SELECT * FROM editorial";

		if ($res = $con->query($sql)) {
			while ($fila = $res->fetch_assoc()) {
				$edit[$fila["idEditorial"]] = $fila["editorial"];
			}
			$res->free();
		}
		$con->close();
		return $edit;
	}

	function mostrarHeroes(){
		$edit = catslogoEditoriales();
		$con = conexionMySQL();
		$sql = 'SELECT * FROM heroes ORDER BY idHeroe DESC';

		if ($res = $con->query($sql)) {
				if (mysqli_num_rows($res )== 0) {
					$resp = "<div class='error'>Error: No existe registro de super héroes. La Base de Datos esta vacia.<div>";
				} else{
					$table = "<table id='tabla-heroes' class='tabla'>";
					$table .= "<thead>";				
						$table .= "<tr>";				
							$table .= "<th>ID</th>";	
							$table .= "<th>Nombre</th>";	
							$table .= "<th>Imagen</th>";	
							$table .= "<th>Descripción</th>";	
							$table .= "<th>Editorial</th>";	
							$table .= "<th colspan=2>Opciones</th>";
						$table .= "</tr>";
					$table .= "</thead>";
					$table .= "<tbody>";
					while ($fila = $res->fetch_assoc()) {									
						$table .= "<tr>";
							$table .= "<td>". $fila["idHeroe"] . "</td>";	
							$table .= "<td><h2>". $fila["nombre"] . "</h2></td>";	
							$table .= "<td><img src='img/". $fila["imagen"] . "' class='imgR'/></td>";	
							$table .= "<td><p>". $fila["descripcion"] . "</p></td>";	
							$table .= "<td><h3>". $edit[$fila["editorial"]] . "</h3></td>";
							$table .= "<td class='edit'>Editar &#x270e;</td>";
							$table .= "<td class='del'>Eliminar &#x2718;</td>";	
						$table .= "</tr>";
					}
					$res->free();
					$table .= "</tbody>";
				$table .= "</table>";
				$resp = $table;
				}
		} else {
			$resp = "<div class='error'>Error: No se ejecuto la consulta a la Base de Datos<div>";
		}
		$con->close();
		return printf($resp);
	}
?>