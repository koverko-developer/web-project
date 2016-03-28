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
<div>
            <?php
                if( $page > 1 ) echo '<a href="news.php?page='.($page-1).'">← туда</a>';
                if( $page < $pages ) echo '<a href="news.php?page='.($page+1).'">туда →</a>';
                ?>      
        </div> 