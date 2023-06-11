<?php include("includes/config.php"); ?> 

<?php
$page_title = "Startsida";
include("includes/header.php");
?>


<div class = content> 
<h2> Skapa ett konto </h2> 

<p>Är du medlem? <a href="login.php" class="skapa-a">Logga in</a></p>
<form  method="post" action="login.php" class="form">  
     <label for="username" > Användarnamn: </label>
     <br> 
     <input class="användare" type="text" name="username" id="username"> 
     <br> 
     <label for="password"> Email: </label>
     <br> 
     <input class="användare" type="password" name="password" id="password"> 
     <br> 
     <label for="username" > Lösenord: </label>
     <br> 
     <input class="användare" type="text" name="username" id="username"> 
     <br> 
     <input class= "submit" type="submit" value="Logga in"> 

</form> 


</div> 
</div> 