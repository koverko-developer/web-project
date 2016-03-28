<?php
  session_start();
 require ('../admin/conn.php');
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
 
    <body>    
    <div class="users_adm">
      <h2 class=""><b>Пользователи</b></h2></b>
    <div class="users_p">
      <h3>Изменение прав пользователей: </h3><br>
      <div class="usersa">
          <h4>Добавить модератора:</h4><br>
          <form class="form-horizontal admin_news users_u"  method="post"> 
            <fieldset >    
              <div class="form-group" >
                <label for="text" class="control-label col-xs-2">Логин</label>
                <div class="col-xs-10">  
                  <input type="text" class="form-control" id="inputdlogin" name="Mlogin" placeholder="введите login" ><br>
                </div>      
                <div class="col-xs-offset-2 col-xs-10">
                  <button type="submit" name="Minsert" class="btn btn-primary">Назначить модератором</button>      
              </div>  
              </div>       
            </fieldset>
          </form>      
      </div>
      <div class="usersa">
          <h4>Добавить администратора:</h4><br>
          <form class="form-horizontal admin_news users_u"  method="post"> 
            <fieldset >    
              <div class="form-group" >
                <label for="text" class="control-label col-xs-2">Логин</label>
                <div class="col-xs-10">  
                  <input type="text" class="form-control" id="inputdlogin" name="Alogin" placeholder="введите login" ><br>
                </div>      
                <div class="col-xs-offset-2 col-xs-10">
                  <button type="submit" name="Ainsert" class="btn btn-primary">Назначить администратором</button>      
              </div>  
              </div>       
            </fieldset>
          </form>      
      </div>
    </div>
    
  </body>
</html>
<?php
  if(isset($_POST['Minsert'])){    
    $login = $_POST['Mlogin'];
    if(true){      
     
      $sql="UPDATE users SET Title='1' WHERE login='$login'";
      $res=mysql_query($sql);
      {echo "<script type='text/javascript'>
                  window.onload = function(){ alert ('Модератор успешно добавлен');}
                  </script>";
                                      die();  
                    }   
    }
    else{
      echo "<script type='text/javascript'>
                  window.onload = function(){ alert ('Ошибка добавления');}
                  </script>";
                                      die();  
    }
  }
    if(isset($_POST['Ainsert'])){    
    $login = $_POST['Alogin'];
    if(true){      
     
      $sql="UPDATE users SET Title='0' WHERE login='$login'";
      $res=mysql_query($sql);
      {echo "<script type='text/javascript'>
                  window.onload = function(){ alert ('Администратор успешно добавлен');}
                  </script>";
                                      die();  
                    }   
    }
    else{
      echo "<script type='text/javascript'>
                  window.onload = function(){ alert ('Ошибка добавления');}
                  </script>";
                                      die();  
    }
  }
  
?>