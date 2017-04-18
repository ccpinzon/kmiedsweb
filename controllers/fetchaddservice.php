<?php 

if (isset($_POST)) {
	
	$service = $_POST["service"];
	$selecttype = $_POST["selecttype"];

	echo $service.', '.$selecttype;
}




?>
