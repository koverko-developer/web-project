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
    
      <div >
        <?php include "header.php" ?>
      </div>
    <h2 class="text_fr">Форма регистрации</h2>
    <div class="reg_form">
      <form class="form-horizontal"  method="post">
  
  <fieldset >  
    <div class="form-group">
      <label for="text" class="control-label col-xs-2">Фамилия</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" id="inputsurname" name="surname" placeholder="Пупкин" required>
      </div>
    </div>
    <div class="form-group">
      <label for="text" class="control-label col-xs-2">Имя</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" id="inputname" name="name" placeholder="Вася" required>
      </div>
    </div>
    <div class="form-group">
      <label for="text" class="control-label col-xs-2">Логин</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" id="inputLogin" name="login" placeholder="student123" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputEmail" class="control-label col-xs-2">E-mail</label>
      <div class="col-xs-10">
        <input type="email" class="form-control" id="inputEmail" placeholder="E-mail" name="email" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputPassword" class="control-label col-xs-2">Пароль</label>
      <div class="col-xs-10">
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Пароль" required>
      </div>
    </div>
    <div class="form-group ">
      <label for="inputPassword" class="control-label col-xs-2">Повторите пароль</label>
      <div class=" col-xs-10 ">
        <input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="Пароль" required>
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="submit" class="btn btn-primary">Зарегистрироваться</button>
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
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    if ($password!=$password2)
    {
      {echo "<script type='text/javascript'>
window.onload = function(){ alert('Пароли должны совпадать');}
</script>";
                    die();}
    }
    $result = mysql_query("SELECT id FROM users WHERE login='$login'");
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {echo "<script type='text/javascript'>
window.onload = function(){ alert('Этот логин занят');}
</script>";
                    die();
}
        
        
$result2 = mysql_query("SELECT id FROM users WHERE email='$email'");
$myrow2 = mysql_fetch_array($result2);
if (!empty($myrow2['id'])) {echo "<script type='text/javascript'>
window.onload = function(){ alert('Пользователь с такой электронной почтой уже зарегистрирован');}
</script>";
                    die();
}
        
$sql="INSERT INTO users(email,login,password,SurName,Name) VALUES ('$email','$login','$password','$surname','$name')";
$res=mysql_query($sql);
    
if ($res=='TRUE')
{ $results = mysql_query("INSERT INTO profile (o_sebe ) VALUES ('') WHERE login='$login'");
  echo "<script type='text/javascript'>
window.onload = function(){ alert('Вы успешно зарегистрированы.');}
</script>";
                    die();
echo '<script>location.replace("form_autorization.php");</script>'; exit;
}
else {
  
  echo "<script type='text/javascript'>
window.onload = function(){ alert('Ошибка! Вы не зарегистрированы.')
                                  ;}
</script>";
                    die();

}        
        
  }

?>
