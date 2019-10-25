<?php
function auth($login, $passwd)
{
    $fd = fopen("../private/chat");
    flock($fd, LOCK_SH | LOCK_EX);
    $file = file_get_contents("../private/passwd");
    $file = unserialize($file);
    flock($fd, LOCK_UN);
    foreach($file as $usr)
        if($usr['login'] === $login && $usr['passwd'] === hash("whirlpool",$passwd))
            return(TRUE);
    return(FALSE);
}
?>