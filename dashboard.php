<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Bienvenido! " . $_SESSION['username'];
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='login.html'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='login.html'>Necesita Hacer Login</a>";
exit;
}
?>


<?php
include_once "controllers/config.php"
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Iniciar Sesion - Admins - Mi Eds App</title>
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
                <li><a href="sass.html"><i class="material-icons left">home</i>Inicio</a></li>
                <li><a href="controllers/logout.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="sass.html"><i class="material-icons right">home</i>Inicio</a></li>
                <li><a href="controllers/logout.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>


<!--buscador -->
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <div class="card-content">
                    <h5><span class="card-title red-text text-darken-3">Buscar estacion de servicio  </span></h5>
                    <form>
                        <div class="input-field">
                            <input name="search_text" id="search_text" type="search" placeholder="Ingrese ID de la estacion o nombre">
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
                                                                    <th>latitud</th>
                                                                    <th>longitud</th>
                                                                    <th>mayorista</th>
                                                                    <th>Estado Pago</th>
                                                                    <th>Depto</th>
                                                                    <th>Precios</th>
                                                            
                                                                </tr>
                                                        </thead>' ;
                                            while($row = mysqli_fetch_array($result)){
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
                                                            <td>'.$row["id_estacion"].'</td>
                                                            <td>'.$row["nombre_estacion"].'</td>
                                                            <td>'.$row["latitud_estacion"].'</td>
                                                            <td>'.$row["longitud_estacion"].'</td>
                                                            <td>'.$row["marca_mayorista"].'</td>
                                                            <td>'.$varpago.'</td>
                                                            <td>'.$row["depto"].'</td>
                                                            <td>'.$varprecios.'</td>                                                
                                                        </tr>
                                                    </tbody>
                                                    
                                                ';
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