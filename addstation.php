<?php
include_once "controllers/config.php"
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
include_once "controllers/config.php";;
    if(isset($_POST)){
   
        $sqlDptos = 'SELECT * FROM departamento';
        $sqlMays  = 'SELECT id_mayorista,marca_mayorista FROM mayorista ORDER BY 1';
        }
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Admins - Mi Eds App</title>
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


<!-- card panel agregar estacion -->


<?php 
    //TRAER DEPARTAMENTOS
$deptos = array();

$resDeptos = $conn->query($sqlDptos);
while ($row = mysqli_fetch_assoc($resDeptos)) {
    // lista de departamentos
    $deptos[$row["id_departamento"]] = $row["nombre_departamento"];
    //
}

// traer mayoristas
$mays = array();

$resMays = $conn->query($sqlMays);

while ($row = mysqli_fetch_assoc($resMays)) {

    $mays[$row["id_mayorista"]] = $row["marca_mayorista"];

}


 ?>

<div class="container">
    <div id="basic-form" class="section">
        <div class="row">
            <div class="col s12 m4 l12">
                <div class="card-panel">
                    <form action="controllers/fetchaddstation.php" method="post">
                            <blockquote class="flow-text">
                                Datos de la estacion 
                            </blockquote>

                        <input type="hidden" name="idest" value="<?php echo $idest; ?>"/>

                        <!-- FILA 1 -->

                        <div class="row">
                           <div class="input-field col s6">
                                <input id="nameeds" name="nameeds" value="" type="text" />
                                <label>Nombre de la EDS</label>
                            </div>
                            <div class="input-field col s6">

                                <select id="selectdepto" name="selectdepto">                                    
                                    <option value="" disabled selected>Seleccione una opcion</option>
                                    <?php 
                                        foreach ($deptos as $iddep => $nomdep) {
                                            echo '<option value='.$iddep.'>'.$nomdep.'</option>';
                                        }
                                     ?>
                                </select>
                                <label>Departamento</label>
                            </div>
                        </div>
                        <!-- FILA 2 -->
                        <div class="row">
                           <div class="input-field col s6">
                                <input id="latitud" name="latitud" value="" type="text" 
                                    onkeypress="return event.charCode >= 45 && event.charCode <= 57">
                                <label>Latitud</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="longitud" name="longitud" value="" type="text" 
                                        onkeypress="return event.charCode >= 45 && event.charCode <= 57">
                                <label>Longitud</label>
                            </div>
                        </div>
                        
                        <!-- FILA 3 -->
                        <div class="row">
                           <div class="input-field col s6">                               
                                <select id="selectmay" name="selectmay">                                    
                                    <option value="" disabled selected>Seleccione una opcion</option>
                                    <?php 
                                        foreach ($mays as $idmay => $nommay) {
                                            echo '<option value='.$idmay.'>'.$nommay .'</option>';
                                        }
                                     ?>
                                </select>
                                <label>Mayorista</label>
                            </div>
                            <div class="input-field col s6">
                                <select id="selecttypestation" name="selecttypestation">                                    
                                    <option value="" disabled selected>Seleccione una opcion</option>
                                    <?php 
                                        $arr_typestation = array(
                                            'U' => 'Urbana',
                                            'R' => 'Rural'
                                             );
                                        foreach ($arr_typestation as $idtype => $nomtype) {
                                            echo '<option value='.$idtype.'>'.$nomtype.'</option>';
                                        }
                                     ?>
                                </select>
                                <label>Tipo de EDS</label>
                            </div>
                        </div>

                        <!-- boton editar -->


                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                        Agregar Estacion
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        <!-- XX -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--fin add station -->
<!--footer-->
<main></main>
 <footer class="page-footer #00838f cyan darken-3">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Mi eds App</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
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
            $('select').material_select();

        })
    </script>

 
</body>

</html>