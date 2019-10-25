<?php
function auth($login, $passwd)
{
    $file = file_get_contents("../private/passwd");
    $file = unserialize($file);
    foreach($file as $usr)
        if($usr['login'] === $login && $usr['passwd'] === hash("whirlpool",$passwd))
            return(TRUE);
    return(FALSE);
}
?>