
<?php
$page_title = "registera nytt konto";
include("includes/config.php");
include("includes/header.php"); 

$users = new Users();

// ta emot data från fält och lägga den i databasen. 

 if (isset($_POST["username"])){
     $username = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];
    $success = true;

//kontrollera att email finns inte redan registerad som användare
if ($users->isemailtaken($email)){
     $message = "<p class='error'> email finns redan registerad </P>";
}else {
//kontroll att username, email och password har rätt längd 
    if (!$users-> setname($username)){
        $success = false;
       echo "<p class='error'> Du måste ange en användare namn med minst 5 bokstäver! </P>";
    }
    if (!$users-> setinnehall($email)){
        $success = false;
        echo  "<p class='error'> Du måste ange en email med minst 5 bokstäver! </P>";
    }
    if (!$users-> setpassword($password)){
     $success = false;
     echo  "<p class='error'> Du måste ange ett password med minst 5 bokstäver! </P>";
 }
 //lägg till användare till databasen. 
    if($success){
        if($users->registerUser($username, $email,$password )){
          $message = "<p class='error'> användare tillagd! </P>";
        }else{
          $message =  "<p class='error'> Fel vid registering </P>";
        } }else {  
          $message = "<p class='error'> användare ej tillagd, försök igen senare. </P>";   
    }
}
}



?>


<div class = content> 
<h2> Skapa ett konto </h2> 

<p>Är du medlem? <a href="login.php" class="skapa-a">Logga in</a></p>
<form  method="post" action="register.php" class="form">  

<?php 
if(isset($message)) { echo $message; };
if(isset($errormessage)) { echo $errormessage; }
?>
     <label class="label"  for="username"> Användarnamn: </label>
     <br> 
     <input class="användare" type="text" name="username" id="username"> 
     <br> 
     <label  class="label"  for="email"> Email: </label>
     <br> 
     <input class="användare" type="text" name="email" id="email"> 
     <br> 
     <label  class="label"  for="username" > Lösenord: </label>
     <br> 
     <input class="användare" type="password" name="password" id="password"> 
     <br> 
     <input class= "submit" type="submit" value="Logga in"> 

</form> 


</div> 
</div> 