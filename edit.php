<?php include("includes/config.php");
$page_title = "redigera blogg";
include("includes/header.php");
?>
<?php
//kontroll om användare är inloggas 
if(!isset($_SESSION["email"])){
    header("Location: login.php?message=du måste vara inloggad!");
}

$nyhet = new Nyhet();
if(isset($_GET["id"])){
    $id = intval($_GET["id"]);
    $nyhet = new Nyhet();
//lägg till nyhet 
 if (isset($_POST["name"])){
    $name =$_POST["name"];
    $innehall =$_POST["innehall"];
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
        if($nyhet->uppdatenyhet($id, $name, $innehall)){
            echo "<p class='tillagd'> Nyhet redigerad! </P>";

        }else{
            echo "<p class='error'> Fel vid uppdatering </P>";
        } }else {  
            echo "<p class='error'> Ändringar ej sparade, försök igen senare. </P>";

        
    }

}
    //läsa information som vi ska redigera 
$detalis = $nyhet -> getnyhetbyid($id);

    }else{
    header("Location: admin.php");
}
?>



<div class="out"> 
<p> Welcome <?php echo $_SESSION['email']; ?>  </p>
<p class="logaout"> <a href= "logaout.php" > Logga out </a> </p>
</div>

<form method ="post" action= "edit.php?id=<?= $id; ?>">
    <label class="label" for="name"> Tittel </label>
    <br> 
    <?php  if (isset ($feltitel)) {echo $feltitel;}?>
    <input class="användare"   type="text" name="name" id= "name" value="<?=$detalis['titel'];?>" >
    <br> 
    <label class="label" for="innehall"> Innehåll </label>
    <br> 
        <?php  if (isset ($felinnehall)) {echo $felinnehall;}?>
    <textarea  class="innehall" name="innehall" id= "innehall" > <?=$detalis['innehall'];?> </textarea> 
    <br> 
    <input  class= "submit"  type="submit" value="Uppdatera nyhet"> 
</form> 



</div>
</div>