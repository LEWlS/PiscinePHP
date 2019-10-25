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

$tab = ft_split($argv[1]);
$cap = false;
foreach ($tab as $elem)
{
    if ($cap)
    {
        echo $elem;
        echo " ";
    }
    $cap = true;
}
foreach ($tab as $elem)
{
    if ($cap)
    {
        echo $elem;
        echo "\n";
    }
    $cap = false;
}
?>