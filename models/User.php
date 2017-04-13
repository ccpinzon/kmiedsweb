<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Sergio
 */

include_once 'mySQL.php';

class User {
    
    private $databaseInfo = array();
    private $newUser;
    private $newPassword = "1234";

    const USERTABLE = "usuario";
    const COLUMN_USERID = "id_usuario";
    const COLUMN_USERNAME = "nombre_usuario";
    const COLUMN_USERPASSWORD = "pass_usuario";
    const COLUMN_USERTYPE = "tipo_usuario";
    
    function __construct($databaseInfo) {
        
        $this->databaseInfo = $databaseInfo;
        $this->newUser = $this->newUser();
    }
    
    function setArrayData($stationArrayData){
        
        foreach ($stationArrayData as $row) {
            foreach ($row as $dataArray) {
                $data = $dataArray;
            }
        }
        return $data;
    }
    
    function newUser(){
        
        $newUser = "Usuario_".$this->getLastUserId();
        return $newUser; 
    }
    
    function addUser(){
        
        $databaseManager = new mySQL();
        
        $getLastUserIdQuery = "INSERT INTO ".self::USERTABLE." (".self::COLUMN_USERNAME.", ".self::COLUMN_USERPASSWORD.", ".self::COLUMN_USERTYPE.") VALUES (".$this->newUser.", ".$this->newPassword.", 'G')";        
        
        $resultQuery = $databaseManager->querySQL($this->databaseInfo, $getLastUserIdQuery);
        return $resultQuery;
    }
    
    function getLastUserId(){
        
        $databaseManager = new mySQL();
        
        $getLastUserIdQuery = "SELECT id_usuario FROM usuario ORDER BY 1 DESC LIMIT 1";
        
        $resultQuery = $databaseManager->querySQL($this->databaseInfo, $getLastUserIdQuery);
        return $this->setArrayData($resultQuery);
    }
    
    function getNewUser(){
        return $this->newUser;
    }
    
    function getNewPasswod(){
        return $this->newPassword;
    }
    
}
