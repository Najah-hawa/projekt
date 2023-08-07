<?php
$page_title = "Startsida";
include("includes/config.php");
include("includes/header.php"); 
?>

<div class = content> 
<h2> Inloggning </h2>


<?php
if(isset($_GET['message'])){
    echo "<p class='error'>" . $_GET['message'] .  "</p>";
}
?>

<?php  

if(isset($_POST["username"])) {

    $username = $_POST["username"];
    $password= $_POST["password"];
    $newuser= new User();
    
    if ($newuser -> loginUser($username, $password)) {
        $_SESSION["username"] = $username;
        header("location:admin.php");
        
    }else {
        $felmeddelande = "<p class= 'error'> Felaktig användarnamn/lösenord </p>";
        echo  $felmeddelande;
    }

}
 
    


?> 

<form  method="post" action="login.php" class="form">  
     <label  class="label"  for="username" > Användarnamn: </label>
     <br> 
     <input class="användare" type="text" name="username" id="username"> 
     <br> 
     <label class="label"  for="password"> Lösenord: </label>
     <br> 
     <input class="användare" type="password" name="password" id="password"> 
     <br> 
     <input class= "submit" type="submit" value="Logga in"> 

</form> 

