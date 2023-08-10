<?php include("includes/config.php"); ?>
<?php
$page_title = "Startsida";
include("includes/header.php");
?>


<h1> Här kan du läsa alla blogg på vår sida </h1> 
<article id = "postHolder"> 



<?php
$nyheter = new Nyhet();
$list = $nyheter->getallnyheter();
foreach($list as $row){
    $innehall = $row['innehall'];
    ?> 
    <article class="article">
    <?php 
     echo  "" . "<h3>" .  $row['titel']. "</h3>" ;
     echo  "" . "<h4 class='h4'>" . "författare är : ".  $row['username']. "</h4>" ;
     echo  "<p class='tid'>" .  $row['tid']. "</p>";
     echo  "<p class='text'> " .  substr($innehall, 0,  500,  ) . "...." . "</p>"; 
    ?> 
    <p class='radera'>  <a href= "details.php?id=<?= $row['id']; ?> ">läsa mer</a> </p> </article>
    <?php
}

?>


</article> 
