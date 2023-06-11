<?php include("includes/config.php"); ?> 

<?php
$page_title = "Startsida";
include("includes/header.php");
?>


<div class = content> 

<h2> logga in </h2> 
<p>Är du inte medlem? <a href="registera-konto.php" class="skapa-a">Skapa ett nytt konto</a></p>
<form  method="post" action="login.php" class="form">  
     <label for="username" > Användarnamn: </label>
     <br> 
     <input class="användare" type="text" name="username" id="username"> 
     <br> 
     <label for="password"> Lösenord: </label>
     <br> 
     <input class="användare" type="password" name="password" id="password"> 
     <br> 
     <input class= "submit" type="submit" value="Logga in"> 

</form> 


</div> 
</div> 