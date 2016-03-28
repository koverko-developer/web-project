<?php

function print_rss($url_rss,$file_rss,$hclock,$kol_print_news)
  {
    //$url_rss - URL-адрес RSS потока
    //$file_rss - адресс файла для хранения RSS-новостей
    //$hclock - время обновления, в часах
    //$kol_print_news - количество выводимых новостей
    
    
    
    if (!file_exists($file_rss) || ( filemtime($file_rss) + $hclock*60*60 < time() ) )//если файл не сохраняли, то сохраняем на локальном сервере или если существует, то проверяем устарел ли файл (не более Х часов назад он записан)
      {
       if (@!copy ($url_rss,$file_rss))
         return (false);
       
       $text_rss=file($file_rss);
       $text_rss=implode("",$text_rss);
       //преобразуем кодировку данных
       //если не нежно конвертировать кодировку, то комментируем ниже идущее условие или редактируем
       if (preg_match('/<?xml[^>]+encoding[\s]*=[\s]*("|\')windows-1251("|\')[^>]+?>/i', $text_rss))
         {
          
          $text_rss = iconv("cp1251", "utf-8", $text_rss);
          file_put_contents($file_rss, $text_rss);//пишем данные обратно в файл
          
         }
      }
    
    
    $text_rss=file($file_rss);
    $text_rss=implode("",$text_rss);
    
    $url_image = "";
    $image_is=preg_match("#<image>(.*?)</image>#is",$text_rss,$image_m);
    if ( $image_is )
      {
       
       $image_url_is = preg_match("#<url>(.*?)</url>#is",$image_m[0],$image_t);
       
       if ( $image_url_is )
         $url_image = $image_t[1];
      }
    
    $mas_item=array();
    preg_match_all("#<item>.*?</item>#is",$text_rss,$mas_item);
    
    $one_item=array();
    $t="";
    
    $t.=( $url_image ? "<div><img src='".$url_image."'  ></div>" :"");
    
    $kol=0;
    if (sizeof($mas_item)>0)
      {
       
       foreach ($mas_item[0] as $one_item)
         {
          
          $date = "";
          $kol++;
          $t_is=preg_match("#<title>(.*?)</title>#is",$one_item,$title);
          $l_is=preg_match("#<link>(.*?)</link>#is",$one_item,$link);
          $d_is=preg_match("#<description>(.*?)</description>#is",$one_item,$description);
          
          $date_is=preg_match("#<pubDate>(.*?)</pubDate>#is",$one_item,$date_t);
          
          if ($t_is && $l_is)
            {
             $title[1]=preg_replace("#<\!\[CDATA\[(.*?)\]\]>#eis","'\\1'",$title[1]);
             $link[1]=preg_replace("#<\!\[CDATA\[(.*?)\]\]>#eis","'\\1'",$link[1]);
             $description[1]=preg_replace("#<\!\[CDATA\[(.*?)\]\]>#eis","'\\1'",$description[1]);
             
             if ( $date_is )
               $date = strtotime($date_t[1]);
             
             
             $t.="<div><a href='".$link[1]."' target='_blank'>".$title[1]."</a> 
              <br>"
              .$description[1]
              .( $date ? "<br>".date("d.n.Y",$date) : "" )
              ."</div>";
             
            }
          if ($kol >= $kol_print_news) break;
         }
      }

    echo ($t);

    
    return (true);
  }


