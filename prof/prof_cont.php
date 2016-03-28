<?php
  session_start();
   require ('../admin/conn.php');
   require_once('../admin/conn.php');
   $con =  mysqli_connect('localhost','root','c7vAr3','blog');
   $login = $_SESSION['login'];  
   $result = mysql_query("SELECT * FROM users WHERE login='$login'");
   $myrow = mysql_fetch_array($result);
   $id = $myrow['id'];
   $result2 = mysqli_query($con,"SELECT * FROM users,profile WHERE users.id=$id AND users.id=profile.prof_id"); 
   $myrow2 = mysqli_fetch_array($result2);  

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
  <body class="body-prof">
    <div >
        <?php include "header_exit.php" ?>
      </div>
    <div class="text_p">
      <h1><b>Редактирование профиля</b></h1>
    </div>
    <div >
      <div>
        <?php
         echo "<section>
               <div class=prof_n>
              <h1><i>{$myrow['SurName']}</i></h1>
              <h1><i>{$myrow['Name']}</i></h1>
              </div>      
              </section>";
        
        ?>
      </div>
      <div class="inf_l">
        <br><h4><b>Личная информация</b></h4><hr>
      </div>
      <div>
      <form class="form-horizontal" method="post">
  
  <fieldset >        
    <div class="form-group">
      <label for="inputInf" class="control-label col-xs-2 ">Коротко о Себе:</label>
      <div class="col-xs-10">         
        
        <textarea class="form-control upd_inf" id="info" name="i_info"><?php echo $myrow2['o_sebe']?> </textarea>
      </div>
    </div>    
    <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="submit_info" class="btn btn-primary">Сохранить</button>
        <input type = "reset" value = "Очистить форму" class="btn btn-primary">
      </div>
    </div>    
  </fieldset>
</form>
    </div>
    <div class="inf_l">
        <br><h4><b>Профессиональные навыки и умения</b></h4><hr>
      </div>  
      <div>
      <form class="form-horizontal" method="post">
  
  <fieldset >        
    <div class="form-group">
      <label for="input_f" class="control-label col-xs-2 ">Факультет</label>
      <div class="col-xs-10">         
        
        <textarea class="form-control upd_inf2" id="info_f" name="i_faculty"><?php echo $myrow2['Faculty'] ?> </textarea>        
      </div>
    </div>
     <div class="form-group">
      <label for="input_s" class="control-label col-xs-2 ">Специальность</label>
      <div class="col-xs-10">         
        
        <textarea class="form-control upd_inf2" id="info_s" name="i_spec"><?php echo $myrow2['Speciality']?> </textarea>        
      </div>
    </div>   
     <div class="form-group">
      <label for="input_c" class="control-label col-xs-2 ">Курс</label>
      <div class="col-xs-10">         
        
        <textarea class="form-control upd_inf2" id="info_c" name="i_course"><?php echo $myrow2['Course'] ?> </textarea>        
      </div>
    </div>   
     <div class="form-group">
      <label for="input_m" class="control-label col-xs-2 ">Средний бал</label>
      <div class="col-xs-10">         
        
        <textarea class="form-control upd_inf2" id="info_m" name="i_mark"><?php echo $myrow2['Mark'] ?> </textarea>        
      </div>
    </div>   
     <div class="form-group">
      <label for="input_skill" class="control-label col-xs-2 ">Навыки и умения</label>
      <div class="col-xs-10">         
        
        <textarea class="form-control upd_inf" id="info" name="i_skills"><?php echo $myrow2['skills'] ?> </textarea>        
      </div>
    </div>   
    <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="submit_skill" class="btn btn-primary">Сохранить</button>
        <input type = "reset" value = "Очистить форму" class="btn btn-primary">
      </div>
    </div>    
  </fieldset>
</form>
    </div>
      <div class="inf_l">
        <br><h4><b>Контактные данные</b></h4><hr>
      </div>  
      <div>
      <form class="form-horizontal" method="post">
  
  <fieldset >        
    <div class="form-group">
      <label for="inputInf" class="control-label col-xs-2 ">Телефон, skype, vk.com и другое:</label>
      <div class="col-xs-10">         
        
        <textarea class="form-control upd_inf" id="info_con" name="i_contact"><?php echo $myrow2['kontacts'] ?> </textarea>
      </div>
    </div>    
    <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="submit_cont" class="btn btn-primary">Сохранить</button>
        <input type = "reset" value = "Очистить форму" class="btn btn-primary">
      </div>
      
    </div>    
  </fieldset>
</form>
    </div>
      <div class="inf_l">
        <br><h4><b>Дополнительная информация</b></h4><hr>
      </div>  
      <div>
      <form class="form-horizontal" method="post">
  
  <fieldset >        
    <div class="form-group">
      <label for="inputInf" class="control-label col-xs-2 ">Цели, задачи, иностранные языки и иная информация:</label>
      <div class="col-xs-10">         
        
        <textarea class="form-control upd_inf" id="info" name="i_other"><?php echo $myrow2['other']?> </textarea>
      </div>
    </div>    
    <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" name="submit_other" class="btn btn-primary">Сохранить</button>
        <input type = "reset" value = "Очистить форму" class="btn btn-primary">
      </div>
      
    </div>    
  </fieldset>
</form>
    </div>
    </div>
  </body>
</html>
<?php
   if(isset($_POST['submit_info'])){
   $i_info =$_POST['i_info'];
   $results = mysql_query("UPDATE profile SET o_sebe='$i_info' WHERE prof_id=$id");
   exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
   }
          
          
   if(isset($_POST['submit_skill'])){
     $i_fac =$_POST['i_faculty'];
     $i_spec =$_POST['i_spec'];
     $i_cours =$_POST['i_course'];
     $i_mark =$_POST['i_mark'];
     $i_skill =$_POST['i_skills'];
     
     $skillp = mysql_query("INSERT INTO users (Faculty,Speciality,Course,Mark) VALUE ('$i_fac,'$i_spec,'$i_cours','$mark') WHERE id='$id'");
     $skillp_u = mysql_query("UPDATE users SET Faculty='$i_fac',Speciality='$i_spec',Course='$i_cours',Mark='$i_mark' WHERE id='$id'");
     
     $skill_u = mysql_query("UPDATE profile SET skills='$i_skill' WHERE prof_id=$id");
     $skil = mysql_query("INSERT INTO profile (skills) VALUE ('$i_skill') WHERE prof_id='$id'");
   exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
   }
    if(isset($_POST['submit_cont'])){
      $i_cont = $_POST['i_contact'];
      $contacts = mysql_query("UPDATE profile SET kontacts='$i_cont' WHERE prof_id='$id'");
      $contact = mysql_query("INSERT INTO profile (kontacts) VALUE ('$i_cont') WHERE prof_id='$id'");
      
      exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
    }
          
    if(isset($_POST['submit_other'])){
      $i_other = $_POST['i_other'];
      $cothers = mysql_query("UPDATE profile SET other='$i_other' WHERE prof_id='$id'");
      $other = mysql_query("INSERT INTO profile (other) VALUE ('$i_other') WHERE prof_id='$id'");
      
      exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
    }
?>