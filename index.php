<?php
session_start();

?>
<!doctype html>
<html lang="ru">
 <head>
	  <meta charset="UTF-8">
	  <link rel="stylesheet" href="mystyle.css">
	  <title>Одесские новости</title>   
 </head>

 <body style="background-color:

 <?php if(empty($_SESSION['userColor'])):  ?>
     <?= '#FFFFFF' ?>
 <?php else: ?>
     <?= $_SESSION['userColor'] ?>
 <?php endif; ?>">

  <div id="container">
  
   <div id="panel"><a href='admin/index.php'>Админ панель</a></div>

   <div id="header"><?php include "header.php"; ?></div>    
   
   <div id="nav"><?php include "nav.php"; ?></div>  
    
   <div id="aside"><?php include "aside.php"; ?></div>     
   
   <div id="content"> <?php include "articles.php"; ?></div>
   
   <div id="footer"><?php include "footer.php"; ?></div>   
   
  </div>
 </body>
</html>