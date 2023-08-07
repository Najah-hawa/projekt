
<?php include_once("includes/config.php"); ?>
<?php
//kontoll om id send
if(isset($_GET['id'])){
    $id= intval($_GET['id']);
    $nyheter = new Nyhet();
    $details = $nyheter-> getnyhetbyid($id);
}else{
 header ("Location: index.php");
}
?>



<?php
$page_title = $details["titel"];
include("includes/header.php");
?>

<div class= "detalj">
    <h1>Läsa mer infromation om <?= $details["titel"]; ?> </h1>
<article class="article">  
<h2> <?= $details["titel"]; ?> </h2> 
<p class='tid'>  <?= $details["tid"]; ?></p> 
<p class='text'>  <?= $details["innehall"]; ?></p> 
<p class='bakåt'>  <a href= "index.php">Tillbaka till startsidan</a> </p> </article>
</article> 

</div>



