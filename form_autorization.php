<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Форма регистрации</title>
      <meta charset="utf-8">      
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.css" rel="stylesheet">
      <link href="main.css" rel="stylesheet">
     
  </head>
  <body class="body-xx">
    <?php              
        include "header.php" 
    ?>
      
    <h2 class="text_fr">Форма входа</h2>
    <div class="aut_form">
      <form class="form-horizontal"  method="post">
  
  <fieldset >    
    <div class="form-group">
      <label for="text" class="control-label col-xs-2">Логин</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" id="inputLogin" name="login" placeholder="student123" required>
      </div>
    </div>    
    <div class="form-group">
      <label for="inputPassword" class="control-label col-xs-2">Пароль</label>
      <div class="col-xs-10">
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Пароль" required>
      </div>
    </div>    
    <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="submit" class="btn btn-primary">Войти</button>
        <input type = "reset" value = "Очистить форму" class="btn btn-primary">
      </div>
    </div>    
  </fieldset>
</form>
    </div>
    
     
  </body>
</html>
<?php    
   require ('admin/conn.php');           
  if(isset($_POST['submit'])){
    $log_bool ="FALSE";   
    $pass_bool ="FALSE";
    $login = $_POST['login'];    
    $password = $_POST['password'];
    
    $result = mysql_query("SELECT id FROM users WHERE login='$login'");
    $myrow = mysql_fetch_array($result);    
    $result2 = mysql_query("SELECT * FROM users WHERE login='$login'");
    $myrow2 = mysql_fetch_array($result2);
    $title = $myrow2['Title'];
      if (!empty($myrow['id'])) { $log_bool="TRUE";$_SESSION['login']=$login;
                                 
                                }
      else {
        echo "<script type='text/javascript'>
      window.onload = function(){ alert('Неверный логин');}
      </script>";
                          die();
      }
      if($myrow2['password']==$password)
      {$pass_bool ="TRUE";}
      else {
        echo "<script type='text/javascript'>
      window.onload = function(){ alert('Неверный пароль');}
      </script>";
                          die();
      }
      if(($log_bool=="TRUE")&&($pass_bool=="TRUE"))
      {   
        if($title==1){
            echo '<script>location.replace("../admin/moder.php");</script>'; exit;          
        }
        else
        if ($title==0){
        echo '<script>location.replace("../admin_news.php");</script>'; exit;
        }
        else
        if($title==2){echo '<script>location.replace("../prof/prof_cont.php");</script>'; exit;}     
        }      
  } 
?>