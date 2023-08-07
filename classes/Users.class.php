<?php

//klass för att hantera användare.
class Users {
private $db;
private $username;
private $email;
private $password;

//anslutning till databas
function __construct(){
    $this -> db =new mysqli("localhost", "username", "pass", "username");
    
    if($this -> db->connect_errno > 0){
        die('Fel vid anslutning försök igen [' . $db->connect_error . ']');
    }
    }



function loginUser($username, $password) {
    if($username == "admin" && $password == "password") {
        $_SESSION['username'] = $username;
        return true;
    } else {
        return false;
    }
}


    
public function islogadin(){
    if(isset($_SESSION['email'])){
         return true;
     }else {
         return false;
       
    }
}


public function restrictPage(){
    if(!isset($_SESSION['email'])) {
        header("Location: login.php?error=1");
        exit;
}

}



public function logaout(){
   session_destroy();
   header("Location: index.php");
   exit;
}


}


