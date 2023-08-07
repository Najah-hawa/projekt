<?php include("includes/config.php");
$page_title = "admin";
include("includes/header.php");
?>


<?php
//kontroll om användare är inloggas 
if(!isset($_SESSION["username"])){
    header("Location: login.php?message=du måste vara inloggad!");
}
?>


<div class="out"> 
<p> Welcome <?php echo $_SESSION['username']; ?>  </p>
<p class="logaout"> <a href= "logaout.php" > Logga out </a> </p>
</div>



<form method ="post">
    <label class="label" for="name"> Tittel </label>
    <br> 
    <input class="användare"   type="text" name="name" id= "name" >
    <br> 
    <label class="label" for="innehall"> Innehåll </label>
    <br> 
    <textarea  class="innehall" name="innehall" id= "innehall">  </textarea> 
    <br> 
    <input  class= "submit"  type="submit" value="Skapa nyhet"> 
</form> 


<h2> Befintliga inlägg  </h2>



</div>

