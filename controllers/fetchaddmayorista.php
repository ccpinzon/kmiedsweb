<?php 

if (isset($_POST)) {
	
	$branch = $_POST["branch"];
	$tel = $_POST["tel"];
	$web = $_POST["web"];
	


	echo $branch.', '.$tel.', '.$web;
}




?>
