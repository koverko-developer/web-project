<?php
  session_start();
  $var=$_SESSION['login'];
?>
<?php
  require('admin/conn.php');
require_once('admin/conn.php');
$sql = 'SELECT * FROM banki';
$otvet = mysql_query($sql);
?>
<html>
  <head>
    <title>Главная</title>
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
      <div class="sp_bank">
        <h2>Список банков:</h2>
      </div>
  <div class="div_mar">  
   <table class="table table-hover table-bordered">
  <tr>
    <td><b>Назвние банка</b></td>
    <td><b>Адрес</b></td>
    <td><b>Телефон</b></td>
    <td><b>E-mail</b></td>
    <td><b>Адрес сайта</b></td>
    <td><b>Минимальный средний балл</b></td>
    
  </tr>
    
      <?php
      while($row = mysql_fetch_assoc($otvet)){ 			
                echo "<section>
      <tr>          
                
        <td><i>{$row['name_b']}</i> </td>
        <td>{$row['address']}</td>
        <td>{$row['telephone']}</</td>
        <td>{$row['email']}</td>
        <td>{$row['site']}</td>
        <td>{$row['mark']}</td>
        
      </tr>
        </section>";
        }
      ?>  
</table>
    </div>
  </body>
</html>