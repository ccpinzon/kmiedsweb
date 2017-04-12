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

<?php

$PageTitle="Agregar Estacion";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
include_once('nav.php');

//body contents go here
?>
  

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

 <?php 

 include 'models/station.php';

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
                        <!-- FILA 0 -->
                        <input type="hidden" name="idest" value="<?php echo $idest; ?>"/>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nameeds" name="nameeds" value="" type="text" required>
                                <label>Nombre de la EDS</label>
                            </div>

                        </div>

                        <!-- FILA 1 -->

                        <div class="row">
                           <div class="input-field col s6">
                                <input id="sicom" name="sicom" value="" type="text" required onkeypress="return event.charCode >= 47 && event.charCode <= 57">
                                <label>N. SICOM</label>
                            </div>
                            <div class="input-field col s6">

                                <select id="selectdepto" name="selectdepto" required>                                    
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
                                <input id="latitud" name="latitud" value="" type="text" required 
                                    onkeypress="return event.charCode >= 45 && event.charCode <= 57">
                                <label>Latitud</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="longitud" name="longitud" value="" type="text" required 
                                        onkeypress="return event.charCode >= 45 && event.charCode <= 57">
                                <label>Longitud</label>
                            </div>
                        </div>
                        
                        <!-- FILA 3 -->
                        <div class="row">
                           <div class="input-field col s6">                               
                                <select id="selectmay" name="selectmay" required>                                    
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
                                <select id="selecttypestation" name="selecttypestation" required>                                    
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
include_once('footer.php');
?>