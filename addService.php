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
     $sqlServices = 'SELECT * FROM servicio';
       
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

// traer servicios 

$services  =  array();

$resServices = $conn->query($sqlServices);

while ($row = mysqli_fetch_assoc($resServices)) {
    
    $services[$row["nombre_servicio"]] = $row["tipo_servicio"];  

}

//echo var_dump($services);
 ?>




 <div id="basic-form" class="section">
    <div class="row">
        <div class="col s12 m4 offset-m1">
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
                                <option value='V'>Vehicular</option>
                                <option value='P'>Clientes</option>        
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

        <!-- TABLA -->
        <div class="col s12 m6">
            <!-- tabla de servicios -->
            <div class="card-panel">
                <table class="striped">
                    <thead>
                      <tr>
                          <th>Nombre Servicio</th>
                          <th>Tipo de Servicio</th>
                      </tr>
                  </thead>

                  <tbody>

                    <?php 
                    $out =  '';
                    foreach ($services as $nameServ => $typeServ) {
                        $typeName = ($typeServ == 'V') ? "Vehicular" : "Clientes";
                        $out .= '<tr>
                                    <td>'.$nameServ.'</td>
                                    <td>'.$typeName.'</td>
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