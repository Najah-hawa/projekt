<?php include_once("includes/config.php"); 
$page_title = "userblogg";?>
<?php
//kontoll om id send
if(isset($_GET['username'])){
    $username= strval($_GET['username']);
}else{
 header ("Location: index.php");
}
?>
<?php
include("includes/header.php");
?>

<?php 
//SQL-fråga för att läsa ut inlaggda nyheter från tabellen  
$nyhet = new Nyhet();
$list = $nyhet->getuserblogg($username);

foreach($list as $row){
       $innehall = $row['innehall'];
       
    ?> 
    <article class="article">
    <?php 
     echo  "" . "<h3>" .  $row['titel']. "</h3>" ;
     echo  "" . "<h4 class='h4'>" . "författare är : " .  $row['username']. "</h4>" ;
     echo  "<p class='tid'>" .  $row['tid']. "</p>";
     echo  "<p class='text'> " .  $innehall. "</p>"; 
    ?> 


</article>
    <?php
}
?>

</div>
</div>
