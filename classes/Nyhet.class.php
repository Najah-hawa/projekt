<?php

class Nyhet {
private $db;
private $name;
private $innehall;
private $username;


//construktor
function __construct(){
//connect to db 
$this -> db =new mysqli("localhost", "username", "pass", "username");

if($this -> db->connect_errno > 0){
    die('Fel vid anslutning försök igen [' . $db->connect_error . ']');
}
}

//lägga nyheter
public function addnyhet(string $name, string $innehall, string $username ) : bool{
    if (!$this->setname($name)) return false; 
    if (!$this->setinnehall($innehall)) return false; 
    if (!$this->setusername($username)) return false; 
    //sql query 
 $sql = "INSERT INTO blogg(titel, innehall, username)VALUES('$name',  '$innehall', '$username');";
  return mysqli_query ($this->db, $sql);

}

public function uppdatenyhet(int $id, string $name , string $innehall) : bool {
    if (!$this->setname($name)) return false; 
    if (!$this->setinnehall($innehall)) return false;  
    $sql = "UPPDATE blogg SET titel = , innehall = WHERE id = $id;";
    $sql = "UPDATE blogg SET titel='" .$this-> name . "', innehall= '" . $this-> innehall . "' WHERE id= $id";
    return mysqli_query ($this->db, $sql);
    
}


// set- metoder
public function setname (string $name): bool {
    if (mb_strlen($name) > 5) {
        $this-> name = $name;
        return true;
    } else {
        return false;
    }
}
public function setinnehall (string $innehall): bool {
    if (mb_strlen($innehall) > 5 ) {
        $this-> innehall = $innehall;
        return true;
    } else {
        return false;
    }
}
public function setusername (){
    if (mb_strlen($username) > 5 ) {
        $this-> username = $username;
        return true;
    } else {
        return false;
    }
   
  }


//läsa ut nyheter 
public function getnyhet(): array{
    $sql = "SELECT * FROM  blogg ORDER BY tid DESC ;";
    $result = mysqli_query ($this->db, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

}

public function getnyheter(): array{
    $numrows = 5; //Maxvärde
    if(isset($_GET['numrows'])) {
        $numrows = intval($_GET['numrows']);
    }
    $sql = "SELECT * FROM  blogg ORDER BY tid DESC LIMIT $numrows ;";
    $result = mysqli_query ($this->db, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

}
public function getallnyheter(): array{
  
    $sql = "SELECT * FROM  blogg ;";
    $result = mysqli_query ($this->db, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

}

//läsa specific nyhet
public function getnyhetbyid(int $id): array{
    $id= intval ($id);
    $sql = "SELECT * FROM  blogg WHERE id= $id;";
    $result = mysqli_query ($this->db, $sql);
    return $result-> fetch_assoc();

}

//radera nyheter
public function deletenyhet(int $id) : bool {
    $id = intval($id);
    $sql = "DELETE FROM blogg WHERE id =$id";
    return  mysqli_query($this->db, $sql);
}


//destructor 
function __destruct(){
    $this->db-> close();
}
}






