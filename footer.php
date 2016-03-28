<div class="footer-div">
    <div class="in_bl_foot foot-text-left">
        <h4>Свяжитесь с нами</h4><br>
        <img class="btn_backg" src="images/facebook.png">Facebook<img class="btn_backg-l" src="images/google.png">Google+<br><br>
        <img class="btn_backg" src="images/twitter.png">Twitter<img class="btn_backg-l" src="images/youtube.png" style="margin-left:28px">Youtube<br><br>
        <img class="btn_backg" src="images/blogger.png">Blog<img class="btn_backg-l" src="images/feed.png" style="margin-left :48px">RSS<br><br><br>
        &copy;<strong>  Коверко Дмитрий</strong>
    </div>
  
    <div class="in_bl_foot" >
      <form method="post">
        <div class="form_obr">
            <h2>Форма обратной связи</h2>
            <h4>Здесь вы можете отправить нам сообщение</h4>
            <label for="inputPassword" class="col-sm-2 control-label">Ваше имя:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Вася" required><br>
            </div>
            <label for="inputPassword" class="col-sm-2 control-label">Ваш<br> e-mail:</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.ru" required><br>
            </div>
            <label for="inputPassword" class="col-sm-2 control-label">Сообщение:</label>
                <div class="col-sm-10 ">
                  <textarea class="form-control mess" id="messqge" name="message" placeholder="Message" required></textarea><br>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-left:15px" name="submit_message">Отправить</button>
        </div> </form>
    </div>    
 
</div>
<?php
   require ('admin/conn.php');
  if(isset($_POST['submit_message'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $sql="INSERT INTO mail(email,name,message) VALUES ('$email','$name','$message')";
$res=mysql_query($sql);
if ($res=='TRUE')
{echo "<script type='text/javascript'>
window.onload = function(){ alert('Ваше письмо отправлено.');}
</script>";
                    die();}
else {
exit ("Ошибка!Письмо не отправлено.");
}        
        
  }    
  
    
?>