<?php

include_once 'mySQL.php';
include_once 'GeneralAssist.php';

class User {
    
    private $databaseInfo = array();
    private $newUser;
    private $newPassword;
    private $passCrypt;

    const USERTABLE = "usuario";
    const COLUMN_USERID = "id_usuario";
    const COLUMN_USERNAME = "nombre_usuario";
    const COLUMN_USERPASSWORD = "pass_usuario";
    const COLUMN_USERTYPE = "tipo_usuario";
    
    const PASSWORD_LENGHT = 12;
    
    function __construct($databaseInfo) {
        
        $this->databaseInfo = $databaseInfo;
        $this->newUser = $this->newUser();
        $this->newPassword = $this->generatePassword();
        $this->passCrypt = password_hash($this->newPassword, PASSWORD_DEFAULT);
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
        
        $lastId = $this->getLastUserId();
        $newId = $lastId + 1;
        $newUser = '"'."Usuario_".$newId.'"';
        return $newUser; 
    }
    
    function addUser(){
        
        $databaseManager = new mySQL();
                
        $columnNames = array(
            self::COLUMN_USERNAME,
            self::COLUMN_USERPASSWORD,
            self::COLUMN_USERTYPE
        );
        
        $values = array(
            $this->newUser(),
            '"'.$this->passCrypt.'"',
            '"'.'G'.'"'
        );
        
        $resultQuery = $databaseManager->insertmySQL($this->databaseInfo, self::USERTABLE, $columnNames, $values);
        return $resultQuery;
    }
    
    function saveUserData($username, $password, $fileName){
        
        $AssistWork = new GeneralAssist();
        $saveData = $AssistWork->saveUserData($username, $password, $fileName);
        return $saveData;
    }
    
    function generatePassword(){
        
        $AssistWork = new GeneralAssist();
        return $AssistWork->generatePassword(self::PASSWORD_LENGHT);
    }
    
    function getLastUserId(){
        
        $databaseManager = new mySQL();
        
        $getLastUserIdQuery = "SELECT ".self::COLUMN_USERID." FROM ".self::USERTABLE." ORDER BY 1 DESC LIMIT 1";
        
        $resultQuery = $databaseManager->querySQL($this->databaseInfo, $getLastUserIdQuery);
        return $this->setArrayData($resultQuery);
    }
    
    function getNewUser(){
        return $this->newUser;
    }
    
    function getNewPassword(){
        return $this->newPassword;
    }
    
    function getPassCrypt(){
        return $this->passCrypt;
    }
}
