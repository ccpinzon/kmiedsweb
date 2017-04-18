	<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Bienvenido! " . $_SESSION['username'];
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='login.php'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='login.php'>Necesita Hacer Login</a>";
exit;
}
?>


<?php
include_once "controllers/config.php";;
	if(isset($_POST)){
		// id de la estacion
	    $idest = $_POST['idest']; 

		$sql = 'SELECT * FROM estaciones WHERE id_estacion ='.$idest.'';  
		$sqlDptos = 'SELECT * FROM departamento';
		$sqlMayoristas = 'SELECT id_mayorista,marca_mayorista FROM mayorista ORDER by 1';
		//id,nombre -> CUN,CUNDIMARCA
	}

?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Estacion #<?php echo $idest; ?> Admins - Mi Eds App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <meta charset="utf-8">
</head>

<body>
    <!--nav-bar-->

<?php 
	include 'helpers/nav.php';
 ?>
   
<div class="container">

	<div id="basic-form" class="section">
		<div class="row">
			<div class="col s12 m4 l12">
				<div class="card-panel">
					<h4 class="header2">Datos de la estacion <?php echo $idest; ?></h4>
					<div class="row">
						<form class="col s12">
							

							<?php 
								//TRAER DEPARTAMENTOS
								$deptos = array();

								$resDeptos = $conn->query($sqlDptos);
								while ($row = mysqli_fetch_assoc($resDeptos)) {
									// lista de departamentos
									$deptos[$row["id_departamento"]] = $row["nombre_departamento"];
								}
								//echo var_dump($deptos['AMA']);
								//traermayoristas
								$arraymayoristas = array();
								$resMayoristas = $conn->query($sqlMayoristas);
								while ($row = mysqli_fetch_assoc($resMayoristas)) {
									$arraymayoristas[$row["id_mayorista"]] = $row["marca_mayorista"];
								}
								

								// DATOS DE LA ESTACION
								$result = $conn->query($sql);
								$out ='';
								if (mysqli_num_rows($result) > 0 ) {

									while ($row = mysqli_fetch_array($result)) {
										
										$nombre = $row["nombre_estacion"];
										$depto = $row["departamento_id_departamento"];// id departamento de la estacion
										$lat = $row["latitud_estacion"];
										$lon = $row["longitud_estacion"];
										$desc = $row["descripcion_estacion"];

										$tipoest = ($row["tipo_estacion"] === 'U') ? 'Urbana' : 'Rural';							
										$tipoestArray = array('Urbana','Rural');

										$telf = $row["tel_fijo_estacion"];
										$telm = $row["tel_movil_estacion"];
										$direc = $row["direccion_estacion"];
										$pago = $row["pago_estacion"];
										$estado = $row["estado_estacion"];
										$fecha = $row["fecha_registro_estacion"];
										$mayorista = $row["mayorista_id_mayorista"];
										$usuario = $row["usuario_id_usuario"];



										
										

										// fila 1
										$out .= '<div class="row">';

											$out .= '<div class="input-field col s6">
														<input id="name" value="'.$nombre.'" type="text">
														<label>Nombre</label>
													</div>
													';
											// deptos
											$out .= '<div class="input-field col s6">														
														<select>
														<option value="" disabled selected>Seleccione una opcion</option>';
														
											foreach ($deptos as $iddep => $nomdep) {
												$selected = ($depto === $iddep) ? 'selected="selected"' : '';
												$out .= '<option '.$selected.'>'.$nomdep.'</option>';
											}
								

											$out .=	'</select>	
													<label>Departamento</label>													
													</div>

												';
												// fin deptos
											$out .= '</div>';
											

										//fila 2
										$out .= '<div class="row">';

											$out .= '<div class="input-field col s6">
														<input id="name" value="'.$lat.'" type="text" 
														onkeypress="return event.charCode >= 45 && event.charCode <= 57">
														<label>Latitud</label>
													</div>
													';
											$out .= '<div class="input-field col s6">
														<input id="name" value="'.$lon.'" type="text" 
														onkeypress="return event.charCode >= 45 && event.charCode <= 57">
														<label>Longitud</label>
													</div>
												';
										$out .= '</div>';

										//fila 3
										$out .= '<div class="row">';

											$out .= '<div class="input-field col s6">														
														<select>
														<option value="" disabled selected>Seleccione una opcion</option>';
														
														foreach ($tipoestArray as $numtipoest => $tipoest_arr) {
															$selected = ($tipoest === $tipoest_arr) ? 'selected="selected"' : '';
															$out .= '<option '.$selected.'>'.$tipoest_arr.'</option>';
														}
								

											$out .=	'</select>	
													<label>Tipo Estacion</label>													
													</div>

												';
											
											


												//mayoristas
											$out .= '<div class="input-field col s6">														
														<select>
														<option value="" disabled selected>Seleccione una opcion</option>';
														
											foreach ($arraymayoristas as $idmay => $marca) {
												$selected = ($mayorista == $idmay) ? 'selected="selected"' : '';
												$out .= '<option '.$selected.'>'.$marca.'</option>';
											}
								

											$out .=	'</select>	
													<label>Mayorista</label>													
													</div>

												';
												// fin mayoristas
											$out .= '</div>';

											// fila 4

											$out .= '<div class="row">';
											$telm = ($telm === "NULL") ? "" : $telm;
											$out .= '<div class="input-field col s6">
														<input id="name" value="'.$telm.'" type="tel" >
														<label>Telefono Movil</label>
													</div>
													';
											

											$telf = ($telf === "NULL") ? "" : $telf; 
											$out .= '<div class="input-field col s6">
														<input id="name" value="'.$telf.'" type="tel" >
														<label>Telefono Fijo</label>
													</div>
												';
											$out .= '</div>';

											// fila 5
											$checkedpago = ($pago == 1) ? 'checked="checked"' : '';

											$out .= '<div class="row">';
											$out .= '<div class="input-field col s3">
														<input type="checkbox" class="filled-in" id="boxpago" '.$checkedpago.' />
      													<label for="boxpago">Pagada</label>
													</div>
													';
											$checkedestado = ($estado == 1) ? 'checked="checked"' : '';

											$out .= '<div class="input-field col s3">
														<input type="checkbox" class="filled-in" id="boxestado" '.$checkedestado.' />
      													<label for="boxestado">Activada</label>
													</div>
													';
											$out .= '<div class="input-field col s6">
														<input disabled id="name" value="'.$fecha.'" type="text" >
														<label>Fecha de Registro</label>
													</div>
												';
											$out .= '</div>';

											// fila 6
											
											
											$direc = ($direc === "NULL") ? "" : $direc; 
											$out .= '<div class="input-field col s6">
														<input id="name" value="'.$direc.'" type="text" >
														<label>Direccion</label>
													</div>
												';
											
											
											
											$out .= '<div class="input-field col s6">
														<input id="name" value="'.$usuario.'" type="text" onkeypress="return event.charCode >= 47 && event.charCode <= 57">
														<label>ID Usuario dueño </label>
													</div>
												';
											$out .= '</div>';


										// fila de textarea									
										$desc = ($desc === "NULL") ? "" : $desc; 
										$out .='<div class="input-field col s12">
													<textarea id="textarea1" class="materialize-textarea">'.$desc.'</textarea>
	          										<label>Descripcion de la estacion</label>
												</div>';




									}
									echo $out;
								}
								// FIN DATOS ESTACION

							 ?>
							


							<!-- 	<div class="input-field col s6">
									<input id="name" type="text">
									<label for="first_name">Name</label>
								</div>
								<div class="input-field col s6">
									<input id="name" type="text">
									<label for="first_name">Name2</label>
								</div> -->

							
								<div class="row">
									<div class="input-field col s12">
										<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
											Editar
											<i class="material-icons right">mode_edit</i>
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--footer-->
<?php 
	
	include 'helpers/footer.php';

 ?>
<!--fin footer-->


<!--imports js-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
<!--fin imports js-->
    <!--nav lateral responsivo-->
    <script>
        $(document).ready(function () {

            $(".button-collapse").sideNav();
            $('select').material_select();
  			$('#textarea1').trigger('autoresize');

        })
    </script>

    <!--fin nav lateral responsivo-->
</body>

</html>