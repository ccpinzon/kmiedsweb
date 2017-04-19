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
	 //echo "DATOS DE LA ESTACION: ";
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

	//echo var_dump($userNew);
	$userid = $user->getLastUserId();
	echo $userid;

	$datastation[0] = array(
		'point('.$longitud.', '.$latitud.')', // ubicacion
		'"'.$edsname.'"',
		"NULL",
		'"'.$idtypestation.'"',
		"NULL",
		"NULL",
		"NULL",
		"NULL",
		'"'.$sicom.'"',
		'"'.$statepay.'"',
		'"1"',
		'"'.$idmay.'"',
		'"'.$iddepto.'"',
		"NULL",
		"NULL",
		'"'.$userid.'"'
		);

	//$valueString = implode(", ",$datastation[0]);
	//echo $valueString;

	//echo var_dump($datastation[0]);

	 $admin = new Admin($dbinfo);
	 $validate = $admin->addStations($datastation);

	 $stationId = $admin->getLastStationId();


	 $productData[0] = array('"'.$stationId.'"',"200","0",'"'."D".'"');
	 $productData[1] = array('"'.$stationId.'"',"201","0",'"'."D".'"');
	 $productData[2] = array('"'.$stationId.'"',"202","0",'"'."D".'"');
	 $productData[3] = array('"'.$stationId.'"',"203","0",'"'."D".'"');

	 $addProduct = $admin->addProducts($productData);


	echo "<meta http-equiv='refresh' content='0;URL=../dashboard.php' />";
}
