<?php
session_start();
if($_SESSION['loggued_on_user'] === '')
{
    echo("ERROR\n");
}
else if($_POST['msg'] != '')
{
    $new_msg = array(array(
        'login' => $_SESSION['loggued_on_user'],
        'time' => time(),
        'msg' => $_POST['msg'],
    ));
    if (!file_exists("../private"))
            mkdir('../private');
    if (file_exists("../private/chat"))
    {
        $fd = fopen("../private/chat", "c+");
        flock($fd, LOCK_SH | LOCK_EX);
        $file = file_get_contents("../private/chat");
        $file = unserialize($file);
        $final = array_merge($file, $new_msg);
        $final = serialize($final);
        file_put_contents("../private/chat", $final . "\n");
        flock($fd, LOCK_UN);
    }
    else
    {
        $final = serialize($new_msg);
        file_put_contents("../private/chat", $final . "\n");
    }
}
?>

<html>
    <head>
        <script langage="javascript">top.frames['chat'].location = 'chat.php';</script> 
    </head>
    <body>
        <form method="post" action="speak.php">
            <input type="text" name="msg"><input type="submit" name="submit" value="Envoyer"/>
        </form>   
    </body>
</html>