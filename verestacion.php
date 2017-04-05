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
    $idest = $_POST['idest']; //Contains the string "My value"
    //Do something with your POST
    
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

    <nav>
        <div class="nav-wrapper #00838f cyan darken-3">
            <a href="#!" class="brand-logo center">Mi EDS App</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="dashboard.php"><i class="material-icons left">home</i>Inicio</a></li>
                <li><a href="controllers/logout.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="dashboard.php"><i class="material-icons right">home</i>Inicio</a></li>
                <li><a href="controllers/logout.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>

    <!--fin-nav-bar-->

<!--     <div class="row">
    	<div class="col s12 l12">
    		<div class="card">
    			<div class="card-content">
    				
    				<?php 

    					echo '<span class="card-title">'.$idest.'</span>';
    					// <p>I am a very simple card. I am good at containing small bits of information.
    					// I am convenient because I require little markup to use effectively.</p>
    				 ?>

    				 
					    <div class="card-action">
    					<div class="right">
	    					<button class="btn waves-effect waves-light" type="submit" name="action">Editar
	    						<i class="material-icons right">mode_edit</i>
	  						</button>  
  						</div>      
    					</div>

					  </div>


    			</div>
    				
    		</div>
    	</div>
    </div> -->
   
<div class="container">

	<div id="basic-form" class="section">
		<div class="row">
			<div class="col s12 m4 l12">
				<div class="card-panel">
					<h4 class="header2">Datos de la estacion <?php echo $idest; ?></h4>
					<div class="row">
						<form class="col s12">
							<div class="row">
								<div class="input-field col s6">
									<input id="name" type="text">
									<label for="first_name">Name</label>
								</div>
								<div class="input-field col s6">
									<input id="name" type="text">
									<label for="first_name">Name2</label>
								</div>
							</div>
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
<main></main>
 <footer class="page-footer #00838f cyan darken-3">
          <div class="container">
            <div class="row">
              <div class="col l6 m12">
                <h5 class="white-text">Mi eds App</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 m12">
                <h5 class="white-text">Redes Sociales</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 KnowLine S.A.S
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>

<!--fin footer-->


<!--imports js-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
<!--fin imports js-->
    <!--nav lateral responsivo-->
    <script>
        $(document).ready(function () {

            $(".button-collapse").sideNav();

        })
    </script>

    <!--fin nav lateral responsivo-->
</body>

</html>