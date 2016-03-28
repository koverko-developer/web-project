<?php
   require ('../admin/conn.php');
   require_once('../admin/conn.php');
   $log = $_GET['loginn'];
   $result = mysql_query("SELECT * FROM users WHERE login='$log'");
   $myrow = mysql_fetch_array($result);
   $id = $myrow['id'];
   $result2 = mysql_query("SELECT * FROM users,profile WHERE users.id=$id AND users.id=profile.prof_id"); 
   $myrow2 = mysql_fetch_array($result2);
?>
<html>
  <head>
    <title>Редактирование профиля</title>
      <meta charset="utf-8">      
      <link href="../css/bootstrap.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.css" rel="stylesheet">
      <link href="../main.css" rel="stylesheet">
     
  </head>
  <?php
    include '../header.php';
  ?>
  <body class="body-prof">    
    <div class="pr_us">
     
    <div class="text_name">
      <h2>Профиль студента:</h2>
       <div class="text_name_1">
      <h1><?php echo $myrow2['SurName'] ?></h1>
      </div>
      <div class="text_name_2">
      <h1><?php echo $myrow2['Name'] ?></h1>
      </div>
    </div><hr class="hr-1">
      <div class="cont1">
    <div class="text_ed">
      <h2><i>Образование:</i></h2>
      <div class="text_f">
         Факультет:   <?php echo $myrow2['Faculty']?> ;<br>
         Специальность:   <?php echo $myrow2['Speciality']?>;<br>
         Курс:   <?php echo $myrow2['Course']?>;<br>
         Средний балл:   <?php echo $myrow2['Mark']?>;
      </div>
      </div><hr> 
    </div>
       <div class="cont1 cont_r">
        <div class="text_ed">
      <h2><i>Контактные данные:</i></h2>
      <div class="text_f">
         <?php echo $myrow2['kontacts']?>
      </div>
    </div>
      </div>
    <div class="text_ed">
      <h2><i>Навыки и умения:</i></h2>
      <div class="text_f">
         <?php echo $myrow2['skills']?>
      </div>
    </div><hr>
    <div class="text_ed">
      <h2><i>Личная информация:</i></h2>
      <div class="text_f">
         <?php echo $myrow2['o_sebe']?>
      </div>
    </div><hr>
    <div class="text_ed">
      <h2><i>Дополнительная информация:</i></h2>
      <div class="text_f">
         <?php echo $myrow2['other']?>
      </div>
    </div>
      
     
      </div>
  </body>
</html>