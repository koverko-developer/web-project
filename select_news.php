<?php
require('admin/conn.php');
require_once('admin/conn.php');
$sql = 'SELECT * FROM `blog` ORDER BY `date` DESC LIMIT '. $conf['pp'];
$otvet = mysql_query($sql);
?>
<div class="news_s">	
 		<?php
 		while($row = mysql_fetch_assoc($otvet)){ 			
                echo "<section>
              <div class=\"news_v\">  
              <h2>{$row['title']}</h2>
              {$row['content']}
              <p><i>{$row['date']}</i></p>
              </div>
              </section>";		
 		}                
 		?><br>       
 	</div>
<!DOCTYPE html>
<html>
  <head>
    <title>Новости</title>
      <meta charset="utf-8">      
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.css.map" rel="stylesheet">
      <link href="css/bootstrap-theme.css" rel="stylesheet">
      <link href="main.css" rel="stylesheet">
    <style>
		/*div - контейнер для новости*/
		.rss{margin:10px;  padding-bottom: 15px;}
		
		/*div - контейнер для всей ленты*/
		.rss_container{padding:10px; background: #fff;}
		
		/*div - контейнер для медиа-файлов*/
		.media{background-color:#f0f0f0; background-image:url(http://www.rss-script.ru/img/skrepka.gif); background-repeat:no-repeat; padding-top: 5px;padding-bottom: 5px;padding-left: 13px}
		
		/*div - ссылка на медиа-файл*/
		.media a{color:#000000;font-size:0.7em}
		
		/*div - изображение медиа-файл*/
		.media a img{height:16px; border:0px; vertical-align: middle; text-decoration: none; margin:3px;}
		
		/*div - контейнер даты новости и заголовка rss-канала*/
		.rssdate{font-size:0.7em; color:#c0c0c0; margin:7px; }
		
		/*div - ссылка даты новости и заголовка rss-канала*/
		.rssdate a{color:#c0c0c0;}
		
		</style>
		

<script type="text/javascript">var charset='UTF-8';var t=document.getElementsByTagName('meta');for(var i=0; i<t.length; i++){var rg=/charset=["']?([^"']*)/g;if(t[i].content.indexOf('charset')!=-1){charset=rg.exec(t[i].content)[1];break;}}document.write('<script type="text/javascript" src="http://www.rss-script.ru/rss-script.php?charset='+charset+'&rss[]=http://news.tut.by/rss/index.rss&count=10"><\/script>');</script><noscript>Для просмотра этой RSS ленты требуется поддержка Java Script</noscript>



  </head>
  <body class="body-xx">
    
      <div>
        <?php include "footer.php"?>        
      </div> 
   
      
  </body>
</html>  

