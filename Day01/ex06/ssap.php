#!/usr/bin/php
<?PHP

function ft_split($str)
{
    $i = 0;
    $tab = explode(" ", $str);
    foreach($tab as $elem)
    {
        if ($elem == NULL)
            unset($tab[$i]);
        $i++;
    }
    return (array_values($tab));
}

$i = 1;
$ret = array();
while ($i < $argc)
{
    $s_tab = ft_split($argv[$i]);
    foreach ($s_tab as $elem)
    {
        array_push($ret, $elem);
    }
    $i++;
    sort($ret, SORT_STRING);
}
foreach($ret as $unit)
{
    echo($unit."\n");
}
?>