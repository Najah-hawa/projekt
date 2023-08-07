<?php
$page_title = "Startsida";
include("includes/config.php");
include("includes/header.php"); 
?>

<div class = content> 
<h2> Inloggning </h2>

<p>Är du inte medlem? <a href="register.php" class="skapa-a">Skapa ett nytt konto</a></p>
<?php
//läsa felmeddelande från raden om att man måste vara inloggad för admin page
if(isset($_GET['message'])){
    echo "<p class='error'>" . $_GET['message'] .  "</p>";
}
?>
<?php  
if(isset($_POST["email"])) {

    $email = $_POST["email"];
    $password= $_POST["password"];
    $newuser= new Users();
    
    if ($newuser -> loginUser($email, $password)) {
        $_SESSION["email"] = $email;
        header("location:admin.php");
        
    }else {
        $felmeddelande = "<p class= 'error'> Felaktig användarnamn/lösenord </p>";
        echo  $felmeddelande;
    }

}
 
    


?> 

<form  method="post" action="login.php" class="form">  
     <label  class="label"  for="email" > Användarnamn: </label>
     <br> 
     <input class="användare" type="text" name="email" id="email"> 
     <br> 
     <label class="label"  for="password"> Lösenord: </label>
     <br> 
     <input class="användare" type="password" name="password" id="password"> 
     <br> 
     <input class= "submit" type="submit" value="Logga in"> 

</form> 

