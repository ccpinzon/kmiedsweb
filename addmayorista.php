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
   
     $sqlMays  = 'SELECT id_mayorista,marca_mayorista FROM mayorista ORDER BY 1';
       
        }
?>

<?php

$PageTitle="Agregar Mayorista";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
include_once('helpers/nav.php');

//body contents go here
?>
  

<!-- card panel agregar estacion -->


<?php 

// traer mayoristas
$mays = array();

$resMays = $conn->query($sqlMays);

while ($row = mysqli_fetch_assoc($resMays)) {

    $mays[$row["id_mayorista"]] = $row["marca_mayorista"];

}



 ?>



 <div id="basic-form" class="section">
    <div class="row">
        <div class="col s12 m5 offset-m1">
            <div class="card-panel">
                <form action="controllers/fetchaddmayorista.php" method="post">
                    <blockquote class="flow-text">
                        Datos del Mayorista 
                    </blockquote>
                    <!-- FILA 0 -->

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="branch" name="branch" value="" type="text" required>
                            <label>Marca</label>
                        </div>


                        <div class="input-field col s6">
                            <input id="tel" name="tel" value="" type="tel" required>
                            <label>Telefono</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="web" name="web" value="" type="text" required>
                            <label>Pagina Web</label>
                        </div>

                    </div>

                    
                    <!-- boton agregar -->


                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                Agregar Mayorista
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                    <!-- XX -->

                </form>
            </div>
        </div>
        <!-- DATOS TABLA -->
        <?php 

            $sqlMaysData = 'SELECT * FROM mayorista';
            $resMayData = $conn->query($sqlMaysData);

            if (mysqli_num_rows($resMayData) > 0) {
                
            

         ?>
        <div class="col s12 m5">
        <!-- tabla de mayoristas -->
            <div class="card-panel">
                <table class="striped">
                    <thead>
                      <tr>
                          <th>Mayorista</th>
                          <th>Telefono</th>
                          <th>Pagina Web</th>
                      </tr>
                  </thead>

                  <tbody>

                    <?php 
 
                    $out =  '';
                     while($row = mysqli_fetch_array($resMayData)){
                       
                        $out .= '<tr>
                                    <td>'.$row['marca_mayorista'].'</td>
                                    <td>'.$row['telefono_mayorista'].'</td>
                                    <td>'.$row['web_mayorista'].'</td>
                                </tr>';
                    }
                      

                } // end if                 
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