<?php 
include_once '../models/Admin.php';
include_once '../models/User.php';

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
	    $statepay = '1';
	}else {
		$statepay = '0';
}

	// echo $statepay;
	// echo "DATOS DE LA ESTACION: ";
	// echo $edsname.', '.$iddepto.', '.$latitud.', '.$longitud.', '.$idmay.', '.$idtypestation.', '.$sicom;
	$dbinfo = array(
		'hostname' => 'localhost',
		'username' => 'juan',
		'password' => '123',
		'name' => 'juan_mieds',
		);

	$user = new User($dbinfo);
	$userbool = $user->addUser();
	$userNew = $user->getNewUser();

	echo var_dump($userNew);

	// $datastation[0] = array(
	// 	'point('.$longitud.', '.$latitud.')',
	// 	'"'.$edsname.'"',
	// 	"NULL",
	// 	'"'.$idtypestation.'"',
	// 	"NULL",
	// 	"NULL",
	// 	"NULL",
	// 	"NULL",
	// 	'"'.$sicom.'"',
	// 	'"'.$statepay.'"',
	// 	'"1"',
	// 	'"'.$idmay.'"',
	// 	'"'.$iddepto.'"',
	// 	"NULL",
	// 	"NULL",






	// 			);


	// $admin = new Admin($dbinfo);


	// $admin->addStations()

	//echo "<meta http-equiv='refresh' content='0;URL=../editstation.php' />";
}
