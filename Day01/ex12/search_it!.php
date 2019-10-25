#!/usr/bin/php
<?PHP
if ($argc > 2)
{
    $key = $argv[1];
    $tab = $argv;
    $dict= array();
    unset($tab[0]);
    unset($tab[1]);
    $tab = array_values($tab);
    foreach($tab as $elem)
    {
        $temp = explode(":", $elem);
        if ($temp[0] == $key)
        {
            $ret = $temp[1];
        }
    }
    if ($ret)
        echo($ret."\n");
}
?>