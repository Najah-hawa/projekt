<!DOCTYPE html>
<html lang="sv">
<head>
    <title><?= $page_title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header> 
            <div id="mainheader" class= "topnav">
            <a href="#" class= "active" id="active" >mamma-blog</a>
<?php
include("includes/mainmenu.php");
?>
</div>
    </header>

<script src="js/index.js" ></script>


<div class="container"> 
<div class= "medlemmar" > 
    <h2>Medlemmar </h2>
<nav>


<ul>
<?php
//SQL-fråga för att läsa ut användare namn 
$users = new Users();
$list = $users ->getusername();
foreach($list as $row){
    ?> 

      <li class= "li" >  <a href= "medlemar.php?username=<?= $row['username']; ?>"> <?php echo $row['username'] ;  ?></a> </li> 
<?php 
}
?>
</ul>
    </nav>
</div> 
<div class= main-container> 