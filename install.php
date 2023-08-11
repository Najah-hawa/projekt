<p> <a href= "index.php"> komma tillbaka till startsidan </a> </p>

<?php
include("includes/config.php");


/* Anslut med nytt konto för varor */
$db = new mysqli("localhost", "username", "pass", "username");
if($db->connect_errno > 0){
    die('Fel vid anslutning [' . $db->connect_error . ']');
} 


/* SQL-fråga för att skapa tabell */
$sql = "DROP TABLE IF EXISTS users, blogg;";

/* SQL-fråga för att skapa tabell */
$sql .= "DROP TABLE IF EXISTS users;
    CREATE TABLE users(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(64) NOT NULL ,
    email VARCHAR(156),
    password VARCHAR(256)
);";
$sql.=  "CREATE TABLE blogg(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    titel VARCHAR(64) NOT NULL,
    innehall text,
    username VARCHAR(64) NOT NULL,
    tid timestamp NOT NULL
);";
/* SQL-fråga för att lägga in data */
$sql .= "INSERT INTO users (username, email, password) VALUES
('najah','najah@gmail.com', 'password');";
$sql .= "INSERT INTO blogg (titel, innehall, username) VALUES
('nyhet1','skriva lite text', 'najah');";

echo "<pre>$sql</pre>"; // Skriv ut SQL-frågan till skärm

/* Skicka SQL-frågan till DB */
if($db->multi_query($sql)) {
    echo "Tabell installerad.";
} else {
    echo "Fel vid installation av Tabell.";
}

?>