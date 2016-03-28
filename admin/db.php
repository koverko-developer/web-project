<?php

    function connect(){
        $link = mysql_connect('localhost', 'root', '');
                if (!$link) {
                    die('Error ' . mysql_error());
                }
                echo 'Good';
    }

function add_in_info($firstname,$name,$age){
    $sql = "INSERT INTO `info_posts`.`infornation` (`FirstName`, `Name`, `Age`) VALUES ('$firstname', '$name', $age)";
    $res= mysql_query($sql,connect);
}

?>
