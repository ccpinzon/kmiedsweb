<?php

class GeneralAssist {
    
    function IsPrime($n){
        for($x=2; $x<$n; $x++){
             if($n%$x==0){
                   return false;
             }
        }
      return true;
    }
 
    function getRandomBytes($nbBytes = 32) {
        $bytes = openssl_random_pseudo_bytes($nbBytes, $strong);
        if (false !== $bytes && true === $strong) {
            return $bytes;
        }
        else {
            throw new \Exception("Unable to generate secure token from OpenSSL.");
        }
    }
    
    function generatePassword($length){
        return substr(preg_replace("/[^a-zA-Z0-9]/", "", base64_encode($this->getRandomBytes($length+1))),0,$length);
    }

    function saveUserData($username, $password, $fileName){
        
        if (file_exists($fileName)){

            $doc = new DOMDocument();
            $doc->preserveWhiteSpace = false;
            $doc->load($fileName);

            $root = $doc->firstChild;

            $user = $doc->createElement("user");
            $root->appendChild($user);

            $name = $doc->createElement("name");
            $nameValue = $doc->createTextNode($username);
            $user->appendChild($name);
            $name->appendChild($nameValue);

            $pass = $doc->createElement("pass");
            $passValue = $doc->createTextNode($password);
            $user->appendChild($pass);
            $pass->appendChild($passValue);

            $doc->formatOutput = true;
            $saveData = $doc->save($fileName);      
            
            if($saveData == false){
                return false;
            }else{
                return true;
            }
                
        }else{

            $doc = new DOMDocument();

            $root = $doc->createElement("usersdata");
            $users = $doc->appendChild($root);

            $user = $doc->createElement("user");
            $users->appendChild($user);

            $name = $doc->createElement("name");
            $nameValue = $doc->createTextNode($username);
            $user->appendChild($name);
            $name->appendChild($nameValue);

            $pass = $doc->createElement("pass");
            $passValue = $doc->createTextNode($password);
            $user->appendChild($pass);
            $pass->appendChild($passValue);

            $doc->formatOutput = true;
            $saveData = $doc->save($fileName);      
            
            if($saveData == false){
                return false;
            }else{
                return true;
            }
        }
    }  
}
