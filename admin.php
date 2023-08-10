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

<?php
$nyhet = new Nyhet();

//defult värde
$innehall= "";

//delet 
if (isset ($_GET['deleteid'])){
    $deleteid= intval ($_GET['deleteid']);
    if ($nyhet -> deletenyhet($deleteid)){
        echo "<p class='tillagd'> Nyhet raderad</p> ";
    }else{
        echo "<p class='error'> Fel vid radering </p>";
    }
}
//lägg till nyhet 
 if (isset($_POST["name"])){
    $name =$_POST["name"];
    $innehall =$_POST["innehall"];
    $username =$_POST["username"];
    $success = true;

    if (!$nyhet-> setname($name)){
        $success = false;
        $feltitel=  "<p class='error'> Du måste ange en titel med minst 5 bokstäver! </P>";
    }
    if (!$nyhet-> setinnehall($innehall)){
        $success = false;
        $felinnehall= "<p class='error'> Du måste ange en innehålls-text med minst 5 bokstäver! </P>";
    }

    if($success){
        if($nyhet->addnyhet($name, $innehall, $username)){
            echo "<p class='tillagd'> Nyhet tillagd! </P>";

        }else{
            echo "<p class='error'> Fel vid lagring </P>";
        } }else {  
            echo "<p class='error'> Nyhet ej tillagd, försök igen senare. </P>";

        
    }

}
?>



<div class="out"> 
<p> Welcome <?php 
echo $_SESSION["username"];
    ?>

        
 </p>

<p class="logaout"> <a href= "logaout.php" > Logga out </a> </p>
</div>

<form method ="post">
    <label class="label" for="name"> Tittel </label>
    <br> 
    <?php  if (isset ($feltitel)) {echo $feltitel;}?>
    <input class="användare"   type="text" name="name" id= "name" >
    <br> 
    
    <label class="label" for="innehall"> Innehåll </label>
    <br> 
        <?php  if (isset ($felinnehall)) {echo $felinnehall;}?>
    <textarea  class="innehall" name="innehall" id= "innehall">  </textarea> 
    <br> 
    <label class="label" for="username"> username </label>
    <br> 
    <?php  if (isset ($felusername)) {echo $felusername;}?>
    <input class="användare"   type="text" name="username" id= "username" >
    <br> 
    <input  class= "submit"  type="submit" value="Skapa nyhet"> 
</form> 


<h2> Befintliga inlägg  </h2>

<?php 
//SQL-fråga för att läsa ut inlaggda nyheter från tabellen  

$list = $nyhet->getnyhet();
foreach($list as $row){
       $innehall = $row['innehall'];
       
    ?> 
    <article class="article">
    <?php 
     echo  "" . "<h3>" .  $row['titel']. "</h3>" ;
     echo  "<p class='tid'>" .  $row['tid']. "</p>";
     echo  "<p class='text'> " .  substr($innehall, 0,  500 ) . "...." . "</p>"; 
    ?> 
  <div class='knappar'>   
  <p class='radera'>  <a href= "admin.php?deleteid=<?= $row['id']; ?>">Radera</a> </p> 
  <p class='radera'>  <a href= "edit.php?id=<?= $row['id']; ?>">Redigera</a> </p>
</div>

</article>
    <?php
}
?>


</div>
</div>