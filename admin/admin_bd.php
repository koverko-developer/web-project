<?php
  session_start();
  $var=$_SESSION['login'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin-панель</title>
     <meta charset="utf-8">      
      <link href="../css/bootstrap.css" rel="stylesheet">
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/bootstrap.css.map" rel="stylesheet">
      <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../css/bootstrap-theme.css.map" rel="stylesheet">
      <link href="../css/bootstrap-theme.css" rel="stylesheet">
      <link href="../main.css" rel="stylesheet">
     
  </head>
  <body class="body-xx admin-panel">
     <?php
      if (empty($var)) {        
        include "header.php"  ;         
      }
      else {
        include "../prof/header_exit.php";
      }?>
      <div class="menu-admin">
    <?php
    include('menu_admin.php');
    ?>
  </div>
    <div class="newss">
        <?php include "admin_bd_cont.php" ?>
      </div> 
  </body>
</html>
<?php
  require ('conn.php');
  
        
        
?>