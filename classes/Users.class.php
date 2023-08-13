<?php 
include ("includes/config.php");


//klass för att hantera användare.
class Users {
private $db;
private $username;
private $email;
private $password;

//anslutning till databas
function __construct(){
    $this -> db =new mysqli('studentmysql.miun.se', 'naha2204', '6337PJNrZr', 'naha2204');
    
    if($this -> db->connect_errno > 0){
        die('Fel vid anslutning försök igen [' . $db->connect_error . ']');
    }
    }
    
 //lägga till nya användare nyheter
    public function registerUser(string $username, string $email, string $password) : bool{
     $db = new mysqli('studentmysql.miun.se', 'naha2204', '6337PJNrZr', 'naha2204');
     $username= $this->db->real_escape_string($username);
     $email= $this->db->real_escape_string($email);
     //hash password 
     $salt =  '$2a$07$uayhsgetywuijfd7hk102030405H$';
     $password = crypt($password, $salt);

        if (!$this->setname($username)) return false; 
        if (!$this->setinnehall($email)) return false; 
        if (!$this->setpassword($password)) return false; 
        //sql query 
     $sql = "INSERT INTO users(username, email, password)VALUES('$username',  '$email', '$password');";
    
     $db->query($sql);
    return $sql;
    }

// set- metoder för att kontrollera längd av varje fält
public function setname (string $username): bool {
    if (mb_strlen($username) > 3) {
        $this-> username = $username;
        return true;
    } else {
        return false;
    }
}
public function setinnehall (string $email): bool {
    if (mb_strlen($email) > 5 ) {
        $this-> email = $email;
        return true;
    } else {
        return false;
    }
}

public function setpassword (string $password): bool {
    if (mb_strlen($password) > 5 ) {
        $this-> password = $password;
        return true;
    } else {
        return false;
    }
}

//kontrollera om username är upptaget
public function isusernametaken ($username){
    $username= $this->db->real_escape_string($username);
     if (!$this->setname($username)) return false;   
     $sql = "SELECT username FROM users WHERE username= '$username'";
     $result= $this->db->query($sql);
     if ($result->num_rows > 0 ){
        return true;
     }else{
        return false;
     }
    }


//log in användare 
public function loginUser($username, $password){
    $username= $this->db->real_escape_string($username);
    $password= $this->db->real_escape_string($password);
    if (!$this->setinnehall($username)) return false;
    if (!$this->setpassword($password)) return false;   
    $sql = "SELECT password FROM users WHERE username= '$username'";
    $result= $this->db->query($sql);

    if ($result->num_rows > 0 ){
        $row = $result->fetch_assoc();
        $storedpassword = $row['password'];
        //hash passsword på nytt för att kontrollera att lösenord är rätt
        if( $storedpassword == crypt ($password, $storedpassword )){
            $_SESSION["username"] = $username;
            return true;
        }else {
            return false;
        }
     }else {
        return false;
     }
}


//läsa ut nyheter 
public function getusername(): array{
    $sql = "SELECT username FROM  users ;";
    $result = mysqli_query ($this->db, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}




}