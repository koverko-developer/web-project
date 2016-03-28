<?php
  session_start();
  $login= $_SESSION['login'];
  $con =  mysqli_connect('localhost','root','c7vAr3','blog');
  $result = mysqli_query($con,"SELECT id FROM users WHERE login='$login'");
  $myrow = mysqli_fetch_array($result);
  $title=$myrow['Title'];
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Главная</title>
      <meta charset="utf-8">      
      <link href="../css/bootstrap.css" rel="stylesheet">
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/bootstrap.css.map" rel="stylesheet">
      <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../css/bootstrap-theme.css.map" rel="stylesheet">
      <link href="../css/bootstrap-theme.css" rel="stylesheet">
      <link href="../main.css" rel="stylesheet">
     
  </head>
  <body class="body-xx">    

<div class="img-logo">
  <img class="logos " src="../images/logo_polessu.png">
</div>
<div class="block1">    
 <div> 
   <form method="post">
    <ul class="nav nav-tabs">
      <li>
        <a href="../index.php">Главная</a>
      </li>      
      <li><a href="../vacansy.php">Студенты</a></li>
      <li><a href="../banki.php">Банки</a> </li>    
      <li><a href="../news.php">Новости</a></li>   
      <li><button type="submit" name="submit_info" class="btn btn-ex">Личный кабинет</button></li>
      <li><button type="submit" name="submit_exit" class="btn btn-ex">Выйти</button></li>     
             
    </ul> 
     </form>
 </div>   
</div>
<div class="header-text">
    Конструктор резюме для студентов ПолесГУ
</div>
  </body>
</html>
<?php
  if(isset($_POST['submit_info'])){
    if ($title==0){
    echo '<script>location.replace("../admin_news.php");</script>'; exit;
    }
    if ($title==1){
    echo '<script>location.replace("../admin/moder.php");</script>'; exit;
    }
    if ($title==2){
    echo '<script>location.replace("../prof/prof_cont.php");</script>'; exit;
    }
  }
 if(isset($_POST['submit_exit'])){
   unset($_SESSION['login']);
   session_destroy();
   echo '<script>location.replace("../index.php");</script>'; exit;
 }
?>
