<?php
function error()
{
    echo "ERROR\n";
    exit();    
}

function ok()
{
    echo "OK\n";
    exit();    
}

if ($_POST["submit"] !== NULL && $_POST["submit"] === "OK" && $_POST['login'] !== "" && $_POST['oldpw'] !== "" && $_POST['newpw'] !== "")
{
    $CHANGED = FALSE;
    $file = file_get_contents("../private/passwd");
    $file = unserialize($file);
    $i = 0;
    foreach($file as $usr)
    {
        if($usr['login'] === $_POST['login'] && $usr['passwd'] === hash("whirlpool", $_POST['oldpw']))
        {
            $file[$i]['passwd'] = hash("whirlpool", $_POST['newpw']);
            $CHANGED = TRUE;
            $final = serialize($file);
            file_put_contents("../private/passwd", $final . "\n");
            break;
        }
        $i++;
    }
    if ($CHANGED)
        ok();
    else
        error();
}
else
{
    error();
}
?>