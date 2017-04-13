<?php 
include_once '../models/Admin.php'

if (isset($_POST)) {
	
	$edsname = $_POST["nameeds"];
	$iddepto = $_POST["selectdepto"];
	$latitud = $_POST["latitud"];
	$longitud = $_POST["longitud"];
	$idmay = $_POST["selectmay"];
	$idtypestation = $_POST["selecttypestation"];
	$sicom = $_POST["sicom"];
	$statepay = '';

	if(isset($_POST['statepay']) && $_POST['statepay']!="")
	{
	    $statepay = 'pago';
	}else {
		$statepay = 'nopago';
	}

	// echo $statepay;
	// echo "DATOS DE LA ESTACION: ";
	// echo $edsname.', '.$iddepto.', '.$latitud.', '.$longitud.', '.$idmay.', '.$idtypestation.', '.$sicom;
	$datastation[0] = array(
		'point('.$longitud.', '.$latitud.')',
		'"'.$edsname.'"',
		"NULL",
		'"'.$idtypestation.'"',
		"NULL",
		"NULL",
		"NULL",
		"NULL",
		'"'.$sicom.'"',





				);

	$dbinfo = array(
		'hostname' => 'localhost',
		'username' => 'juan',
		'password' => '123',
		'name' => 'juan_mieds',
		);

	$admin = new Admin($dbinfo);


	$admin->addStations()

	//echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";
}
