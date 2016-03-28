<?php
  session_start();
  $var=$_SESSION['login'];
?>
<?php
require('admin/conn.php');
require_once('admin/conn.php');

$counter = mysql_query('SELECT COUNT(`id`) FROM `blog`');
$counter = mysql_fetch_array($counter);
$pages = intval( ($counter[0] - 1) / $conf['pp']) + 1;


if( isset($_GET['page'])) {
// Да, пользователь что-то передал
$page = (int) $_GET['page'];
	if ( $page > 0 && $page <= $pages ) {
		// Вычисляем с какого номера статьи надо начинать выводить
		$start = $page * $conf['pp'] - $conf['pp'];
		$sql = "SELECT * FROM `blog` ORDER BY `date` DESC LIMIT {$start}, {$conf['pp']}";
	}
	else { 
		$sql = 'SELECT * FROM `blog` ORDER BY `date` DESC LIMIT '. $conf['pp']; 
		$page = 1;
	}
}
else {
$sql = 'SELECT * FROM `blog` ORDER BY `date` DESC LIMIT '. $conf['pp'];
$page = 1;
}
$otvet = mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <title>Новости</title>
        <link rel="stylesheet" href="style.css" />
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.css" rel="stylesheet">
      <link href="main.css" rel="stylesheet">
    </head>
    <body class="body-xx">
		
      <div class="str">
       
        <?php
      if (empty($var)) {        
        include "header.php"  ;         
      }
      else {
        include "prof/header_exit.php";
      }?>
        <div>
          <?php include "select_news.php" ?>        
        </div>
        
        
      </div>   
	  
      
      
        
  </body>
</html>