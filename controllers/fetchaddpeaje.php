<?php 
if (isset($_POST)) {
	
	$name = $_POST["name"];
	$depto = $_POST["selectdepto"];
	$latitud = $_POST["latitud"];
	$longitud = $_POST["longitud"];

	$I = $_POST["I"];
	$II = $_POST["II"];
	$III = $_POST["III"];
	$IV = $_POST["IV"];
	$V = $_POST["V"];
	$VI = $_POST["VI"];
	$VII = $_POST["VII"];

	
	echo $name.', '.$depto.', '.$latitud.', '.$longitud.', '.$I.', '.$II.', '.$III.', '.$IV.', '.$V.', '.$VI.', '.$VII;
}
