<?php
if(isset($_POST))
{
    $myValue = $_POST['idest']; //Contains the string "My value"
    //Do something with your POST
    echo "ID ESTACION:  ". $myValue;
}
?>