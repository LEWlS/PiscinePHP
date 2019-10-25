<?php
date_default_timezone_set('Europe/Paris');
$fd = fopen("../private/chat");
flock($fd, LOCK_SH | LOCK_EX);
$file = file_get_contents("../private/chat");
$file = unserialize($file);
foreach($file as $elem)
{
    if($elem['time'] != 0 && $elem['login'] !== '' && $elem['msg'] !== '')
        echo(date("[H:i] ", $elem['time'])."<b>".$elem['login']."</b>: ".$elem['msg']."<br />");
}
flock($fd, LOCK_UN);
?>
