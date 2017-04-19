<?php 
include_once '../models/Admin.php';
if (isset($_POST)) {
	
	$name = $_POST["service"];
	$selecttype = $_POST["selecttype"];

	$dbinfo = array(
		'hostname' => 'localhost',
		'username' => 'juan',
		'password' => '123',
		'name' => 'juan_mieds',
		);

	$admin = new Admin($dbinfo);

	$service[0]  = array('"'.$name.'"','"'.$selecttype.'"');
	$addservice = $admin->addServices($service);
	echo "<meta http-equiv='refresh' content='0;URL=../addService.php' />";

}

?>
