<?php 

include_once "configDBpeaje.php";

if (isset($_POST)) {
	
	$name = $_POST["name"];
	$depto = $_POST["selectdepto"];
	$latitud = $_POST["latitud"];
	$longitud = $_POST["longitud"];
	$identidad = $_POST["selectenitdad"];
	$ubication = 'point('.$longitud.', '.$latitud.')';

	$I = $_POST["I"];
	$II = $_POST["II"];
	$III = $_POST["III"];
	$IV = $_POST["IV"];
	$V = $_POST["V"];
	$VI = $_POST["VI"];
	$VII = $_POST["VII"];

	//echo $name.', '.$depto.', '.$latitud.', '.$longitud.', '.$identidad.', '.$I.', '.$II.', '.$III.', '.$IV.', '.$V.', '.$VI.', '.$VII;

	
	$SqlID = 'SELECT * FROM peaje WHERE NOMBRE_PEAJE = "'.$name.'"';
	$resultValidate = $conn->query($SqlID);

	if ($resultValidate->num_rows > 0) {
		echo "Ya existe un peaje con ese nombre  ";
		echo "<a href='../addPeaje.php'>CONTINUAR...</a>";

	}else{
		$SqlPeaje = 'INSERT INTO peaje (ID_ENTIDAD, NOMBRE_PEAJE, 		UBICACION_PEAJE, ID_DEPARTAMENTO) VALUES('.$identidad.', "'.$name.'", '.$ubication.' ,"'.$depto.'");';
		$conn->query($SqlPeaje);

		$result = $conn->query($SqlID);

		$ID_PEAJE = '';

		while ($row=mysqli_fetch_assoc($result)) {
			$ID_PEAJE = $row["ID_PEAJE"];
		}
		
		if ($I!='') {
			$sqlInsertPrice = 'INSERT INTO precio (ID_CATEGORIA, ID_PEAJE, PRECIO) VALUES ( 62001,'.$ID_PEAJE.', '.$I.');';
			$conn->query($sqlInsertPrice);


		}if ($I!='') {
			$sqlInsertPrice = 'INSERT INTO precio (ID_CATEGORIA, ID_PEAJE, PRECIO) VALUES ( 62002,'.$ID_PEAJE.', '.$II.');';
			$conn->query($sqlInsertPrice);

		}if ($I!='') {
			$sqlInsertPrice = 'INSERT INTO precio (ID_CATEGORIA, ID_PEAJE, PRECIO) VALUES ( 62003,'.$ID_PEAJE.', '.$III.');';
			$conn->query($sqlInsertPrice);

		}if ($I!='') {
			$sqlInsertPrice = 'INSERT INTO precio (ID_CATEGORIA, ID_PEAJE, PRECIO) VALUES ( 62004,'.$ID_PEAJE.', '.$IV.');';
			$conn->query($sqlInsertPrice);

		}if ($I!='') {
			$sqlInsertPrice = 'INSERT INTO precio (ID_CATEGORIA, ID_PEAJE, PRECIO) VALUES ( 62005,'.$ID_PEAJE.', '.$V.');';
			$conn->query($sqlInsertPrice);

		}if ($I!='') {
			$sqlInsertPrice = 'INSERT INTO precio (ID_CATEGORIA, ID_PEAJE, PRECIO) VALUES ( 62006,'.$ID_PEAJE.', '.$VI.');';
			$conn->query($sqlInsertPrice);

		}if ($I!='') {
			$sqlInsertPrice = 'INSERT INTO precio (ID_CATEGORIA, ID_PEAJE, PRECIO) VALUES ( 62007,'.$ID_PEAJE.', '.$VII.');';
			$conn->query($sqlInsertPrice);
		}

		echo "<meta http-equiv='refresh' content='0;URL=../addPeaje.php' />";
	}
}
?>