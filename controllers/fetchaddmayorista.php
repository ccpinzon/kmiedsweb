<?php 
include_once '../models/Admin.php';
if (isset($_POST)) {
	
	$branch = $_POST["branch"];
	$tel = $_POST["tel"];
	$web = $_POST["web"];
	//echo $branch.', '.$tel.', '.$web;

	$dbinfo = array(
		'hostname' => 'localhost',
		'username' => 'juan',
		'password' => '123',
		'name' => 'juan_mieds',
		);

	$admin = new Admin($dbinfo);

// $productData[0] = array('"'.$stationId.'"',"200","0",'"'."D".'"');
	$mayorista[0]  = array('"'.$branch.'"','"'.$tel.'"','"'.$web.'"');
	$addMayorista = $admin->addSuppliers($mayorista);
	echo "<meta http-equiv='refresh' content='0;URL=../addmayorista.php' />";



}




?>
