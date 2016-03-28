<?php

require('admin/conn.php');
require_once('admin/conn.php');
$sql = 'SELECT * FROM users';
$otvet = mysql_query($sql);
?>
<h1 class="vac-com">Студенты</h1>
<table class="table table-hover table-bordered ">
  <tr>
    <td><b>Фамилия</b></td>
    <td><b>Имя</b></td>
    <td><b>Факультет</b></td>
    <td><b>Специальность</b></td>
    <td><b>Курс</b></td>
    <td><b>Средний балл</b></td>
    <td><b>E-mail</b></td>
  </tr>
    
      <?php
      while($row = mysql_fetch_assoc($otvet)){ 			
                echo "<section>
      <tr>          
                
        <td><a href='../prof/prof_users.php?loginn={$row['login']}'>{$row['SurName']}</a></td>
        <td>{$row['Name']}</td>
        <td>{$row['Faculty']}</</td>
        <td>{$row['Speciality']}</td>
        <td>{$row['Course']}</td>
        <td>{$row['Mark']}</td>
        <td>{$row['email']}</td>
      </tr>
        </section>";
        }
      ?>  
</table>

