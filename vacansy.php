<?php
  session_start();
  $var=$_SESSION['login'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Студенты</title>
      <meta charset="utf-8">      
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.css" rel="stylesheet">
      <link href="main.css" rel="stylesheet">
     
  </head>
  <body class="body-xx fon_b">
     <?php
      if (empty($var)) {        
        include "header.php"  ;         
      }
      else {
        include "prof/header_exit.php";
      }
    ?>
      <div >
        <?php include "vacansy_content.php"?>        
      </div>
      <div >
        <?php include "footer.php"?>        
      </div> 
   
      
  </body>
</html>