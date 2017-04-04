<?php 
include_once "config.php";


$out = '';

//$sql = "SELECT * FROM listar_estaciones WHERE nombre_estacion  LIKE '%".$_POST["search_text"]."%'";
$sql = "SELECT * FROM listar_estaciones WHERE nombre_estacion  LIKE '%EDS CE%'";
$result = $conn->query($sql);

if(mysqli_num_rows($result) > 0 ){

    $out .= '<h4 align="center"> Resultado de busqueda</h4>';
    $out .= '<table class="highlight">
                <thead>
                    <tr>
                        <th>id_estacion</th>
                        <th>nombre_estacion</th>
                        <th>latitud_estacion</th>
                        <th>longitud_estacion</th>
                        <th>marca_mayorista</th>
                        <th>pago_estacion</th>
                        <th>depto</th>
                        <th>precio_extra</th>
                        <th>precio_corriente</th>
                        <th>precio_diesel</th>
                        <th>precio_gnv</th>
                    </tr>
                </thead>' ;
    while($row = mysqli_fetch_array($result)){

        $out .= '
            <tbody>
                <tr>
                    <td>'.$row["id_estacion"].'</td>
                    <td>'.$row["nombre_estacion"].'</td>
                    <td>'.$row["latitud_estacion"].'</td>
                    <td>'.$row["longitud_estacion"].'</td>
                    <td>'.$row["marca_mayorista"].'</td>
                    <td>'.$row["pago_estacion"].'</td>
                    <td>'.$row["depto"].'</td>
                    <td>'.$row["precio_extra"].'</td>
                    <td>'.$row["precio_corriente"].'</td>
                    <td>'.$row["precio_diesel"].'</td>
                    <td>'.$row["precio_gnv"].'</td>
                </tr>
            </tbody>
        ';

    }
    echo $out;

}
else{
    echo 'No hay Datos';
}


?>