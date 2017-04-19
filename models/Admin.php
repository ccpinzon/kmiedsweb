<?php

include_once 'mySQL.php';

class Admin {
    
    const STATIONTABLE = "estacion";
    const COLUMN_STATIONID = "id_estacion";
    const COLUMN_STATIONLOCATION = "ubicacion_estacion";
    const COLUMN_STATIONNAME = "nombre_estacion";
    const COLUMN_STATIONDESCRIPTION = "descripcion_estacion";
    const COLUMN_STATIONTYPE = "tipo_estacion";
    const COLUMN_STATIONLANDLINE = "tel_fijo_estacion";
    const COLUMN_STATIONMOBILE = "tel_movil_estacion";
    const COLUMN_STATIONADDRESS = "direccion_estacion";
    const COLUMN_STATIONEMAIL = "correo_estacion";
    const COLUMN_STATIONSICOM = "SICOM_estacion";
    const COLUMN_STATIONPAY = "pago_estacion";
    const COLUMN_STATIONSTATE = "estado_estacion";
    const COLUMN_STATIONDATETIME = "fecha_registro_estacion";
    const COLUMN_STATIONSUPPLIERID = "mayorista_id_mayorista";
    const COLUMN_STATIONREGIONID = "departamento_id_departamento";
    const COLUMN_STATIONBRANCHID = "sucursal_id_sucursal";
    const COLUMN_STATIONTRADEGROUP = "sucursal_gremio_id_gremio";
    const COLUMN_STATIONUSERID = "usuario_id_usuario";
    
    const PRODUCTABLE = "estacion_has_producto";
    const COLUMN_PRODUCTID = "producto_id_producto";
    const COLUMN_PRODUCTSTATIONID = "estacion_id_estacion";
    const COLUMN_PRODUCTPRICE = "precio_estacion_has_producto";
    const COLUMN_PRODUCTSTATE = "estado_estacion_has_producto";
    
    private $databaseInfo = array();
    
    function __construct($databaseInfo) {/*Array de la base de datos*/
        $this->databaseInfo = $databaseInfo;
    }
    
    function setArrayData($stationArrayData){
        
        foreach ($stationArrayData as $row) {
            foreach ($row as $dataArray) {
                $data = $dataArray;
            }
        }
        return $data;
    }
    
    function addStations($ArrayDataStations){/*Array de dos dimensiones de la lista de datos de la/s estacion/es.*/
        
        $databaseManager = new mySQL;
        $rowIndex = 0;
        $resultLog;
        
        $columnNames = array(
            self::COLUMN_STATIONLOCATION,
            self::COLUMN_STATIONNAME,
            self::COLUMN_STATIONDESCRIPTION,
            self::COLUMN_STATIONTYPE,
            self::COLUMN_STATIONLANDLINE,
            self::COLUMN_STATIONMOBILE,
            self::COLUMN_STATIONADDRESS,
            self::COLUMN_STATIONEMAIL,
            self::COLUMN_STATIONSICOM,
            self::COLUMN_STATIONPAY,
            self::COLUMN_STATIONSTATE,
            self::COLUMN_STATIONSUPPLIERID,
            self::COLUMN_STATIONREGIONID,
            self::COLUMN_STATIONBRANCHID,
            self::COLUMN_STATIONTRADEGROUP,
            self::COLUMN_STATIONUSERID,
        );
        
        foreach ($ArrayDataStations as $values) {
            $rowIndex++;
            $resultQuery = $databaseManager->insertmySQL($this->databaseInfo, self::STATIONTABLE, $columnNames, $values);
            
            if($resultQuery){
                $resultLog[]= "Registry ".$values[1]." was successfully.";
            }else{
                $resultLog[]= "Registry ".$values[1]." can not be added.";
                break;
            }
     
        }
        return $resultLog;
    }
    
    function addProducts($ArrayDataProducts){/*Array de dos dimensiones de la lista de datos de los productos.*/
        
        $databaseManager = new mySQL;
        $rowIndex = 0;
        $resultLog;
        
        $columnNames = array(
            self::COLUMN_PRODUCTSTATIONID,
            self::COLUMN_PRODUCTID,
            self::COLUMN_PRODUCTPRICE,
            self::COLUMN_PRODUCTSTATE
        );
        
        foreach ($ArrayDataProducts as $values) {
            $rowIndex++;
            $resultQuery = $databaseManager->insertmySQL($this->databaseInfo, self::PRODUCTABLE, $columnNames, $values);
            
            if($resultQuery){
                $resultLog[]= "Registry ".$values[1]." was successfully.";
            }else{
                $resultLog[]= "Registry ".$values[1]." can not be added.";
                break;
            }
     
        }
        return $resultLog;
    }
    
    function deleteStation($stationId){
        
        $databaseManager = new mySQL;
        $whereCriterions = array(
            self::COLUMN_STATIONID,
            $stationId
        );
        
        $resultQuery = $databaseManager->deletemySQL($this->databaseInfo, self::STATIONTABLE, $whereCriterions);
        return $resultQuery;
    }
    
    function getLastStationId(){
        
        $databaseManager = new mySQL();
        
        $getLastUserIdQuery = "SELECT ".self::COLUMN_STATIONID." FROM ".self::STATIONTABLE." ORDER BY 1 DESC LIMIT 1";
        
        $resultQuery = $databaseManager->querySQL($this->databaseInfo, $getLastUserIdQuery);
        return $this->setArrayData($resultQuery);
    }
    
    function getListStations(){
        
        $databaseManager = new mySQL;
        
        $columnNames = array("*");
        $whereCriterions = array("1");
        $tableNames = array(self::STATIONTABLE);
        
        $resultQuery = $databaseManager->selectmySQL($this->databaseInfo, $tableNames, $columnNames, $whereCriterions);
        return $resultQuery;
    }
}
