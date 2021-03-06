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
include_once "controllers/config.php"
?>

<?php

$PageTitle="Dashboard";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
include_once('helpers/nav.php');

?>
<!--buscador -->
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <div class="card-content">
                    <h5><span class="card-title red-text text-darken-3">Buscar estacion de servicio  </span></h5>
                    <form>
                        <div class="input-field">
                            <input name="search_text" id="search_text" type="search" placeholder="Ingrese ID o nombre de la estacion">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        </div>
                    </form>
                    <div id="result">
                       
                        <?php

                            include_once "controllers/config.php";

                            $out = '';

                            $searchby = $_REQUEST['search_text']; 
                                if($searchby!=null){
                                        $sql = "SELECT * FROM listar_estaciones WHERE nombre_estacion  LIKE '%".$searchby."%' OR id_estacion LIKE '%".$searchby."%'";
                                        //$sql = "SELECT * FROM listar_estaciones WHERE nombre_estacion  LIKE '%EDS CE%'";
                                        $result = $conn->query($sql);

                                        if(mysqli_num_rows($result) > 0 ){

                                            $varprecios = '';
                                            $out .= '<h4 align="center" class="red-text text-darken-2"> Resultado de busqueda</h4>
                                                        <table class="responsive-table highlight">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Nombre</th>
                                                                    <th>Coordenadas</th>
                                                                    <th>Mayorista</th>
                                                                    <th>Pago</th>
                                                                    <th>Depto</th>
                                                                    <th>Precios</th>
                                                                    <th></th>
                                                            
                                                                </tr>
                                                        </thead>' ;
                                            while($row = mysqli_fetch_array($result)){
                                            	$varpos = $row["latitud_estacion"].', '.$row["longitud_estacion"];


                                                $varpago = '';
                                                if ($row['pago_estacion'] == 1) {
                                                    $varpago= 'Dorada';
                                                }else{
                                                    $varpago= 'Normal';
                                                }

                                            	
                                                $varprecios .=  
                                                                'Extra: $'.$row["precio_extra"].
                                                                '<BR> Corriente: $'.$row["precio_corriente"].
                                                                '<BR> Diesel: $'.$row["precio_diesel"].
                                                                '<BR> GNV: $'.$row["precio_gnv"].'<BR>'                                               
                                                                ;
                                                                                    

                                                $out .= '
                                                    <tbody>
                                                        <tr>
                                                        <form action="verestacion.php" method="post">
	                                                            <td>
	                                                            	<input type="hidden" name="idest" value='.$row["id_estacion"].' />'.$row["id_estacion"].'
	                                                            </td>
	                                                            <td>'.$row["nombre_estacion"].'</td>
	                                                            <td>'.$varpos.'</td>
	                                                            <td>'.$row["marca_mayorista"].'</td>
	                                                            <td>'.$varpago.'</td>
	                                                            <td>'.$row["depto"].'</td>
	                                                            <td>'.$varprecios.'</td>
	                                                            <td>
	                                                            	<button class="btn waves-effect waves-light" type="submit" name="action">
	                                                            		ver mas
	                                                            		<i class="material-icons right">send</i>
	                                                            	</button>
	                                                            </td>
                                                         </form>
                                                        </tr>
                                                    </tbody>
                                                    
                                                ';
                                                $varpos = '';
                                                $varprecios = '';

                                            }
                                            $out .= '</table>';
                                            echo $out;

                                        }
                                        else{
                                            echo 'No hay Datos';
                                        }
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--fin buscador -->
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

        })
    </script>

    <!--fin nav lateral responsivo-->

    <!--script buscador ajax-->
    <!--<script>    
    
        $(document).ready(function(){
            $('#search_text').keyup(function(){
                var txt = $(this).val();
                if(txt != '' ){
                    
                }else{
                    alert(txt);
                }
            });
        });
    
    </script>-->
    <!--script buscador ajax-->
</body>

</html>