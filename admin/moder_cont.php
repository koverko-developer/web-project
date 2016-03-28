<html>
  <head>
    <title>Модераторская</title>
      
  </head>
  <body >    
    <h2>Редактирование новостей</h2><br>
    <div >
      <h3>Добавление новости:</h3><br >
      <form class="form-horizontal admin_news"  method="post">
  
  <fieldset >    
    <div class="form-group" >
      <label for="text" class="control-label col-xs-2">Тема</label>
      <div class="col-xs-10">
        <textarea type="text" class="form-control" id="inputtitle" name="title" placeholder="курсовая работа" required></textarea>
      </div><br><br><br>
      <label for="text" class="control-label col-xs-2">Новость</label>
      <div class="col-xs-10">
        <textarea type="text" class="form-control" id="inputnews" name="news" placeholder="Заполните контент" required></textarea><br>
      </div>       
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="insert" class="btn btn-primary">Добавить новость</button>      
    </div>  
    </div>       
  </fieldset>
</form>      
    </div>
    <div class="insert_news">
      <h3>Редактирование новости:</h3><br >
      <form class="form-horizontal admin_news"  method="post">
  
  <fieldset >    
    <div class="form-group" >
      <label for="text" class="control-label col-xs-2">id</label>
      <div class="col-xs-10 del_id">  
        <input type="text" class="form-control" id="inputdid" name="id" placeholder="введите id новости" required><br>
      </div>
      <label for="text" class="control-label col-xs-2">Тема</label>
      <div class="col-xs-10">
        <textarea type="text" class="form-control" id="inputtitle" name="Updatetitle" placeholder="курсовая работа" ></textarea><br>  
      </div><br><br><br>
      <label for="text" class="control-label col-xs-2">Новость</label>
      <div class="col-xs-10">
        <textarea type="text" class="form-control" id="inputnews" name="Updatenews" placeholder="Заполните контент" ></textarea><br>
      </div>     
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="update" class="btn btn-primary">Обновить новость</button>      
    </div>  
    </div>       
  </fieldset>
</form>      
       </div>
    <div class="insert_news">
      <h3>Удаление новости:</h3><br >
      <form class="form-horizontal admin_news"  method="post">
  
  <fieldset >    
    <div class="form-group" >
      <label for="text" class="control-label col-xs-2">id</label>
      <div class="col-xs-10 del_id">  
        <input type="text" class="form-control" id="inputdid" name="Deleteid" placeholder="введите id новости" ><br>
      </div>
      <label for="text" class="control-label col-xs-2">Тема</label>
      <div class="col-xs-10">
        <textarea type="text" class="form-control" id="inputtitle" name="Deletetitle" placeholder="курсовая работа" ></textarea><br>  
      </div><br><br><br>
      <label for="text" class="control-label col-xs-2">Новость</label>
      <div class="col-xs-10">
        <textarea type="text" class="form-control" id="inputnews" name="Deletenews" placeholder="Заполните контент" ></textarea><br>
      </div>     
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="delete" class="btn btn-primary">Удалить новость</button>      
    </div>  
    </div>       
  </fieldset>
</form>      
    </div>
  </body>
</html>
<?php
  if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $news = $_POST['news'];
    $date_day = date("d.m.Y");   
    if(true){
      $sql="INSERT INTO blog(title,date,content) VALUES ('$title','$date_day','$news')";
    $res=mysql_query($sql);
    
    {echo "<script type='text/javascript'>
window.onload = function(){ alert ('Новость успешно добавлена');}
</script>";
                    die();  
  }   
    }
     else {echo "<script type='text/javascript'>
window.onload = function(){ alert('Ошибка при добавлении');}
</script>";
                    die();
    }
    }
if(isset($_POST['update'])){
    $title = $_POST['Updatetitle'];
    $news = $_POST['Updatenews'];
    $id = $_POST['id'];
    if(true){
      if($id!="")  {
      if(($title!="")&&($news!=""))
    {
      $sql="UPDATE blog SET title='$title',content='$news' WHERE id='$id'";
      $res=mysql_query($sql);
      {echo "<script type='text/javascript'>
                  window.onload = function(){ alert ('Новость успешно обновлена');}
                  </script>";
                                      die();  
                    }   
    }
    else {
      if($news==""){
        $sql="UPDATE blog SET title='$title' WHERE id='$id'";
        $res=mysql_query($sql);
        {echo "<script type='text/javascript'>
                  window.onload = function(){ alert ('Новость успешно обновлена');}
                  </script>";
                                      die();  
                    }   
      }
      else{
        if($title==""){
          $sql="UPDATE blog SET content='$news' WHERE id='$id'";
          $res=mysql_query($sql);
          {echo "<script type='text/javascript'>
                  window.onload = function(){ alert ('Новость успешно обновлена');}
                  </script>";
                                      die();  
                    }   
        }
        else{
            {echo "<script type='text/javascript'>
                    window.onload = function(){ alert ('Ошибка обновления новости');}
                    </script>";
                                        die();  
                      }         
        }
      }
    }
    }
    else {
      {echo "<script type='text/javascript'>
                    window.onload = function(){ alert ('Ошибка обновления новости');}
                    </script>";
                                        die();  
                      }       
    }
  
    }
    
    }
 if(isset($_POST['delete'])){
    $title = $_POST['Deletetitle'];
    $news = $_POST['Deletenews'];
    $id=$_POST['Deleteid'];   
    if(true){
      if($id!="") {
        $sql="DELETE FROM blog WHERE id='$id'";
        $res=mysql_query($sql);    
            {echo "<script type='text/javascript'>
        window.onload = function(){ alert ('Новость успешно удалена');}
        </script>";
                            die();  
          }   
      }
      else{
        if($title!="") {
        $sql="DELETE FROM blog WHERE title='$title'";
        $res=mysql_query($sql);    
            {echo "<script type='text/javascript'>
        window.onload = function(){ alert ('Новость успешно удалена');}
        </script>";
                            die();  
          }   
      }
        else{
          if($news!="") {
        $sql="DELETE FROM blog WHERE content='$news'";
        $res=mysql_query($sql);    
            {echo "<script type='text/javascript'>
        window.onload = function(){ alert ('Новость успешно удалена');}
        </script>";
                            die();  
          }   
        }
          {echo "<script type='text/javascript'>
        window.onload = function(){ alert ('Ошибка удаления новости');}
        </script>";
                            die();  
          }   
        
     }
    }
    }
    else
        {echo "<script type='text/javascript'>
        window.onload = function(){ alert ('Ошибка удаления новости');}
        </script>";
                            die();  
          }   
      }
      
?>