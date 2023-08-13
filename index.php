<?php include("includes/config.php"); ?>
<?php
$page_title = "Startsida";
include("includes/header.php");
?>


<h1> Senaste nyheter </h1> 
<article id = "postHolder"> 


<?php
$nyheter = new Nyhet();
$list = $nyheter->getnyheter();
foreach($list as $row){
    $innehall = $row['innehall'];
    ?> 
    <article class="article">
    <?php 
     echo  "" . "<h3>" .  $row['titel']. "</h3>" ;
     echo  "" . "<h4 class='tid'>" . "författare är : ".  $row['username']. "</h4>" ;
     echo  "<p class='tid'>" .  $row['tid']. "</p>";
     echo  "<p class='div' onscroll='myFunction()' > " .  $innehall . "</p>"; 
    ?> 
    <p class='radera'>  <a href= "details.php?id=<?= $row['id']; ?> ">öppna nyhet</a> </p> </article>
    <?php
}

?>


</article> 
</div>
</div>

