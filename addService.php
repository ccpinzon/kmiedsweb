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
   
     $sqlTypes  = 'SELECT DISTINCT tipo_servicio FROM servicio';
       
    }
?>

<?php

$PageTitle="Agregar Servicio";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
include_once('helpers/nav.php');

//body contents go here
?>
  

<!-- card panel agregar estacion -->


<?php 

// traer tipos de servicio
$types = array();

$restypes = $conn->query($sqlTypes);

while ($row = mysqli_fetch_assoc($restypes)) {

    $types[] = $row["tipo_servicio"];

}

//echo var_dump($types);
 ?>



<div class="container">
    <div id="basic-form" class="section">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card-panel">
                    <form action="controllers/fetchaddservice.php" method="post">
                            <blockquote class="flow-text">
                                Datos del Servicio 
                            </blockquote>

                        <div class="row">
                            <div class="input-field col s6">
                                <input id="service" name="service" value="" type="text" required>
                                <label>Nombre del servicio</label>
                            </div>


                            <div class="input-field col s6">
                                <select id="selecttype" name="selecttype" required>                                    
                                    <option value="" disabled selected>Seleccione una opcion</option>
                                    <?php 
                                        $typeName = '';
                                        foreach ($types as $posType => $type) {
                                            $typeName = ($type == 'V') ? "Vehicular" : "Clientes";

                                            echo '<option value='.$type.'>'.$typeName.'</option>';
                                        }
                                     ?>
                                </select>
                                <label>Tipo de servicio</label>
                            </div>

                        </div>                      
                        <!-- boton agregar -->


                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                        Agregar Servicio
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