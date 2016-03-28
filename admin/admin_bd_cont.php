<?php
  session_start();
  require('conn.php');
  require_once('conn.php');
$sql = "SELECT * FROM `mail`";
$otvet = mysql_query($sql);
?>

<html>
  <head>
    <title>Форма регистрации</title>
      <meta charset="utf-8">      
      <link href="../css/bootstrap.css" rel="stylesheet">
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/bootstrap.css.map" rel="stylesheet">
      <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../css/bootstrap-theme.css.map" rel="stylesheet">
      <link href="../css/bootstrap-theme.css" rel="stylesheet">
      <link href="../main.css" rel="stylesheet">
  </head>
  <body >    
    <h2>Почта</h2><br>
    <div class="email-r">
        <table class="table table-hover table-bordered">
  <tr>
    <td><b>Имя</b></td>
    <td><b>E-mail</b></td>
    <td><b>Сообщение</b></td>    
  </tr>    
      <?php
      while($row = mysql_fetch_assoc($otvet)){ 			
                echo "<section>
      <tr>                  
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['message']}</</td>        
      </tr>
        </section>";
        }
      ?>  
</table>
    </div>
  </body>
</html>
