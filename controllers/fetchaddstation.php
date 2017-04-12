<?php 


if (isset($_POST)) {
	
	$edsname = $_POST["nameeds"];
	$iddepto = $_POST["selectdepto"];
	$latitud = $_POST["latitud"];
	$longitud = $_POST["longitud"];
	$idmay = $_POST["selectmay"];
	$idtypestation = $_POST["selecttypestation"];
	$sicom = $_POST["sicom"];

	echo "DATOS DE LA ESTACION: ";
	echo $edsname.', '.$iddepto.', '.$latitud.', '.$longitud.', '.$idmay.', '.$idtypestation.', '.$sicom;

	

	//echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";
}
