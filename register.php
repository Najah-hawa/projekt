<?php include("includes/config.php"); 
$page_title = "Registera ett konto";

?>


<div class = content> 
<h2> Skapa ett konto </h2> 

<p>Är du medlem? <a href="login.php" class="skapa-a">Logga in</a></p>
<form  method="post" action="register.php" class="form">  



<?php 
if(isset($message)) { echo $message; };
if(isset($errormessage)) { echo $errormessage; }
?>
     <label for="username"> Användarnamn: </label>
     <br> 
     <input class="användare" type="text" name="username" id="username"> 
     <br> 
     <label for="email"> Email: </label>
     <br> 
     <input class="email" type="text" name="email" id="email"> 
     <br> 
     <label for="username" > Lösenord: </label>
     <br> 
     <input class="password" type="password" name="password" id="password"> 
     <br> 
     <input class= "submit" type="submit" value="Logga in"> 

</form> 


</div> 
</div> 