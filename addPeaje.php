<?php
include_once "controllers/configDBpeaje.php"
?>
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
include_once "controllers/configDBpeaje.php";
	if(isset($_POST)){
   
	 $sqlDptos  = 'SELECT * FROM departamento order by 2';
	 $resultDeptos = $conn->query($sqlDptos) or die('Consulta fallida: '.mysql_error());

	 $sqlEntidad  = 'SELECT * FROM entidad';
	 $resultEntidad = $conn->query($sqlEntidad) or die('Consulta fallida: '.mysql_error());
	 
	}


?>

<?php

$PageTitle="Agregar Peaje";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
include_once('helpers/nav.php');

//body contents go here
?>
  
<!-- card panel agregar estacion -->

 <div id="basic-form" class="section">
	<div class="row">
		<div class="col l6 offset-l3">
			<div class="card-panel">
				<form action="controllers/fetchaddpeaje.php" method="post">
					<blockquote class="flow-text">
						DATOS DEL PEAJE 
					</blockquote>
					<!-- FILA 0 -->
					<div class="row">
						<div class="input-field col s4">
							<input id="name" name="name" value="" type="text" required>
							<label>Nombre</label>
						</div>
						
						 <div class="input-field col s4">

								<select id="selectdepto" name="selectdepto" required>                                    
									<option value="" disabled selected>Seleccione una opcion</option>
									
									<?php 

										while ($row = mysqli_fetch_assoc($resultDeptos) ) {
											echo '<option value="'.$row["ID_DEPARTAMENTO"].'">'.$row["DEPARTAMENTO"].'</option>';
											//echo var_dump($row);
										}
									 ?>								
								</select> 
								<label>Departamento</label>
							</div>	

							 <div class="input-field col s4">

								<select id="selectenitdad" name="selectenitdad" required>                                    
									<option value="" disabled selected>Seleccione una opcion</option>
									
									<?php 

										while ($row = mysqli_fetch_assoc($resultEntidad) ) {
											echo '<option value="'.$row["ID_ENTIDAD"].'">'.$row["ENTIDAD"].'</option>';
											//echo var_dump($row);
										}
									 ?>								
								</select> 
								<label>Entidad</label>
							</div>	
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="latitud" name="latitud" value="" type="text" required  onkeypress="return event.charCode >= 45 && event.charCode <= 57">
							<label>Latitud</label>
						</div>
						<div class="input-field col s6">
							<input id="longitud" name="longitud" value="" type="text" required  onkeypress="return event.charCode >= 45 && event.charCode <= 57">
							<label>Longitud</label>
						</div>
					</div>

					<!--TITULO PRECIOS -->
					<div class="row">
						<div class="input-field col s6">
							<blockquote class="flow-text">
								PRECIOS
							</blockquote>
						</div>
					</div>

					<!--CAMPOS DE TEXTO, AGREGAR PRECIO A CADA CATEGORIA -->
					<div class="row">
						<div class="input-field col s4">
							<input id="I" name="I" value="" type="text"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
							<label>CATEGORIA I</label>
						</div>
						<div class="input-field col s4">
							<input id="II" name="II" value="" type="text"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
							<label>CATEGORIA II </label>
						</div>
						<div class="input-field col s4">
							<input id="III" name="III" value="" type="text"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
							<label>CATEGORIA III </label>
						</div>

						<div class="input-field col s4">
							<input id="IV" name="IV" value="" type="text"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
							<label>CATEGORIA IV</label>
						</div>
						<div class="input-field col s4">
							<input id="V" name="V" value="" type="text"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
							<label>CATEGORIA V </label>
						</div>
						<div class="input-field col s4">
							<input id="VI" name="VI" value="" type="text"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
							<label>CATEGORIA VI </label>
						</div>
						<div class="input-field col s4">
							<input id="VII" name="VII" value="" type="text"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
							<label>CATEGORIA VII </label>
						</div>
					</div>
					

					<!-- BOTON AGREGAR  -->
					<div class="row">
						<div class="input-field col s12">
							<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
								Agregar Peaje
								<i class="material-icons right">send</i>
							</button>
						</div>
					</div>
				</div>		
				</form>
			</div>
		</div>  
	</div>
</div>

<?php 
	$listPeaje = 'SELECT * FROM listar_peajes';
	$resultPeajes = $conn->query($listPeaje) or die('Consulta fallida: '.mysql_error());
 ?>


<div id="basic-form" class="section">
	<div class="row">
		<div class="col l10 offset-l1">
			<div class="card-panel">
			<table class="striped">
				<thead>
					<tr>
						<th>
							Departamento
						</th>
						<th>
							Peaje
						</th>
						<th>
							Coordenadas
						</th>
						<th>
							Categoria I
						</th>
						<th>
							Categoria II
						</th>
						<th>
							Categoria III
						</th>
						<th>
							Categoria IV
						</th>
						<th>
							Categoria V
						</th>
						<th>
							Categoria VI
						</th>
						<th>
							Categoria VII
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$out = '';

					while ($row = mysqli_fetch_assoc($resultPeajes) ) {
						
						$coord = $row["latitud"].', '.$row["longitud"];

						$out .= '<tr>
									<td>'.$row["DEPARTAMENTO"].'</td>
									<td>'.$row["NOMBRE_PEAJE"].'</td>
									<td>'.$coord.'</td>
									<td>'.$row["cat_I"].'</td>
									<td>'.$row["cat_II"].'</td>
									<td>'.$row["cat_III"].'</td>
									<td>'.$row["cat_IV"].'</td>
									<td>'.$row["cat_V"].'</td>
									<td>'.$row["cat_VI"].'</td>
									<td>'.$row["cat_VII"].'</td>
								</tr>';
						}
					echo $out;
					?>

				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>





<!--imports js-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
<!--fin imports js-->
	<!--nav lateral responsivo-->
	<script>
		$(document).ready(function () {

			$(".button-collapse").sideNav();
			$('select').material_select();
			$("select[required]").css({display: "inline", height: 0, padding: 0, width: 0});

		})
	</script>

 
</body>

</html>
<?php
include_once('helpers/footer.php');
?>